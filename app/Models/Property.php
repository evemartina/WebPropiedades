<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class Property extends Model{
    use HasFactory;

    protected $fillable = [
        'nombre',
        'descripcion',
        'direccion',
        'estado',
        'operacion',
        'property_type_id',
        'city_id',
        'imagen_principal',
        'precio',
        'habitaciones',
        'banos',
        'metros_totales',
        'metros_construidos',
        'bodega',
        'estacionamiento',
        'gastos_comunes',
        'antiguedad',
        'lat',
        'lng'
    ];

    public function type(){
        return $this->belongsTo(PropertyType::class, 'property_type_id');
    }

    public function images(){
        return $this->hasMany(PropertyImage::class);
    }

    public function scopeOrdenadasPorFecha($query){
        return $query->orderBy('updated_at', 'desc');
    }

    public function region()    {
        return $this->belongsTo(Region::class);
    }

    public function city()    {
        return $this->belongsTo(City::class);
    }
    public function changeLogs()    {
        return $this->hasMany(PropertyChangeLog::class, 'property_id');
    }

    public function calcularValorMetroCuadrado()    {
        // Obtener el valor de la UF desde la API
        $ufResponse = Http::get('https://mindicador.cl/api/uf');
        $valorUF = $ufResponse->json()['serie'][0]['valor'];

        // Cálculo del valor del metro cuadrado
        $valorMetroCuadradoPesos = $this->precio / $this->metros_totales;
        $valorMetroCuadradoUF = $valorMetroCuadradoPesos / $valorUF;

        return [
            'valor_metro_cuadrado_pesos' => $valorMetroCuadradoPesos,
            'valor_metro_cuadrado_uf' => $valorMetroCuadradoUF,
            'valor_uf' => $valorUF
        ];
    }

    public function actualizarCoordenadas(){

        if (!$this->lat || !$this->lng) {
            $ciudad    = $this->city->name;
            $direccion = $this->direccion . ', ' . $ciudad . ', Chile';
            $apiKey    = config('services.google_maps.api_key');

            $response  = Http::get("https://maps.googleapis.com/maps/api/geocode/json", [
                'address' => $direccion,
                'key'     => $apiKey
            ]);

            if ($response->successful()) {

                $data = $response->json();
                Log::warning('Respuesta de la API', ['response' => $response->json()]);

                if (!empty($data['results']) && isset($data['results'][0]['geometry']['location'])) {
                    $this->lat = $data['results'][0]['geometry']['location']['lat'];
                    $this->lng = $data['results'][0]['geometry']['location']['lng'];

                    $this->save();

                } else {
                    Log::warning("No se encontraron coordenadas para la dirección: {$direccion}");
                }
            } else {
                Log::error("Error en la solicitud a la API de Google Geocoding: {$response->status()}");
            }
        }
    }

}

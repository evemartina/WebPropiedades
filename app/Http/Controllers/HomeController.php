<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\GeneralInformation;
use App\Models\Property;
use App\Models\PropertyType;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class HomeController extends Controller{

    public function index(){

        $tipo_propiedades = PropertyType::all();
        $properties       = Property::where('estado', 1)->orderBy('visitas', 'desc')->take(10)->get();
        $cities           = City::where('region_id', 10)->get();
        $info             = GeneralInformation::get()->first();


        return view('home', compact('properties', 'tipo_propiedades', 'cities', 'info'));
    }



    public function filter(Request $request)  {
        // Obtener los filtros de la solicitud AJAX
        $query = Property::query();
        // dump($request);

        if ($request->has('property_types') && $request->property_types != '') {
            $query->where('property_type_id', '=', $request->property_types);
        }

        if ($request->has('min_price') && $request->min_price != '') {
            $query->where('precio', '>=', $request->min_price);
        }

        if ($request->has('max_price') && $request->max_price != '') {
            $query->where('precio', '<=', $request->max_price);
        }

        if ($request->has('banos') & $request->banos != '') {
            $query->where('banos', '=', $request->banos);
        }

        if ($request->has('habitaciones') & $request->habitaciones != '') {
            $query->where('habitaciones', '=', $request->habitaciones);
        }

        if ($request->has('metros_totales') & $request->metros_totales != '') {
            $query->where('metros_totales', '>=', $request->metros_totales);
        }

        if ($request->has('operacion') & $request->operacion != '') {
            $query->where('operacion', '=', $request->operacion);
        }
        if ($request->has('city_id') && $request->city_id != '') {
            $query->where('city_id', '=', $request->city_id);
        }

        // Obtener los resultados filtrados
        $properties = $query->get();

        return view('propiedades.lista-destacado', compact('properties'))->render();
    }


    public function show($id)    {
        $property = Property::with('images', 'city')->findOrFail($id);
        $property->increment('visitas');
        $info = GeneralInformation::get()->first();



        return view('propiedades.listings', compact('property', 'info'));
    }

    function about()    {
        $info       = GeneralInformation::get()->first();
        return view('about', compact('info'));
    }

    function contact()    {
        $info       = GeneralInformation::get()->first();
        return view('contact', compact('info'));
    }

    public function enviarCorreo(Request $request){

        $validated = $request->validate([
            'mensaje' => 'required|string',
            'email'   => 'required|email',
            'nombre'  => 'required|string'
        ]);

        if ($validated) {
            // dd($request);
            try {
                // Obtén los datos del formulario
                $mensaje = $request->input('mensaje');
                $email   = $request->input('email');
                $nombre  = $request->input('nombre');

                $emailPropiedades = env('EMAIL_PRUEBA');

                Mail::send('emails.mensaje-contacto', ['mensaje' => $mensaje,  'nombre' => $nombre, 'cliente_email' => $email], function ($message) use ($emailPropiedades) {
                    $message->to($emailPropiedades)
                        ->subject('Mensaje cliente desde el sitio web');
                });

                return redirect()->route('contact')->with('success', 'Correo enviado exitosamente.');
            } catch (\Exception $e) {
                Log::error('Error al enviar el correo: ' . $e->getMessage());

                return redirect()->back()->with('error', 'Error al enviar el correo, porfavor intente nuevamente.');
            }
        }
    }

    public function enviarCorreoPropiedad(Request $request) {
        $request->validate([
            'mensaje' => 'required|string',
            'link'   => 'required|url',
            'email'  => 'required|email',
            'nombre' => 'required|string'
        ]);

        try {
            // Obtén los datos del formulario
            $mensaje = $request->input('mensaje');
            $link    = $request->input('link');
            $email   = $request->input('email');
            $nombre  = $request->input('nombre');

            $emailPropiedades = env('EMAIL_PRUEBA');

            Mail::send('emails.mesaje-propiedad', ['mensaje' => $mensaje, 'link' => $link, 'nombre' => $nombre, 'cliente_email' => $email], function ($message) use ($emailPropiedades) {
                $message->to($emailPropiedades)
                    ->subject('Mensaje cliente desde el sitio web');
            });
            return response()->json(['status' => 'Correo enviado con éxito'], 200);
        } catch (\Exception $e) {
            Log::error('Error al enviar el correo: ' . $e->getMessage());
            Log::error($e->getTraceAsString());  // Añadir detalles de la traza del error
            return redirect()->back()->with('error', 'Error al enviar el correo');
        }
    }


    public function calcularValorMetroCuadrado($precioTotal, $superficie){
        try {
            // Validar que el precio y la superficie sean valores válidos
            if ($precioTotal <= 0 || $superficie <= 0) {
                throw new \Exception("Precio o superficie inválidos.");
            }

            // Calcular valor del metro cuadrado en pesos chilenos
            $valorMetroCuadradoPesos = $precioTotal / $superficie;

            // Obtener valor actual de la UF desde la API del Banco Central
            $client = new Client();
            $response = $client->request('GET', 'https://mindicador.cl/api/uf');
            $data = json_decode($response->getBody(), true);
            $valorUf = $data['serie'][0]['valor'];

            // Calcular valor del metro cuadrado en UF
            $valorMetroCuadradoUF = $valorMetroCuadradoPesos / $valorUf;

            // Retornar los valores calculados
            return [
                'valor_metro_cuadrado_pesos' => round($valorMetroCuadradoPesos, 2),
                'valor_metro_cuadrado_uf' => round($valorMetroCuadradoUF, 4),
                'valor_uf' => $valorUf
            ];
        } catch (\Exception $e) {
            Log::error("Error al calcular el valor del metro cuadrado: " . $e->getMessage());
            return response()->json(['error' => 'No se pudo calcular el valor del metro cuadrado'], 500);
        }
    }


}

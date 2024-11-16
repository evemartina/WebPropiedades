<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Property extends Model{
    use HasFactory;

    protected $fillable = [
        'nombre',
        'descripcion',
        'direccion',
        'estado',
        'operacion',
        'property_type_id',
        'imagen_principal',
        'precio',
        'habitaciones',
        'banos',
        'metros_totales',
        'metros_construidos',
        'bodega',
        'estacionamiento',
        'gastos_comunes',
        'antiguedad'
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
}

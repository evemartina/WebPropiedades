<?php

namespace App\Http\Controllers;

use App\Models\Property;
use App\Models\PropertyType;
use Illuminate\Http\Request;

class HomeController extends Controller{

    public function index()    {

        $properties = Property::latest()->take(10)->get();
        $tipo_propiedades= PropertyType::all();


        return view('home', compact('properties','tipo_propiedades'));
    }



    public function filter(Request $request) {
        // Obtener los filtros de la solicitud AJAX
        $query = Property::query();
        // dump($request);

        if ($request->has('property_types') && $request->property_types != '') {
            $query->where('property_type_id','=' ,$request->property_types);
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

        // Obtener los resultados filtrados
        $properties = $query->get();
        // dump($properties);

        // Devolver una vista parcial con solo el listado de propiedades
        return view('propiedades.lista-destacado', compact('properties'))->render();
    }


    public function show(){

    }

}

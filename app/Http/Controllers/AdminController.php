<?php
namespace App\Http\Controllers;

use App\Models\Property;
use App\Models\PropertyType;
use Illuminate\Http\Request;

class AdminController extends Controller{


    public function index()    {
        $totalProperties = Property::count();  // Total de propiedades
        $totalForSale = Property::where('operacion', 'venta')->count();  // Propiedades en venta
        $totalForRent = Property::where('operacion', 'arriendo')->count();  // Propiedades en arriendo
        $publishedProperties = Property::where('estado', 1)->count();  // Propiedades publicadas
        $soldOrRentedProperties = Property::whereIn('estado', [0])->count();  // Propiedades vendidas o arrendadas
        $newPropertiesLastWeek = Property::where('created_at', '>=', now()->subWeek())->count();  // Propiedades nuevas en la última semana


        $totalViews = Property::sum('visitas');  // Total de visualizaciones de todas las propiedades
        $mostViewedProperty = Property::orderBy('visitas', 'desc')->first();  // Propiedad más vista
        $mostViewedProperties = Property::orderBy('visitas', 'desc')->take(10)->get(); // Propiedades más vistas
        $typeCounts = Property::selectRaw('property_type_id, COUNT(*) as count')
        ->groupBy('property_type_id')
        ->get();
        $propertyTypes = PropertyType::all();


        // Contar las propiedades por tipo
        $typeLabels = [];
        $typeValues = [];

        foreach ($propertyTypes as $propertyType) {
            $typeLabels[] = $propertyType->name;
            $typeValues[] = $typeCounts->where('property_type_id', $propertyType->id)->first()->count ?? 0;
        }



        return view('admin.dashboard', compact(
            'totalProperties',
            'totalForSale',
            'totalForRent',
            'publishedProperties',
            'soldOrRentedProperties',
            'newPropertiesLastWeek',
            'totalViews',
            'mostViewedProperty',
            'mostViewedProperties',
            'typeLabels',
            'typeValues'
        ));
    }


}

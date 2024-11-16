<?php
namespace App\Http\Controllers;

use App\Models\Property;
use Illuminate\Http\Request;

class AdminController extends Controller{


    public function index()    {
        $properties = Property::with('images', 'type')->ordenadasPorFecha()->take(5)->get();

        // $casas_arriendo=Property::where();
        // $depto_arriendo=Property::where();
        // $local_arriendo=Property::where();

        // $casa_venta=Property::where();
        // $depto_venta=Property::where();
        // $local_venta=Property::where();




        return view('admin.dashboard', compact('properties'));
    }

    // // Método para mostrar el formulario de creación de nuevas propiedades
    // public function createProperty(){
    //     return view('admin.propiedades.create_edit');
    // }

    // // Método para almacenar una nueva propiedad
    // public function storeProperty(Request $request){
    //     // Validar los datos
    //     $request->validate([
    //         'title' => 'required|string|max:255',
    //         'price' => 'required|numeric',
    //         'location' => 'required|string',
    //         'description' => 'required|string',
    //         'image' => 'required|image|max:2048',
    //     ]);

    //     // Subir la imagen
    //     $path = $request->file('image')->store('images', 'public');

    //     // Crear una nueva propiedad
    //     Property::create([
    //         'title' => $request->input('title'),
    //         'price' => $request->input('price'),
    //         'location' => $request->input('location'),
    //         'description' => $request->input('description'),
    //         'image' => $path,
    //     ]);

    //     return redirect()->route('admin.dashboard')->with('success', 'Propiedad creada con éxito');
    // }

    // // Método para eliminar una propiedad
    // public function deleteProperty(Property $property)    {
    //     $property->delete();

    //     return redirect()->route('admin.dashboard')->with('success', 'Propiedad eliminada con éxito');
    // }
}

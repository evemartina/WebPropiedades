<?php
namespace App\Http\Controllers;

use App\Models\Property;
use App\Models\PropertyImage;
use App\Models\PropertyType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PropertyController extends Controller
{
    public function index()    {
        $properties = Property::with('images', 'type')->get();
        return view('properties.index', compact('properties'));
    }

    public function create()    {
        $propertyTypes = PropertyType::all();

        return view('properties.create',compact('propertyTypes'))->render();

    }

    public function store(Request $request)   {
        // Validación
        $validated = $request->validate([
            'nombre'                 => 'required|string|max:255',
            'descripcion'            => 'nullable|string',
            'direccion'              => 'required|string|max:255',
            'estado'                 => 'required|string|max:50',
            'operacion'              => 'required|string|max:50',
            'property_type_id'       => 'required|exists:property_types,id',
            'imagen_principal'       => 'required|image|mimes:jpg,jpeg,png|max:2048',
            'precio'                 => 'required|numeric',
            'habitaciones'           => 'nullable|integer',
            'banos'                  => 'nullable|integer',
            'metros_totales'         => 'required|integer',
            'metros_construidos'     => 'nullable|integer',
            'gastos_comunes'         => 'nullable|integer',
            'antiguedad'             => 'nullable|integer',
            'bodega'                 => 'nullable|integer',
            'imagenes_adicionales.*' => 'image|mimes:jpg,jpeg,png|max:2048',
        ]);

        // Subir la imagen principal si existe
        if ($request->hasFile('imagen_principal')) {
            $imagePath = $request->file('imagen_principal')->store('properties');
            $validated['imagen_principal'] = $imagePath;
        }

        // Crear la propiedad
        $property = Property::create($validated);

        // Subir imágenes adicionales si existen
        if ($request->hasFile('imagenes_adicionales')) {
            foreach ($request->file('imagenes_adicionales') as $image) {
                $imagePath = $image->store('property_images');
                PropertyImage::create([
                    'property_id' => $property->id,
                    'image_path' => $imagePath,
                ]);
            }
        }

        return redirect()->route('properties.index')->with('success', 'Propiedad creada con éxito');
    }

    public function show($id)    {
        $property = Property::with('images', 'type')->findOrFail($id);
        return view('properties.show', compact('property'));
    }

    public function edit($id){
        $property      = Property::findOrFail($id);
        $propertyTypes = PropertyType::all();
        return view('properties.create', compact('property', 'propertyTypes'))->render();
    }

    public function update(Request $request, $id) {
        $property = Property::findOrFail($id);

        // Validación
        $validated = $request->validate([
            'nombre'                 => 'required|string|max:255',
            'descripcion'            => 'nullable|string',
            'direccion'              => 'required|string|max:255',
            'estado'                 => 'required|string|max:50',
            'operacion'              => 'required|string|max:50',
            'property_type_id'       => 'required|exists:property_types,id',
            'imagen_principal'       => 'required|image|mimes:jpg,jpeg,png|max:2048',
            'precio'                 => 'required|numeric',
            'habitaciones'           => 'nullable|integer',
            'banos'                  => 'nullable|integer',
            'metros_totales'         => 'required|integer',
            'metros_construidos'     => 'nullable|integer',
            'gastos_comunes'         => 'nullable|integer',
            'antiguedad'             => 'nullable|integer',
            'bodega'                 => 'nullable|integer',
            'imagenes_adicionales.*' => 'image|mimes:jpg,jpeg,png|max:2048',
        ]);

        // Subir la imagen principal si existe
        if ($request->hasFile('imagen_principal')) {
            // Eliminar la imagen anterior
            if ($property->imagen_principal) {
                Storage::delete($property->imagen_principal);
            }

            $imagePath = $request->file('imagen_principal')->store('properties');
            $validated['imagen_principal'] = $imagePath;
        }

        // Actualizar la propiedad
        $property->update($validated);

        // Subir imágenes adicionales si existen
        if ($request->hasFile('imagenes_adicionales')) {
            foreach ($request->file('imagenes_adicionales') as $image) {
                $imagePath = $image->store('property_images');
                PropertyImage::create([
                    'property_id' => $property->id,
                    'image_path' => $imagePath,
                ]);
            }
        }

        return redirect()->route('properties.index')->with('success', 'Propiedad actualizada con éxito');
    }

    public function destroy($id)   {
        $property = Property::findOrFail($id);

        // Eliminar imágenes principales y adicionales
        if ($property->imagen_principal) {
            Storage::delete($property->imagen_principal);
        }

        foreach ($property->images as $image) {
            Storage::delete($image->image_path);
            $image->delete();
        }

        $property->delete();

        return redirect()->route('properties.index')->with('success', 'Propiedad eliminada con éxito');
    }
}

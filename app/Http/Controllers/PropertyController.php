<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\Property;
use App\Models\PropertyImage;
use App\Models\PropertyType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;

class PropertyController extends Controller
{
    public function index(){

        $properties = Property::with('images', 'type')->get();
        return view('properties.index', compact('properties'));
    }

    public function create()    {
        $propertyTypes = PropertyType::all();
        $ciudades      = City::where('region_id',10)->get();

        return view('properties.create', compact('propertyTypes','ciudades'))->render();
    }
    public function store(Request $request)
{
    // Validación
    $validated = $request->validate([
        'nombre'                 => 'required|string|max:255',
        'descripcion'            => 'nullable|string',
        'direccion'              => 'required|string|max:255',
        'operacion'              => 'required|string|max:50',
        'city_id'                => 'required|exists:cities,id',
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

    // Guardar imagen principal
    if ($request->hasFile('imagen_principal')) {
        $imagen = $request->file('imagen_principal');

        // Generar un nombre único para la imagen principal
        $nombreImagen = strtolower(trim(time() . '_' . str_replace(' ', '', $imagen->getClientOriginalName())));

        // Guardar la imagen directamente en la carpeta public/images/propiedades
        $ruta = $imagen->move(public_path('images/propiedades'), $nombreImagen);

        // Guardar la ruta en la base de datos (ruta accesible desde la web)
        $validated['imagen_principal'] = 'images/propiedades/' . $nombreImagen;
    }

    // Crear propiedad
    $property = Property::create($validated);
    $property->actualizarCoordenadas();  // Lógica para actualizar coordenadas, según tu implementación

    // Guardar imágenes adicionales si existen
    if ($request->hasFile('imagenes_adicionales')) {
        foreach ($request->file('imagenes_adicionales') as $image) {
            // Generar un nombre único para cada imagen adicional
            $nombreImagenAdicional = strtolower(trim(time() . '_' . str_replace(' ', '', $image->getClientOriginalName())));

            // Guardar la imagen directamente en la carpeta public/images/propiedades
            $imagePath = $image->move(public_path('images/propiedades'), $nombreImagenAdicional);

            // Crear la relación con la propiedad en la base de datos
            PropertyImage::create([
                'property_id' => $property->id,
                'imagen'      => 'images/propiedades/' . $nombreImagenAdicional,  // Ruta accesible desde la web
            ]);
        }
    }

    return redirect()->route('properties.index')->with('success', 'Propiedad creada con éxito');
}



    public function show($id)    {

        $property = Property::with(['images', 'city','type', 'changeLogs' => function ($query) {
            $query->orderBy('created_at', 'DESC'); // Ordenar por la fecha de creación en orden descendente
        }])
        ->findOrFail($id);


        $valorMetro = $property->calcularValorMetroCuadrado();

        return view('properties.show', [
            'property' => $property,
            'valorMetroCuadradoPesos' => $valorMetro['valor_metro_cuadrado_pesos'],
            'valorMetroCuadradoUF' => $valorMetro['valor_metro_cuadrado_uf'],
            'valorUF' => $valorMetro['valor_uf'],
        ]);
    }

    public function edit($id){

        $property      = Property::with('images')->findOrFail($id);
        $propertyTypes = PropertyType::all();
        $ciudades      = City::where('region_id',10)->get();
        return view('properties.create', compact('property', 'propertyTypes','ciudades'))->render();
    }

    public function update(Request $request, $id)    {
        $property = Property::findOrFail($id);

        // Validación de los datos de entrada
        $validated = $request->validate([
            'nombre'                 => 'string|max:255',
            'descripcion'            => 'nullable|string',
            'direccion'              => 'string|max:255',
            'operacion'              => 'string|max:50',
            'property_type_id'       => 'exists:property_types,id',
            'city_id'                => 'required|exists:cities,id',
            'imagen_principal'       => 'image|mimes:jpg,jpeg,png|max:2048',
            'precio'                 => 'numeric',
            'habitaciones'           => 'nullable|integer',
            'banos'                  => 'nullable|integer',
            'metros_totales'         => 'integer',
            'metros_construidos'     => 'nullable|integer',
            'gastos_comunes'         => 'nullable|integer',
            'antiguedad'             => 'nullable|integer',
            'bodega'                 => 'nullable|integer',
            'imagenes_adicionales.*' => 'image|mimes:jpg,jpeg,png|max:2048',
        ]);

        // Almacenar el precio anterior para detectar cambios
        $old_price = $property->precio;

        // Actualizar coordenadas si cambia la dirección o la ciudad
        if ($property->direccion != $request->direccion || $property->city_id != $request->city_id) {
            $property->actualizarCoordenadas();
        }

        // Subir nueva imagen principal si existe
        if ($request->hasFile('imagen_principal')) {
            // Eliminar la imagen anterior si existe
            $imagenAnterior = $property->imagen_principal;
            if (file_exists(public_path($imagenAnterior))) {
                unlink(public_path($imagenAnterior));
            }

            // Subir la nueva imagen principal
            $imagen = $request->file('imagen_principal');
            $nombreImagen = strtolower(trim(time() . '_' . str_replace(' ', '', $imagen->getClientOriginalName())));
            $ruta = $imagen->move(public_path('images/propiedades'), $nombreImagen);

            // Asignar la nueva ruta de la imagen
            $validated['imagen_principal'] = 'images/propiedades/' . $nombreImagen;
        }

        // Actualizar la propiedad con los nuevos datos
        $property->update($validated);

        // Si el precio ha cambiado, registrar el cambio
        if ($old_price != $request->precio) {
            $this->logPropertyChange($property->id, 'precio', $old_price, $request->precio, $request->ip(), 'Cambio de precio');
        }

        // Manejar las imágenes adicionales
        if ($request->hasFile('imagenes_adicionales')) {
            // Obtener y eliminar las imágenes adicionales existentes
            $imagenesAdicionalesExistentes = PropertyImage::where('property_id', $property->id)->get();
            foreach ($imagenesAdicionalesExistentes as $imagenAdicional) {
                // Eliminar el archivo de imagen si existe
                if (file_exists(public_path($imagenAdicional->imagen))) {
                    unlink(public_path($imagenAdicional->imagen));
                }
                // Eliminar el registro en la base de datos
                $imagenAdicional->delete();
            }

            // Subir las nuevas imágenes adicionales
            foreach ($request->file('imagenes_adicionales') as $image) {
                $nombreImagenAdicional = strtolower(trim(time() . '_' . str_replace(' ', '', $image->getClientOriginalName())));
                $imagePath = $image->move(public_path('images/propiedades'), $nombreImagenAdicional);

                // Crear la relación con la propiedad
                PropertyImage::create([
                    'property_id' => $property->id,
                    'imagen'      => 'images/propiedades/' . $nombreImagenAdicional,  // Ruta accesible desde la web
                ]);
            }
        }

        return redirect()->route('properties.index')->with('success', 'Propiedad actualizada con éxito');
    }


    public function cambiarEstado($id)   {
        $property = Property::findOrFail($id);
        $old_estado =$property->estado;
        // Alterna el estado entre 0 y 1
        $property->estado = $property->estado == 1 ? 0 : 1;
        $property->save();

        $user_ip = request()->ip();

        if ($old_estado != $property->estado ){
            $this->logPropertyChange($property->id, 'estado', $old_estado, $property->estado , $user_ip, 'Cambio de estado');
        }

        return response()->json(['success' => 'Estado actualizado correctamente']);
    }

    public function actualizar(){
        $properties = Property::all();

        if ($properties->isEmpty()) {
            return response()->json(['html' => '<tr><td colspan="5">No hay propiedades disponibles</td></tr>']);
        }

        // Renderizar el HTML de la tabla con propiedades
        $html = view('properties.partials.tabla_propiedades', compact('properties'))->render();

        return response()->json(['html' => $html]);
    }

    private function logPropertyChange($propertyId, $changeType, $oldValue, $newValue, $userIp, $reason = null)    {
        DB::table('property_change_log')->insert([
            'property_id' => $propertyId,
            'user_id'     => Auth::user()->id,
            'change_type' => $changeType,
            'old_value'   => $oldValue,
            'new_value'   => $newValue,
            'reason'      => $reason,
            'user_ip'     => $userIp,
            'change_date' => now(),
            'created_at'  => now(),
            'updated_at'  => now(),
        ]);
    }


}

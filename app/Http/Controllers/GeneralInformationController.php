<?php

namespace App\Http\Controllers;

use App\Models\GeneralInformation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class GeneralInformationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()    {

        $info= GeneralInformation::get()->first();
        return view('general_information.index',compact('info'));
    }

    public function edit(string $id) {

        $info= GeneralInformation::findOrFail($id);
        return view('general_information.edit',compact('info'));
        //
    }


    public function update(Request $request, string $id){
        try {

            $info = GeneralInformation::findOrFail($id);

            // Validar los datos
            $validated = $request->validate([
                'vision' => 'nullable|string|max:500',
                'mision' => 'nullable|string|max:500',
                'horarios' => 'nullable|string|max:255',
                'email' => 'nullable|string|email|max:255',
                'telefono' => 'nullable|string|max:15',
                'whatsapp' => 'nullable|string|max:15',
                'instagram' => 'nullable|string|max:255',
                'facebook' => 'nullable|string|max:255',
            ], [
                'mision.max' => 'La misión no puede tener más de 500 caracteres.',
                'vision.max' => 'La visión no puede tener más de 500 caracteres.',
                'horarios.max' => 'Los horarios no pueden tener más de 255 caracteres.',
                'email.max' => 'El email no puede tener más de 255 caracteres.',
                'email.email' => 'El email debe ser una dirección válida.',
                'telefono.max' => 'El teléfono no puede tener más de 15 caracteres.',
                'whatsapp.max' => 'El WhatsApp no puede tener más de 255 caracteres.',
                'instagram.max' => 'El Instagram no puede tener más de 255 caracteres.',
                'facebook.max' => 'El Facebook no puede tener más de 255 caracteres.',
            ]);

            $info->update($validated);

            return redirect()->route('general-information.index')->with('success', 'Información actualizada con éxito');

        } catch (\Exception $e) {
            Log::error('Error al enviar el correo: ' . $e->getMessage());

            return redirect()->back()->with('error', 'Hubo un problema al actualizar la información');
        }
    }


}

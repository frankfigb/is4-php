<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\TipoContacto;
use Illuminate\Http\Request;

class TipoContactoController extends Controller
{
    /**
     * listado de registros del modelo elegido
     */
    public function index()
    {
        $tiposContacto = TipoContacto::all();
        return view('admin.tipo-contacto.index',[
            'records' => $tiposContacto
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('admin.tipo-contacto.create');
    }

    /**
     * metodo de guardado en la bd
     */
    public function store(Request $request)
    {
        // Validaciones con mensajes en español
        $validated = $request->validate([
            'nombre' => ['required', 'string', 'unique:tipos_contactos,nombre'],
        ], [
            'nombre.required' => 'El campo Nombre es obligatorio.',
            'nombre.string'   => 'El campo Nombre debe ser una cadena de texto.',
            'nombre.unique'   => 'Este nombre ya existe. Debe ser único.',
        ]);

        try {
            // Crear el registro
            $tipoContacto = TipoContacto::create([
                'nombre' => $validated['nombre'],
            ]);

            // Redirigir a la vista "show" con mensaje de éxito
            return redirect()
                ->route('admin.tipo-contacto.show', $tipoContacto->id)
                ->with('success', 'Tipo de contacto creado correctamente.');
        } catch (\Exception $e) {
            // En caso de error inesperado
            return redirect()
                ->route('admin.tipo-contacto.create')
                ->withErrors(['error' => 'Ocurrió un problema al guardar: ' . $e->getMessage()])
                ->withInput();
        }
    }


    /**
     * Display the specified resource.
     */
    public function show(TipoContacto $tipoContacto)
    {
        //
        return view('admin.tipo-contacto.show',[
            'tipoContacto' => $tipoContacto
        ]);
    }

    /**
     * muestra el formulario
     */
    public function edit(TipoContacto $tipoContacto)
    {
        //
        return view('admin.tipo-contacto.edit',[
            'tipoContacto' => $tipoContacto
        ]);
    }

    /**
     * realiza la edicion del registro en la bd
     */
    public function update(Request $request, TipoContacto $tipoContacto)
    {
        // Validaciones con mensajes en español
        $validated = $request->validate([
            'nombre' => ['required', 'string', 'unique:tipos_contactos,nombre,' . $tipoContacto->id],
        ], [
            'nombre.required' => 'El campo Nombre es obligatorio.',
            'nombre.string'   => 'El campo Nombre debe ser una cadena de texto.',
            'nombre.unique'   => 'Este nombre ya existe. Debe ser único.',
        ]);

        try {
            // Actualizar el registro
            $tipoContacto->update([
                'nombre' => $validated['nombre'],
            ]);

            // Redirigir al index con mensaje de éxito
            return redirect()
                ->route('admin.tipo-contacto.index')
                ->with('success', 'Tipo de contacto actualizado correctamente.');
        } catch (\Exception $e) {
            // En caso de error inesperado
            return redirect()
                ->route('admin.tipo-contacto.update', $tipoContacto->id)
                ->withErrors(['error' => 'Ocurrió un problema al actualizar: ' . $e->getMessage()])
                ->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(TipoContacto $tipoContacto)
    {
        try {
            // Eliminar el registro
            $tipoContacto->delete();

            // Redirigir al index con mensaje de éxito
            return redirect()
                ->route('admin.tipo-contacto.index')
                ->with('success', 'Tipo de contacto eliminado correctamente.');
        } catch (\Exception $e) {
            // En caso de error inesperado
            return redirect()
                ->route('admin.tipo-contacto.index')
                ->withErrors(['error' => 'Ocurrió un problema al eliminar: ' . $e->getMessage()]);
        }
    }
}

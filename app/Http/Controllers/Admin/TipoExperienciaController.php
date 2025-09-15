<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\TipoExperiencia;
use Illuminate\Http\Request;

class TipoExperienciaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $tipoExperiencia = TipoExperiencia::all();
        return view('admin.tipo-experiencia.index',[
            'tipo' => $tipoExperiencia
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('admin.tipo-experiencia.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        // Validaciones
        $validated = $request->validate([
            'nombre' => ['required', 'string', 'unique:tipos_experiencias,nombre'],
        ], [
            'nombre.required' => 'El campo nombre es obligatorio.',
            'nombre.string'   => 'El campo nombre debe ser un texto.',
            'nombre.unique'   => 'Este nombre ya existe en los tipos de experiencia.',
        ]);

        try {
            // Crear el registro
            $tipoExperiencia = TipoExperiencia::create([
                'nombre' => $validated['nombre'],
            ]);

            // Redirigir a la vista "show"
            return redirect()
                ->route('admin.tipo-experiencia.show', $tipoExperiencia->id)
                ->with('success', 'Tipo de experiencia creado correctamente.');
        } catch (\Exception $e) {
            // En caso de error inesperado
            return redirect()
                ->route('admin.tipo-experiencia.create')
                ->withErrors(['error' => 'Ocurrió un problema al guardar: ' . $e->getMessage()])
                ->withInput();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(TipoExperiencia $tipoExperiencia)
    {
        //
        return view('admin.tipo-experiencia.show',[
            'tipo' => $tipoExperiencia
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(TipoExperiencia $tipoExperiencia)
    {
        //
        return view('admin.tipo-experiencia.edit',[
            'tipo' => $tipoExperiencia
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, TipoExperiencia $tipoExperiencia)
    {
        //
        // Validaciones con mensajes en español
        $validated = $request->validate([
            'nombre' => ['required', 'string', 'unique:tipos_experiencias,nombre,' . $tipoExperiencia->id],
        ], [
            'nombre.required' => 'El campo Nombre es obligatorio.',
            'nombre.string'   => 'El campo Nombre debe ser una cadena de texto.',
            'nombre.unique'   => 'Este nombre ya existe. Debe ser único.',
        ]);

        try {
            // Actualizar el registro
            $tipoExperiencia->update([
                'nombre' => $validated['nombre'],
            ]);

            return redirect()
                ->route('admin.tipo-experiencia.index')
                ->with('success', 'Tipo de experiencia actualizado correctamente.');
        } catch (\Exception $e) {
            return redirect()
                ->route('admin.tipo-experiencia.edit', $tipoExperiencia->id)
                ->withErrors(['error' => 'Ocurrió un problema al actualizar: ' . $e->getMessage()])
                ->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(TipoExperiencia $tipoExperiencia)
    {
        //
        try {
            $tipoExperiencia->delete();

            return redirect()
                ->route('admin.tipo-experiencia.index')
                ->with('success', 'Tipo de experiencia eliminado correctamente.');
        } catch (\Exception $e) {
            return redirect()
                ->route('admin.tipo-experiencia.index')
                ->withErrors(['error' => 'Ocurrió un problema al eliminar: ' . $e->getMessage()]);
        }
    }
}

<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\TipoHabilidad;
use Illuminate\Http\Request;

class TipoHabilidadController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $tiposHabilidad = TipoHabilidad::all();
        return view('admin.tipo-habilidad.index',[
            'tipos' => $tiposHabilidad
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('admin.tipo-habilidad.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        // Validaciones
        $validated = $request->validate([
            'nombre' => ['required', 'string', 'unique:tipos_habilidades,nombre'],
        ], [
            'nombre.required' => 'El campo nombre es obligatorio.',
            'nombre.string'   => 'El campo nombre debe ser un texto.',
            'nombre.unique'   => 'Este nombre ya existe en los tipos de habilidades.',
        ]);

        try {
            // Crear el registro
            $tipoHabilidad = TipoHabilidad::create([
                'nombre' => $validated['nombre'],
            ]);

            // Redirigir a la vista "show"
            return redirect()
                ->route('admin.tipo-habilidad.show', $tipoHabilidad->id)
                ->with('success', 'Tipo de habilidad creado correctamente.');
        } catch (\Exception $e) {
            return redirect()
                ->route('admin.tipo-habilidad.create')
                ->withErrors(['error' => 'Ocurrió un problema al guardar: ' . $e->getMessage()])
                ->withInput();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(TipoHabilidad $tipoHabilidad)
    {
        //
        return view('admin.tipo-habilidad.show',[
           'tipoHabilidad' => $tipoHabilidad
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(TipoHabilidad $tipoHabilidad)
    {
        //
        return view('admin.tipo-habilidad.edit',[
            'tipo' => $tipoHabilidad
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, TipoHabilidad $tipoHabilidad)
    {
        //
        // Validaciones
        $validated = $request->validate([
            'nombre' => ['required', 'string', 'unique:tipos_habilidades,nombre,' . $tipoHabilidad->id],
        ], [
            'nombre.required' => 'El campo nombre es obligatorio.',
            'nombre.string'   => 'El campo nombre debe ser un texto.',
            'nombre.unique'   => 'Este nombre ya existe en los tipos de habilidades.',
        ]);

        try {
            // Actualizar el registro
            $tipoHabilidad->update([
                'nombre' => $validated['nombre'],
            ]);

            return redirect()
                ->route('admin.tipo-habilidad.index')
                ->with('success', 'Tipo de habilidad actualizado correctamente.');
        } catch (\Exception $e) {
            return redirect()
                ->route('admin.tipo-habilidad.edit', $tipoHabilidad->id)
                ->withErrors(['error' => 'Ocurrió un problema al actualizar: ' . $e->getMessage()])
                ->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(TipoHabilidad $tipoHabilidad)
    {
        //
        try {
            $tipoHabilidad->delete();

            return redirect()
                ->route('admin.tipo-habilidad.index')
                ->with('success', 'Tipo de habilidad eliminado correctamente.');
        } catch (\Exception $e) {
            return redirect()
                ->route('admin.tipo-habilidad.index')
                ->withErrors(['error' => 'Ocurrió un problema al eliminar: ' . $e->getMessage()]);
        }
    }

}

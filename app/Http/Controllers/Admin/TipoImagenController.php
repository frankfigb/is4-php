<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\TipoImagen;
use Illuminate\Http\Request;

class TipoImagenController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $tiposImagen = TipoImagen::all();
        return view('admin.tipo-imagen.index',[
            'tipos' => $tiposImagen
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('admin.tipo-imagen.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $validated = $request->validate([
            'nombre' => ['required', 'string', 'unique:tipos_imagenes,nombre'],
        ], [
            'nombre.required' => 'El campo nombre es obligatorio.',
            'nombre.string'   => 'El nombre debe ser una cadena de texto.',
            'nombre.unique'   => 'El nombre ya existe en la base de datos.',
        ]);

        try {
            $tipoImagen = TipoImagen::create([
                'nombre' => $validated['nombre'],
            ]);

            return redirect()
                ->route('admin.tipo-imagen.index')
                ->with('success', 'Tipo de imagen creado correctamente.');
        } catch (\Exception $e) {
            return redirect()
                ->route('admin.tipo-imagen.create')
                ->withErrors(['error' => 'Ocurrió un problema al guardar: ' . $e->getMessage()])
                ->withInput();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(TipoImagen $tipoImagen)
    {
        //
        return view('admin.tipo-imagen.show',[
            'tipoImagen' => $tipoImagen
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(TipoImagen $tipoImagen)
    {
        //
        return view('admin.tipo-imagen.edit',[
            'tipo' => $tipoImagen
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, TipoImagen $tipoImagen)
    {
        //
        $validated = $request->validate([
            'nombre' => ['required', 'string', 'unique:tipos_imagenes,nombre,' . $tipoImagen->id],
        ], [
            'nombre.required' => 'El campo nombre es obligatorio.',
            'nombre.string'   => 'El nombre debe ser una cadena de texto.',
            'nombre.unique'   => 'El nombre ya existe en la base de datos.',
        ]);

        try {
            $tipoImagen->update([
                'nombre' => $validated['nombre'],
            ]);

            return redirect()
                ->route('admin.tipo-imagen.index')
                ->with('success', 'Tipo de imagen actualizado correctamente.');
        } catch (\Exception $e) {
            return redirect()
                ->route('admin.tipo-imagen.edit', $tipoImagen->id)
                ->withErrors(['error' => 'Ocurrió un problema al actualizar: ' . $e->getMessage()])
                ->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(TipoImagen $tipoImagen)
    {
        //
        try {
            $tipoImagen->delete();

            return redirect()
                ->route('admin.tipo-imagen.index')
                ->with('success', 'Tipo de imagen eliminado correctamente.');
        } catch (\Exception $e) {
            return redirect()
                ->route('admin.tipo-imagen.index')
                ->withErrors(['error' => 'Ocurrió un problema al eliminar: ' . $e->getMessage()]);
        }
    }

}

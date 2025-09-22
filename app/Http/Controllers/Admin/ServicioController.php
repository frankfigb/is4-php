<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Servicio;
use App\Models\DatoPersonal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ServicioController extends Controller
{
    public function index()
    {
        $servicios = Servicio::with('datoPersonal')->orderByDesc('created_at')->get();
        return view('admin.servicio.index', compact('servicios'));
    }

    public function create()
    {
        $datos = DatoPersonal::all();
        return view('admin.servicio.create', compact('datos'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'dato_personal_id' => 'required|exists:datos_personales,id',
            'titulo' => 'required|string|max:150',
            'descripcion' => 'required|string',
            'imagen_icono' => 'nullable|image|max:2048',
        ]);

        if ($request->hasFile('imagen_icono')) {
            $ruta = $request->file('imagen_icono')->store('iconos', 'public');
            $validated['imagen_icono'] = $ruta;
        }

        Servicio::create($validated);

        return redirect()->route('admin.servicio.index')->with('success', 'Servicio creado correctamente.');
    }

    public function show(Servicio $servicio)
    {
        return view('admin.servicio.show', compact('servicio'));
    }

    public function edit(Servicio $servicio)
    {
        $datos = DatoPersonal::all();
        return view('admin.servicio.edit', compact('servicio', 'datos'));
    }

    public function update(Request $request, Servicio $servicio)
    {
        $validated = $request->validate([
            'dato_personal_id' => 'required|exists:datos_personales,id',
            'titulo' => 'required|string|max:150',
            'descripcion' => 'required|string',
            'imagen_icono' => 'nullable|image|max:2048',
        ]);

        if ($request->hasFile('imagen_icono')) {
            // Eliminar imagen anterior si existe
            if ($servicio->imagen_icono && Storage::disk('public')->exists($servicio->imagen_icono)) {
                Storage::disk('public')->delete($servicio->imagen_icono);
            }

            $ruta = $request->file('imagen_icono')->store('iconos', 'public');
            $validated['imagen_icono'] = $ruta;
        }

        $servicio->update($validated);

        return redirect()->route('admin.servicio.index')->with('success', 'Servicio actualizado correctamente.');
    }

    public function destroy(Servicio $servicio)
    {
        // Eliminar imagen del storage si existe
        if ($servicio->imagen_icono && Storage::disk('public')->exists($servicio->imagen_icono)) {
            Storage::disk('public')->delete($servicio->imagen_icono);
        }

        $servicio->delete();

        return redirect()->route('admin.servicio.index')->with('success', 'Servicio eliminado correctamente.');
    }
}

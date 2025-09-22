<?php
namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Imagen;
use App\Models\TipoImagen;
use App\Models\DatoPersonal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ImagenController extends Controller
{
    public function index()
    {
        $imagen = Imagen::with(['tipoImagen', 'datosPersonales'])
                        ->orderByDesc('created_at')
                        ->get();

        return view('admin.imagen.index', compact('imagen'));
    }

    public function create()
    {
        $tipos = TipoImagen::all();
        $datos = DatoPersonal::all();

        return view('admin.imagen.create', compact('tipos', 'datos'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'tipo_imagen_id' => 'required|exists:tipos_imagenes,id',
            'dato_personal_id' => 'required|exists:datos_personales,id',
            'imagen' => 'required|image|mimes:jpg,jpeg,png|max:2048'
        ]);

        try {
            $tipo = TipoImagen::find($validated['tipo_imagen_id']);

            // Reemplazar automáticamente si ya existe una imagen de tipo único
            if (in_array(strtolower($tipo->nombre), ['perfil', 'portada'])) {
                $imagenAnterior = Imagen::where('tipo_imagen_id', $tipo->id)->first();

                if ($imagenAnterior) {
                    if ($imagenAnterior->url && Storage::disk('public')->exists($imagenAnterior->url)) {
                        Storage::disk('public')->delete($imagenAnterior->url);
                    }
                    $imagenAnterior->delete();
                }
            }

            $path = $request->file('imagen')->store('imagenes', 'public');

            Imagen::create([
                'tipo_imagen_id' => $validated['tipo_imagen_id'],
                'dato_personal_id' => $validated['dato_personal_id'],
                'url' => $path,
            ]);

            return redirect()
                ->route('admin.imagen.index')
                ->with('success', 'Imagen subida correctamente.');
        } catch (\Exception $e) {
            return redirect()
                ->route('admin.imagen.create')
                ->withErrors(['error' => 'Ocurrió un problema al guardar: ' . $e->getMessage()])
                ->withInput();
        }
    }

    public function show(Imagen $imagen)
    {
        return view('admin.imagen.show', compact('imagen'));
    }

    public function edit(Imagen $imagen)
    {
        $tipos = TipoImagen::all();
        $datos = DatoPersonal::all();

        return view('admin.imagen.edit', compact('imagen', 'tipos', 'datos'));
    }

    public function update(Request $request, Imagen $imagen)
    {
        $validated = $request->validate([
            'tipo_imagen_id' => 'required|exists:tipos_imagenes,id',
            'dato_personal_id' => 'required|exists:datos_personales,id',
            'imagen' => 'nullable|image|mimes:jpg,jpeg,png|max:2048'
        ]);

        try {
            $tipo = TipoImagen::find($validated['tipo_imagen_id']);

            // Si se cambia a tipo único, eliminar otra imagen existente
            if (in_array(strtolower($tipo->nombre), ['perfil', 'portada'])) {
                $imagenDuplicada = Imagen::where('tipo_imagen_id', $tipo->id)
                                         ->where('id', '!=', $imagen->id)
                                         ->first();

                if ($imagenDuplicada) {
                    if ($imagenDuplicada->url && Storage::disk('public')->exists($imagenDuplicada->url)) {
                        Storage::disk('public')->delete($imagenDuplicada->url);
                    }
                    $imagenDuplicada->delete();
                }
            }

            if ($request->hasFile('imagen')) {
                if ($imagen->url && Storage::disk('public')->exists($imagen->url)) {
                    Storage::disk('public')->delete($imagen->url);
                }

                $path = $request->file('imagen')->store('imagenes', 'public');

                $imagen->update([
                    'tipo_imagen_id' => $validated['tipo_imagen_id'],
                    'dato_personal_id' => $validated['dato_personal_id'],
                    'url' => $path,
                ]);
            } else {
                $imagen->update([
                    'tipo_imagen_id' => $validated['tipo_imagen_id'],
                    'dato_personal_id' => $validated['dato_personal_id'],
                ]);
            }

            return redirect()
                ->route('admin.imagen.index')
                ->with('success', 'Imagen actualizada correctamente.');
        } catch (\Exception $e) {
            return redirect()
                ->route('admin.imagen.edit', $imagen->id)
                ->withErrors(['error' => 'Ocurrió un problema al actualizar: ' . $e->getMessage()])
                ->withInput();
        }
    }

    public function destroy(Imagen $imagen)
    {
        try {
            if ($imagen->url && Storage::disk('public')->exists($imagen->url)) {
                Storage::disk('public')->delete($imagen->url);
            }

            $imagen->delete();

            return redirect()
                ->route('admin.imagen.index')
                ->with('success', 'Imagen eliminada correctamente.');
        } catch (\Exception $e) {
            return redirect()
                ->route('admin.imagen.index')
                ->with('error', 'Ocurrió un problema al eliminar: ' . $e->getMessage());
        }
    }
}

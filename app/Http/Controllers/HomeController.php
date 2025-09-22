<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DatoPersonal;
use App\Models\TipoExperiencia;
use App\Models\Experiencia;
use App\Models\Imagen;
use App\Models\TipoImagen;
use App\Models\Servicio;

class HomeController extends Controller
{
    /**
     * Página de inicio
     */
    public function inicio()
    {
        $imagenPortada = Imagen::whereHas('tipoImagen', function ($query) {
            $query->where('nombre', 'Portada');
        })->first();

        $imagenUrl = ($imagenPortada && $imagenPortada->url && file_exists(public_path('storage/' . $imagenPortada->url)))
            ? asset('storage/' . $imagenPortada->url)
            : asset('storage/default.jpg');

        return view('inicio', [
            'imagen_portada_url' => $imagenUrl
        ]);
    }

    /**
     * Página "Acerca de"
     */
    public function acerca()
    {
        $fechaNacModel = DatoPersonal::first();

        $imagenPerfil = Imagen::whereHas('tipoImagen', function ($query) {
            $query->whereRaw('LOWER(nombre) LIKE ?', ['%perfiles%']);
        })->first();

        $imagenUrl = ($imagenPerfil && $imagenPerfil->url)
            ? asset('storage/' . $imagenPerfil->url)
            : asset('storage/default.jpg');

        return view('acerca-de', [
            'fecha_nacimiento' => optional($fechaNacModel)->fecha_nacimiento,
            'nombre' => optional($fechaNacModel)->nombre,
            'apellido' => optional($fechaNacModel)->apellido,
            'descripcion' => optional($fechaNacModel)->descripcion,
            'ciudad_domicilio' => optional($fechaNacModel)->ciudad_domicilio,
            'sitio_web' => optional($fechaNacModel)->sitio_web,
            'correo' => optional($fechaNacModel)->correo,
            'disponible' => optional($fechaNacModel)->disponible,
            'telefono' => optional($fechaNacModel)->telefono,
            'grado' => optional($fechaNacModel)->grado,
            'imagen_perfil_url' => $imagenUrl
        ]);
    }

    /**
     * Página de resumen de experiencias
     */
    public function resumen()
    {
        $laboral = TipoExperiencia::whereRaw('LOWER(nombre) = ?', ['laboral'])
            ->with('experiencias')
            ->get();

        $profesional = TipoExperiencia::whereRaw('LOWER(nombre) = ?', ['profesional'])
            ->with('experiencias')
            ->get();

        $educativo = TipoExperiencia::whereRaw('LOWER(nombre) = ?', ['educativo'])
            ->with('experiencias')
            ->get();

        return view('resumen', [
            'laboral' => $laboral,
            'profesional' => $profesional,
            'educativo' => $educativo
        ]);
    }

    /**
     * Página de servicios
     */
    public function servicios()
    {
        $servicios = Servicio::with('datoPersonal')->orderByDesc('created_at')->get();

        return view('servicios', [
            'servicios' => $servicios
        ]);
    }

    /**
     * Página de portafolio
     */
    public function portafolio()
    {
        return view('portafolio');
    }

    /**
     * Página de contacto
     */
    public function contacto()
    {
        return view('contacto');
    }

    /**
     * Vista de prueba
     */
    public function test()
    {
        $imagenPerfil = Imagen::whereHas('tipoImagen', function ($query) {
            $query->where('nombre', 'Perfil');
        })->first();

        $imagenUrl = ($imagenPerfil && $imagenPerfil->url)
            ? asset('storage/' . $imagenPerfil->url)
            : asset('storage/default.jpg');

        return view('test', ['imagen_perfil_url' => $imagenUrl]);
    }

    // Métodos vacíos para compatibilidad futura
    public function create() {}
    public function store(Request $request) {}
    public function show(string $id) {}
    public function edit(string $id) {}
    public function update(Request $request, string $id) {}
    public function destroy(string $id) {}
}

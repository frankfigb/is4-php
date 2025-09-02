<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DatoPersonal;
use App\Models\TipoExperiencia;
use App\Models\Experiencia;
use App\Models\Imagen;
use App\Models\TipoImagen;

class HomeController extends Controller
{
    /**
     * Página de inicio
     */
    public function inicio()
    {
        $imagenPortada = Imagen::whereHas('tipoImagen', function ($query) {
            $query->where('nombre', 'portada');
        })->first();

        $imagenUrl = $imagenPortada
            ? asset('assets/img/' . $imagenPortada->url)
            : asset('assets/img/default.jpg');

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
            $query->where('nombre', 'perfil');
        })->first();

        $imagenUrl = $imagenPerfil
            ? asset('assets/img/' . $imagenPerfil->url)
            : asset('assets/img/default.jpg');

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
        $laboral = TipoExperiencia::where('nombre', 'laboral')
            ->with('experiencias')
            ->get();

        $profesional = TipoExperiencia::where('nombre', 'profesional')
            ->with('experiencias')
            ->get();

        $educativo = TipoExperiencia::where('nombre', 'educativo')
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
        return view('servicios');
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
     * Mostrar formulario de creación
     */
    public function create()
    {
        //
    }

    /**
     * Guardar nuevo registro
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Mostrar un registro específico
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Mostrar formulario de edición
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Procesar edición de un registro
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Eliminar un registro
     */
    public function destroy(string $id)
    {
        //
    }
}

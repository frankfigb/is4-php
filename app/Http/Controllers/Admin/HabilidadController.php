<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Habilidad;
use Illuminate\Http\Request;

class HabilidadController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $habilidades = Habilidad::all();
        return view('admin.habilidad.index',[
            'habilidades' => $habilidades
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Habilidad $habilidad)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Habilidad $habilidad)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Habilidad $habilidad)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Habilidad $habilidad)
    {
        //
    }
}

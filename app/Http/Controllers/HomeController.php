<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     * lista de recursos que tiene una vista asociada*/

    //metodo de la pagina raiz
    public function inicio(){
        return view('inicio');
    }

    public function acerca(){
        return view('acerca-de');
    }

    public function resumen(){
        return view('resumen');
    }

    public function servicios(){
        return view('servicios');
    }

    public function portafolio(){
        return view('portafolio');
    }

    public function contactos(){
        return view('contactos');
    }

    /*muestra la vista y el formulario de creacion*/
    public function create(){
        //
    }

    /** logica efectiva de creacion del registro*/
    public function store(Request $request){
        //
    }

    /**
     * Display the specified resource.
     * visualiza un registro de una vista asociada
     */
    public function show(string $id){
        //
    }

    /**
     * Show the form for editing the specified resource.
     * retorna un formulario de edicion a travez de una vista pero no procesa cuando el forulario se envia
     */
    public function edit(string $id){
        //
    }

    /**
     * Update the specified resource in storage.
     * es el que procesa el formulario de edicion 
     */
    public function update(Request $request, string $id){
        //
    }

    /**
     * Remove the specified resource from storage.
     * logica de eliminado de un registro
     */
    public function destroy(string $id){
        //
    }
}

<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\DatoPersonal;
use Illuminate\Http\Request;

class DatoPersonalController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $datos = DatoPersonal::all();
        return view('admin.datopersonal.index',[
            'datos' => $datos
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
    public function show(DatoPersonal $datoPersonal)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(DatoPersonal $datoPersonal)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, DatoPersonal $datoPersonal)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(DatoPersonal $datoPersonal)
    {
        //
    }
}

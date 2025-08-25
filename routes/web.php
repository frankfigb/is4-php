<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;

//Ruta raiz 
Route::get('/',[HomeController::class, 'inicio']) -> name('inicio');


// NUEVAS RUTAS A CREAR 
//acerca de
Route::get('/acerca-de',[HomeController::class, 'acerca']) -> name('acerca');

route::get('/resumen',[HomeController::class, 'resumen']) ->name('resumen');

route::get('/servicios',[HomeController::class, 'servicios']) ->name('servicios');

route::get('/portafolio',[HomeController::class, 'portafolio']) ->name('portafolio');

route::get('/contactos',[HomeController::class, 'contactos']) ->name('contactos');
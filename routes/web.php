<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\admin\TipoContactoController;
use App\http\Controllers\admin\TipoExperienciaController;
use App\Http\Controllers\admin\TipoHabilidadController;
use App\Http\Controllers\admin\TipoImagenController;
use \App\Http\Controllers\admin\ContactoController;
use App\Http\Controllers\admin\DatoPersonalController;
use App\Http\Controllers\admin\ExperienciaController;
use App\Http\Controllers\admin\HabilidadController;
use App\Http\Controllers\admin\ImagenController;
use App\Http\Controllers\admin\PerfilController;


//Ruta raiz
Route::get('/',[HomeController::class, 'inicio']) -> name('inicio');

//acerca de
Route::get('/acerca-de',[HomeController::class, 'acerca']) -> name('acerca');

//resumen
route::get('/resumen',[HomeController::class, 'resumen']) ->name('resumen');

//servicios
route::get('/servicios',[HomeController::class, 'servicios']) ->name('servicios');

//portafolio
route::get('/portafolio',[HomeController::class, 'portafolio']) ->name('portafolio');

//contacto
route::get('/contacto',[HomeController::class, 'contacto']) ->name('contacto');


/*
Route::get('/', function () {
    return view('welcome');
});
*/

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    route::prefix('/admin')->group(function () {
        //controladores de tipos

        //controladores de tipos de contacto
        // fromulario de vista
        Route::get('/tipo-contacto', [TipoContactoController::class, 'index'])->name('admin.tipo-contacto.index');
        // creacion, de ser necesario poner antes de todos para evitar errores
        Route::get('/tipo-contacto/create-form', [TipoContactoController::class, 'create'])->name('admin.tipo-contacto.create');
        //inspeccion
        Route::get('/tipo-contacto/{tipoContacto}', [TipoContactoController::class, 'show'])->name('admin.tipo-contacto.show');
        // Añadir registro
        Route::post('/tipo-contacto', [TipoContactoController::class, 'store'])->name('admin.tipo-contacto.store');
        // eliminacion de registro
        Route::delete('/tipo-contacto/{tipoContacto}', [TipoContactoController::class, 'destroy'])->name('admin.tipo-contacto.destroy');
        //formulario de actualizacion de registro
        Route::get('/tipo-contacto/edit-form/{tipoContacto}', [TipoContactoController::class, 'edit'])->name('admin.tipo-contacto.edit');
        //realiza la actualizacion
        Route::put('/tipo-contacto/{tipoContacto}', [TipoContactoController::class, 'update'])->name('admin.tipo-contacto.update');



        //tipos de experiencia
        Route::get('/tipo-experiencia', [TipoExperienciaController::class, 'index'])->name('admin.tipo-experiencia.index');

        Route::get('/tipo-experiencia/create-form', [TipoExperienciaController::class, 'create'])->name('admin.tipo-experiencia.create');

        Route::get('/tipo-experiencia/{tipoExperiencia}', [TipoExperienciaController::class, 'show'])->name('admin.tipo-experiencia.show');
        // Añadir registro
        Route::post('/tipo-experiencia', [TipoExperienciaController::class, 'store'])->name('admin.tipo-experiencia.store');
        // eliminacion de registro
        Route::delete('/tipo-experiencia/{tipoExperiencia}', [TipoExperienciaController::class, 'destroy'])->name('admin.tipo-experiencia.destroy');
        //formulario de actualizacion de registro
        Route::get('/tipo-experiencia/edit-form/{tipoExperiencia}', [TipoExperienciaController::class, 'edit'])->name('admin.tipo-experiencia.edit');
        //realiza la actualizacion
        Route::put('/tipo-experiencia/{tipoExperiencia}', [TipoExperienciaController::class, 'update'])->name('admin.tipo-experiencia.update');


        //tipos de habilidad
        Route::get('/tipo-habilidad', [TipoHabilidadController::class, 'index'])->name('admin.tipo-habilidad.index');

        Route::get('/tipo-habilidad/create-form', [TipoHabilidadController::class, 'create'])->name('admin.tipo-habilidad.create');

        Route::get('/tipo-habilidad/{tipoHabilidad}', [TipoHabilidadController::class, 'show'])->name('admin.tipo-habilidad.show');
        // Añadir registro
        Route::post('/tipo-habilidad', [TipoHabilidadController::class, 'store'])->name('admin.tipo-habilidad.store');
        // eliminacion de registro
        Route::delete('/tipo-habilidad/{tipoHabilidad}', [TipoHabilidadController::class, 'destroy'])->name('admin.tipo-habilidad.destroy');
        //formulario de actualizacion de registro
        Route::get('/tipo-habilidad/edit-form/{tipoHabilidad}', [TipoHabilidadController::class, 'edit'])->name('admin.tipo-habilidad.edit');
        //realiza la actualizacion
        Route::put('/tipo-habilidad/{tipoHabilidad}', [TipoHabilidadController::class, 'update'])->name('admin.tipo-habilidad.update');


        //tipos de imagen
        Route::get('/tipo-imagen', [TipoImagenController::class, 'index'])->name('admin.tipo-imagen.index');

        Route::get('/tipo-imagen/create-form', [TipoImagenController::class, 'create'])->name('admin.tipo-imagen.create');

        Route::get('/tipo-imagen/{tipoImagen}', [TipoImagenController::class, 'show'])->name('admin.tipo-imagen.show');
        // Añadir registro
        Route::post('/tipo-imagen', [TipoImagenController::class, 'store'])->name('admin.tipo-imagen.store');
        // eliminacion de registro
        Route::delete('/tipo-imagen/{tipoImagen}', [TipoImagenController::class, 'destroy'])->name('admin.tipo-imagen.destroy');
        //formulario de actualizacion de registro
        Route::get('/tipo-imagen/edit-form/{tipoImagen}', [TipoImagenController::class, 'edit'])->name('admin.tipo-imagen.edit');
        //realiza la actualizacion
        Route::put('/tipo-imagen/{tipoImagen}', [TipoImagenController::class, 'update'])->name('admin.tipo-imagen.update');


        //controladores normales
        Route::get('/dato-personal', [DatoPersonalController::class, 'index'])->name('admin.dato-personal.index');

        Route::get('/contacto', [ContactoController::class, 'index'])->name('admin.contacto.index');

        Route::get('/experiencia', [ExperienciaController::class, 'index'])->name('admin.experiencia.index');

        Route::get('/habilidad', [HabilidadController::class, 'index'])->name('admin.habilidad.index');

        Route::get('/imagen', [ImagenController::class, 'index'])->name('admin.imagen.index');

        Route::get('/perfil', [PerfilController::class, 'index'])->name('admin.perfil.index');

    });


});

require __DIR__.'/auth.php';

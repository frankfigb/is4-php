<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\admin\TipoContactoController;
use App\Http\Controllers\admin\TipoExperienciaController;
use App\Http\Controllers\admin\TipoHabilidadController;
use App\Http\Controllers\admin\TipoImagenController;
use App\Http\Controllers\admin\ContactoController;
use App\Http\Controllers\admin\DatoPersonalController;
use App\Http\Controllers\admin\ExperienciaController;
use App\Http\Controllers\admin\HabilidadController;
use App\Http\Controllers\admin\ImagenController;
use App\Http\Controllers\admin\PerfilController;
use App\Http\Controllers\admin\ServicioController;


//Ruta raiz
Route::get('/', [HomeController::class, 'inicio'])->name('inicio');

//acerca de
Route::get('/acerca-de', [HomeController::class, 'acerca'])->name('acerca');

//resumen
Route::get('/resumen', [HomeController::class, 'resumen'])->name('resumen');

//servicios
Route::get('/servicios', [HomeController::class, 'servicios'])->name('servicios');

//portafolio
Route::get('/portafolio', [HomeController::class, 'portafolio'])->name('portafolio');

//contacto
Route::get('/contacto', [HomeController::class, 'contacto'])->name('contacto');

Route::get('/test', [HomeController::class, 'test'])->name('test');

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

    Route::prefix('/admin')->group(function () {
        // -------------------------------
        // Controladores de tipos
        // -------------------------------

        // Tipo contacto
        Route::get('/tipo-contacto', [TipoContactoController::class, 'index'])->name('admin.tipo-contacto.index');
        Route::get('/tipo-contacto/create-form', [TipoContactoController::class, 'create'])->name('admin.tipo-contacto.create');
        Route::get('/tipo-contacto/{tipoContacto}', [TipoContactoController::class, 'show'])->name('admin.tipo-contacto.show');
        Route::post('/tipo-contacto', [TipoContactoController::class, 'store'])->name('admin.tipo-contacto.store');
        Route::delete('/tipo-contacto/{tipoContacto}', [TipoContactoController::class, 'destroy'])->name('admin.tipo-contacto.destroy');
        Route::get('/tipo-contacto/edit-form/{tipoContacto}', [TipoContactoController::class, 'edit'])->name('admin.tipo-contacto.edit');
        Route::put('/tipo-contacto/{tipoContacto}', [TipoContactoController::class, 'update'])->name('admin.tipo-contacto.update');

        // Tipo experiencia
        Route::get('/tipo-experiencia', [TipoExperienciaController::class, 'index'])->name('admin.tipo-experiencia.index');
        Route::get('/tipo-experiencia/create-form', [TipoExperienciaController::class, 'create'])->name('admin.tipo-experiencia.create');
        Route::get('/tipo-experiencia/{tipoExperiencia}', [TipoExperienciaController::class, 'show'])->name('admin.tipo-experiencia.show');
        Route::post('/tipo-experiencia', [TipoExperienciaController::class, 'store'])->name('admin.tipo-experiencia.store');
        Route::delete('/tipo-experiencia/{tipoExperiencia}', [TipoExperienciaController::class, 'destroy'])->name('admin.tipo-experiencia.destroy');
        Route::get('/tipo-experiencia/edit-form/{tipoExperiencia}', [TipoExperienciaController::class, 'edit'])->name('admin.tipo-experiencia.edit');
        Route::put('/tipo-experiencia/{tipoExperiencia}', [TipoExperienciaController::class, 'update'])->name('admin.tipo-experiencia.update');

        // Tipo habilidad
        Route::get('/tipo-habilidad', [TipoHabilidadController::class, 'index'])->name('admin.tipo-habilidad.index');
        Route::get('/tipo-habilidad/create-form', [TipoHabilidadController::class, 'create'])->name('admin.tipo-habilidad.create');
        Route::get('/tipo-habilidad/{tipoHabilidad}', [TipoHabilidadController::class, 'show'])->name('admin.tipo-habilidad.show');
        Route::post('/tipo-habilidad', [TipoHabilidadController::class, 'store'])->name('admin.tipo-habilidad.store');
        Route::delete('/tipo-habilidad/{tipoHabilidad}', [TipoHabilidadController::class, 'destroy'])->name('admin.tipo-habilidad.destroy');
        Route::get('/tipo-habilidad/edit-form/{tipoHabilidad}', [TipoHabilidadController::class, 'edit'])->name('admin.tipo-habilidad.edit');
        Route::put('/tipo-habilidad/{tipoHabilidad}', [TipoHabilidadController::class, 'update'])->name('admin.tipo-habilidad.update');

        // Tipo imagen
        Route::get('/tipo-imagen', [TipoImagenController::class, 'index'])->name('admin.tipo-imagen.index');
        Route::get('/tipo-imagen/create-form', [TipoImagenController::class, 'create'])->name('admin.tipo-imagen.create');
        Route::get('/tipo-imagen/{tipoImagen}', [TipoImagenController::class, 'show'])->name('admin.tipo-imagen.show');
        Route::post('/tipo-imagen', [TipoImagenController::class, 'store'])->name('admin.tipo-imagen.store');
        Route::delete('/tipo-imagen/{tipoImagen}', [TipoImagenController::class, 'destroy'])->name('admin.tipo-imagen.destroy');
        Route::get('/tipo-imagen/edit-form/{tipoImagen}', [TipoImagenController::class, 'edit'])->name('admin.tipo-imagen.edit');
        Route::put('/tipo-imagen/{tipoImagen}', [TipoImagenController::class, 'update'])->name('admin.tipo-imagen.update');

        // -------------------------------
        // Controladores normales
        // -------------------------------

        Route::get('/dato-personal', [DatoPersonalController::class, 'index'])->name('admin.dato-personal.index');
        Route::get('/contacto', [ContactoController::class, 'index'])->name('admin.contacto.index');
        Route::get('/experiencia', [ExperienciaController::class, 'index'])->name('admin.experiencia.index');
        Route::get('/habilidad', [HabilidadController::class, 'index'])->name('admin.habilidad.index');
        Route::get('/perfil', [PerfilController::class, 'index'])->name('admin.perfil.index');

        // -------------------------------
        // Imagen (nuevo ABM)
        // -------------------------------
        Route::get('/imagen', [ImagenController::class, 'index'])->name('admin.imagen.index');
        Route::get('/imagen/create-form', [ImagenController::class, 'create'])->name('admin.imagen.create');
        Route::get('/imagen/{imagen}', [ImagenController::class, 'show'])->name('admin.imagen.show');
        Route::post('/imagen', [ImagenController::class, 'store'])->name('admin.imagen.store');
        Route::delete('/imagen/{imagen}', [ImagenController::class, 'destroy'])->name('admin.imagen.destroy');
        Route::get('/imagen/edit-form/{imagen}', [ImagenController::class, 'edit'])->name('admin.imagen.edit');
        Route::put('/imagen/{imagen}', [ImagenController::class, 'update'])->name('admin.imagen.update');

        Route::get('/servicio', [ServicioController::class, 'index'])->name('admin.servicio.index');
        Route::get('/servicio/create-form', [ServicioController::class, 'create'])->name('admin.servicio.create');
        Route::get('/servicio/{servicio}', [ServicioController::class, 'show'])->name('admin.servicio.show');
        Route::post('/servicio', [ServicioController::class, 'store'])->name('admin.servicio.store');
        Route::delete('/servicio/{servicio}', [ServicioController::class, 'destroy'])->name('admin.servicio.destroy');
        Route::get('/servicio/edit-form/{servicio}', [ServicioController::class, 'edit'])->name('admin.servicio.edit');
        Route::put('/servicio/{servicio}', [ServicioController::class, 'update'])->name('admin.servicio.update');

    });
});

require __DIR__.'/auth.php';

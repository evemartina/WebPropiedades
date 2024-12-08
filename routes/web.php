<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\GeneralInformationController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PropertyController;
use Illuminate\Support\Facades\Route;


// ***********rutas publicas**********
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/properties/filter', [HomeController::class, 'filter'])->name('properties.filter');


Route::get('search', [HomeController::class, 'search'])->name('listings.search');
Route::get('home/{id}/show', [HomeController::class, 'show'])->name('listings.show');
Route::get('about', [HomeController::class, 'about'])->name('about');
Route::get('contact', [HomeController::class, 'contact'])->name('contact');

Route::post('enviarCorreo', [HomeController::class, 'enviarCorreo'])->name('enviarCorreo');
Route::post('enviarCorreoPropiedad', [HomeController::class, 'enviarCorreoPropiedad'])->name('enviarCorreoPropiedad');





// ***********rutas privadas**********
Route::middleware(['auth'])->group(function () {

    Route::get('/admin/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
    Route::resource('/properties', PropertyController::class);
    Route::post('/properties/{id}/cambiar-estado', [PropertyController::class, 'cambiarEstado'])->name('properties.cambiarEstado');
    Route::get('/properties/actualizar', [PropertyController::class, 'actualizar'])->name('properties.actualizar');
    Route::resource('general-information', GeneralInformationController::class);



});


require __DIR__ . '/auth.php';

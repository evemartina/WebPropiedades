<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PropertyController ;
use Illuminate\Support\Facades\Route;


// ***********rutas publicas**********
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/properties/filter', [HomeController::class, 'filter'])->name('properties.filter');


Route::get('search', [HomeController::class, 'search'])->name('listings.search');
Route::get('show', [HomeController::class, 'show'])->name('listings.show');
Route::get('listings', [HomeController::class, 'show'])->name('listings');
Route::get('about', [HomeController::class, 'show'])->name('about');
Route::get('contact', [HomeController::class, 'show'])->name('contact');


// ***********rutas privadas**********
Route::middleware(['auth'])->group(function () {

    Route::get('/admin/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
    // Route::get('/admin/', [AdminController::class, 'index'])->name('admin.properties.index');
    Route::resource('/properties',PropertyController::class);
});


require __DIR__.'/auth.php';

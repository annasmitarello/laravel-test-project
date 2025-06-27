<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PersonaController;
use App\Http\Controllers\AutoController;
use App\Http\Controllers\UserController;




Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::resource('personas', PersonaController::class)->middleware('auth');

Route::resource('autos', AutoController::class)->middleware('auth');

Route::resource('users',  ProfileController::class);

Route::apiResource('personas', PersonaController::class)->middleware('auth');

Route::apiResource('autos', AutoController::class)->middleware('auth');


require __DIR__.'/auth.php';

<?php

use App\Http\Controllers\ProjectController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Rutas de proyectos
Route::get('/projects', [ProjectController::class, 'index'])->name('projects.index');

require __DIR__.'/auth.php';

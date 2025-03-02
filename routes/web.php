<?php

use App\Http\Controllers\ApiController;
use App\Http\Controllers\PluginController;
use App\Http\Controllers\ProjectController;
use App\Models\Plugin;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    $plugins = Plugin::all();

    return view('dashboard', compact('plugins'));
})->middleware(['auth', 'verified'])->name('dashboard');

// Rutas de proyectos
Route::get('/projects', [ProjectController::class, 'index'])->name('projects.index');
Route::get('/projects/create', [ProjectController::class, 'create'])->name('projects.create');
Route::post('/projects', [ProjectController::class, 'store'])->name('projects.store');
Route::get('/projects/{project}', [ProjectController::class, 'show'])->name('projects.show');
Route::get('/projects/{project}/edit', [ProjectController::class, 'edit'])->name('projects.edit');
Route::put('/projects/{project}', [ProjectController::class, 'update'])->name('projects.update');
Route::delete('/projects/{project}', [ProjectController::class, 'destroy'])->name('projects.destroy');

// Rutas de plugins
Route::get('/projects/{project}/plugins', [PluginController::class, 'index'])->name('plugins.index');
Route::get('/projects/{project}/plugins/create', [PluginController::class, 'create'])->name('plugins.create');
Route::post('/projects/{project}/plugins', [PluginController::class, 'store'])->name('plugins.store');
Route::get('/projects/{project}/plugins/{plugin}/edit', [PluginController::class, 'edit'])->name('plugins.edit');
Route::put('/projects/{project}/plugins/{plugin}', [PluginController::class, 'update'])->name('plugins.update');
Route::delete('/projects/{project}/plugins/{plugin}', [PluginController::class, 'destroy'])->name('plugins.destroy');
Route::get('/pluginsmonitoring', [PluginController::class, 'pluginsMonitoring'])->name('plugins.monitoring');

// Rutas de API - Vulnerabilidades
Route::get('/vulnerabilities', [ApiController::class, 'index'])->name('api.vulnerabilities');
Route::get('/filter-vulnerabilities', [ApiController::class, 'filterVulnerabilities'])->name('filter.vulnerabilities');


require __DIR__.'/auth.php';

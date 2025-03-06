<?php

use App\Http\Controllers\PluginController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\VulnerabilityController;
use App\Models\Plugin;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
        $pluginsAll = Plugin::latest()->get();
        $plugins = [];

        foreach ($pluginsAll as $plugin) {
            $plugins[] = [
                'slug' => $plugin->slug,
                'version' => $plugin->version,
                'name' => $plugin->name,
                'project_id' => $plugin->project
            ];
        }

        $vulnerabilities = [];

        foreach ($plugins as $pluginData) {
            $response = Http::get("https://www.wpvulnerability.net/plugin/{$pluginData['slug']}/");

            if ($response->successful()) {
                $data = $response->json();

                if (!empty($data['data']['vulnerability'])) {
                    foreach ($data['data']['vulnerability'] as $vulnerability) {
                        $vulnVersion = $vulnerability['operator']['max_version'] ?? 'N/A';

                        if ($vulnVersion !== 'N/A' && version_compare($vulnVersion, $pluginData['version'], '>=')) {
                            $vulnerabilities[] = [
                                'plugin' => $pluginData['name'],
                                'version' => $vulnVersion,
                                'link' => $vulnerability['source'][0]['link'] ?? 'Sin enlace',
                                'severity' => $vulnerability['impact']['cvss']['severity'] ?? 'Sin datos',
                                'project_id' => $pluginData['project_id']['name']
                            ];
                        }
                    }
                }
            }
        }

        return view('dashboard', compact('pluginsAll', 'vulnerabilities'));
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

// Rutas de vulnerabilidades
Route::get('/vulnerabilities', [VulnerabilityController::class, 'index'])->name('vulnerabilities.index');
Route::get('/vulnerabilities/filter', [VulnerabilityController::class, 'filterVulnerabilities'])->name('vulnerabilities.vulnerabilities');

// Rutas de notificaciones
Route::get('/notifications', function () {
    return view('notifications.index');
})->name('notifications.index');

require __DIR__.'/auth.php';

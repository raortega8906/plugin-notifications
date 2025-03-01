<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;
use App\Models\Plugin;
use App\Models\Project;

class ApiController extends Controller
{
    public function index()
    {

        $pluginsAll = Plugin::all();
        $plugins = [];

        foreach ($pluginsAll as $plugin) {
            $plugins[] = $plugin->slug;
        }

        $vulnerabilities = [];

        foreach ($plugins as $plugin) {
            $response = Http::get("https://www.wpvulnerability.net/plugin/{$plugin}/");

            if ($response->successful()) {
                $data = $response->json();

                if (!empty($data['data']['vulnerability'])) {
                    foreach ($data['data']['vulnerability'] as $vuln) {
                        $vulnerabilities[] = [
                            'plugin' => $plugin,
                            'name' => $vuln['name'] ?? 'Desconocido',
                            'version' => $vuln['operator']['max_version'] ?? 'N/A',
                            'description' => $vuln['source'][0]['description'] ?? 'Sin descripción',
                            'severity' => $vuln['impact']['cwe'][0]['name'] ?? 'Sin datos'
                        ];
                    }
                }

            }

        }

        return view('api', compact('vulnerabilities'));
    }

    public function filterVulnerabilities()
    {
        $pluginsAll = Plugin::all();
        $plugins = [];

        // Obtener slugs y versiones de los plugins en la base de datos
        foreach ($pluginsAll as $plugin) {
            $plugins[$plugin->slug] = $plugin->version; 
        }

        $vulnerabilities = [];

        foreach ($plugins as $plugin => $version) {
            $response = Http::get("https://www.wpvulnerability.net/plugin/{$plugin}/");

            if ($response->successful()) {
                $data = $response->json();

                if (!empty($data['data']['vulnerability'])) {
                    foreach ($data['data']['vulnerability'] as $vuln) {
                        $vulnVersion = $vuln['operator']['max_version'] ?? 'N/A';

                        // Comparar versiones y filtrar
                        if ($vulnVersion !== 'N/A' && version_compare($vulnVersion, $version, '<=')) {
                            $vulnerabilities[] = [
                                'plugin' => $plugin,
                                'name' => $vuln['name'] ?? 'Desconocido',
                                'version' => $vulnVersion,
                                'description' => $vuln['source'][0]['description'] ?? 'Sin descripción',
                                'severity' => $vuln['impact']['cwe'][0]['name'] ?? 'Sin datos'
                            ];
                        }
                    }
                }
            }
        }

        return response()->json($vulnerabilities);
    }
    
}
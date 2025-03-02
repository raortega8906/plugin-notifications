<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;
use App\Models\Plugin;

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
                            'version' => $vuln['operator']['max_version'] ?? 'N/A',
                            'description' => $vuln['source'][0]['description'] ?? 'Sin descripción',
                            'score' => $vuln['impact']['cvss']['score'] ?? 'Sin datos',
                            'severity' => $vuln['impact']['cvss']['severity'] ?? 'Sin datos'
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
                        if ($vulnVersion !== 'N/A' && version_compare($vulnVersion, $version, '=')) {

                            if ($vuln['impact'] == []) { 
                                $vulnerabilities[] = [
                                    'plugin' => $plugin,
                                    'version' => $vulnVersion,
                                    'description' => $vuln['source'][1]['description'] ?? 'Sin descripción',
                                    'score' => $vuln['source'][0]['name'] ?? 'Sin datos',
                                    'severity' => $vuln['source'][0]['link'] ?? 'Sin datos'
                                ];
                            }
                            else { 
                                $vulnerabilities[] = [
                                    'plugin' => $plugin,
                                    'version' => $vuln['operator']['max_version'] ?? 'N/A',
                                    'description' => $vuln['source'][0]['description'] ?? 'Sin descripción',
                                    'score' => $vuln['impact']['cvss']['score'] ?? 'Sin datos',
                                    'severity' => $vuln['impact']['cvss']['severity'] ?? 'Sin datos'
                                ];
                            }
                        }
                    }
                }
            }
        }

        return view('filter-vulnerabilities', compact('vulnerabilities'));
    }
    
}
<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;

class ApiController extends Controller
{
    public function index()
    {
        // Obtener la respuesta de la API ejemplo con un plugin
        $response = Http::get('https://www.wpvulnerability.net/plugin/elementor/');
        
        $data = $response->json();

        $vulnerabilities = $data['data']['vulnerability']; 

        return view('api', compact('data', 'vulnerabilities'));
    }

}

<?php

namespace Database\Seeders;

use App\Models\Project;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Rafael A. Ortega',
            'email' => 'raortega8906@gmail.com',
            'password' => Hash::make('laravel2024.')
        ]);

        User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@admin.com',
            'password' => Hash::make('admin'),
        ]);

        $projects = [
            // Tecnología y Negocios  
            'CodeSphere',
            'InnovaTech',
            'Nexus Digital',
            'Visionary Hub',
            'Smart Flow',
        
            // Automoción y Transporte  
            'DriveXperience',
            'Speed Master',
            'AutoPulse',
            'EVolution Drive',
            'Road Legend',
        
            // Salud y Bienestar  
            'Vital Essence',
            'Serena Vida',
            'Cuidado Total',
            'Equilibrio Mujer',
            'Harmonia Vital',
        
            // Cultura y Medios  
            'ArsNova Media',
            'Latam Visión',
            'Nexo Cultural',
            'Contenido Vivo',
            'Horizon Creative'
        ];
        
        foreach ($projects as $project) {
            Project::create([
                'name' => $project,
                'user_id' => 1,
            ]);
        }
    }
}

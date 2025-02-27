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
            'Código Media',
            'Tena España - Centrada en ti',
            'Tena Italia - Dedicato a me',
            'Landing - Ultima menopausa da sola',
            'Tena Grecia - Syn seola',
            'Tena Portugal - Centrada em si',
            'Ford - The SUV Master',
            'Ford - Club Privilegio',
            'Ford - Sales Pro Talent',
            'Ibermedia - Programa Ibermedia',
            'Ibermedia - Ibermedia Digital',
            'Fitecbot',
            'Eurologística',
            'Vintage Ibiza',
            'Fundación Real Madrid',
            'Amaya Sangil',
            'Jesús nos cuenta',
            'Revista Me & My Mazda',
            'Virtual Vendor Video',
            'Lambda 3'
        ];

        foreach ($projects as $project) {
            Project::create([
                'name' => $project,
                'user_id' => 1,
            ]);
        }
    }
}

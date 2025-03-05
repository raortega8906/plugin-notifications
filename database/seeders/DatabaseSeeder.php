<?php

namespace Database\Seeders;

use App\Models\Plugin;
use App\Models\Project;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        // User::factory()->create([
        //     'name' => 'Rafael A. Ortega',
        //     'email' => 'raortega8906@gmail.com',
        //     'password' => Hash::make('laravel2024.')
        // ]);

        // Crear usuario administrador
        $admin = User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@admin.com',
            'password' => Hash::make('admin'),
        ]);

        // Seeder para proyectos
        $projects = [
            'CodeSphere',
            'InnovaTech',
            'Nexus Digital',
            'Visionary Hub',
            'Smart Flow',
        ];

        $projectInstances = [];

        foreach ($projects as $project) {
            $projectInstances[] = Project::create([
                'name' => $project,
                'user_id' => $admin->id,
            ]);
        }

        // Seeder para plugins primer proyecto
        $primaryPlugins = [
            ['name' => 'Advanced Custom Fields', 'slug' => 'advanced-custom-fields', 'version' => '6.3.12'],
            ['name' => 'All-in-One Security and Firewall Premium', 'slug' => 'aiosplugin', 'version' => '1.0.6'],
            ['name' => 'All In One WP Security', 'slug' => 'all-in-one-wp-security-and-firewall', 'version' => '5.3.8'],
            ['name' => 'Connect Polylang for Elementor', 'slug' => 'connect-polylang-elementor', 'version' => '2.4.5'],
            ['name' => 'Elementor', 'slug' => 'elementor', 'version' => '3.27.2'],
            ['name' => 'Elementor Pro', 'slug' => 'elementor-pro', 'version' => '3.27.3'],
            ['name' => 'Polylang', 'slug' => 'polylang', 'version' => '3.6.6'],
            ['name' => 'Redirection', 'slug' => 'redirection', 'version' => '5.5.1'],
        ];

        foreach ($primaryPlugins as $plugin) {
            Plugin::create([
                'name' => $plugin['name'],
                'slug' => $plugin['slug'],
                'version' => $plugin['version'],
                'project_id' => $projectInstances[0]->id,
            ]);
        }

        // Plugins para otros proyectos (reales)
        $otherPlugins = [
            ['name' => 'WooCommerce', 'slug' => 'woocommerce', 'version' => '8.0.3'],
            ['name' => 'Yoast SEO', 'slug' => 'wordpress-seo', 'version' => '21.2'],
            ['name' => 'WPForms', 'slug' => 'wpforms-lite', 'version' => '1.8.3'],
            ['name' => 'WP Super Cache', 'slug' => 'wp-super-cache', 'version' => '1.10.0'],
            ['name' => 'UpdraftPlus', 'slug' => 'updraftplus', 'version' => '1.23.12'],
            ['name' => 'WP Mail SMTP', 'slug' => 'wp-mail-smtp', 'version' => '3.8.1'],
            ['name' => 'Wordfence Security', 'slug' => 'wordfence', 'version' => '7.10.0'],
            ['name' => 'LiteSpeed Cache', 'slug' => 'litespeed-cache', 'version' => '5.5.2'],
            ['name' => 'Really Simple SSL', 'slug' => 'really-simple-ssl', 'version' => '7.0.1'],
            ['name' => 'Smush', 'slug' => 'wp-smushit', 'version' => '3.14.2'],
        ];

        // Distribuir plugins reales a otros proyectos
        $index = 0;
        for ($i = 1; $i < count($projectInstances); $i++) {
            for ($j = 0; $j < 3; $j++) {
                if (isset($otherPlugins[$index])) {
                    Plugin::create([
                        'name' => $otherPlugins[$index]['name'],
                        'slug' => $otherPlugins[$index]['slug'],
                        'version' => $otherPlugins[$index]['version'],
                        'project_id' => $projectInstances[$i]->id,
                    ]);
                    $index++;
                }
            }
        }

    }
}

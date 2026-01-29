<?php

namespace Database\Seeders;

use App\Models\Projects;
use App\Models\User;
use Illuminate\Database\Seeder;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = User::first();

        if (!$user) {
            $user = User::factory()->create([
                'name' => 'Demo User',
                'email' => 'demo@example.com',
            ]);
        }

        Projects::create([
            'user_id' => $user->id,
            'title' => 'E-Commerce Platform',
            'slug' => 'ecommerce-platform',
            'description' => 'A full-featured e-commerce platform built with Laravel and Vue.js. Features include user authentication, product catalog, shopping cart, and payment integration.',
            'thumbnail' => 'projects/ecommerce-thumb.jpg',
            'github_url' => 'https://github.com/example/ecommerce-platform',
            'live_url' => 'https://demo-ecommerce.example.com',
            'tech_stack' => json_encode(['Laravel', 'Vue.js', 'MySQL', 'Stripe API']),
            'views' => 1250,
        ]);

        Projects::create([
            'user_id' => $user->id,
            'title' => 'Task Management System',
            'slug' => 'task-management-system',
            'description' => 'A collaborative task management application with real-time updates, team collaboration features, and analytics dashboard.',
            'thumbnail' => 'projects/taskmanager-thumb.jpg',
            'github_url' => 'https://github.com/example/task-manager',
            'live_url' => 'https://tasks.example.com',
            'tech_stack' => json_encode(['Laravel', 'Livewire', 'Tailwind CSS', 'WebSocket']),
            'views' => 890,
        ]);

        Projects::create([
            'user_id' => $user->id,
            'title' => 'Weather Dashboard',
            'slug' => 'weather-dashboard',
            'description' => 'A responsive weather dashboard that displays real-time weather data, forecasts, and interactive maps for multiple locations.',
            'thumbnail' => 'projects/weather-thumb.jpg',
            'github_url' => 'https://github.com/example/weather-dashboard',
            'live_url' => 'https://weather.example.com',
            'tech_stack' => json_encode(['Laravel', 'React', 'OpenWeather API', 'Chart.js']),
            'views' => 2340,
        ]);

        Projects::create([
            'user_id' => $user->id,
            'title' => 'Blog Platform',
            'slug' => 'blog-platform',
            'description' => 'A modern blogging platform with markdown support, SEO optimization, comments system, and social sharing features.',
            'thumbnail' => 'projects/blog-thumb.jpg',
            'github_url' => 'https://github.com/example/blog-platform',
            'live_url' => 'https://blog.example.com',
            'tech_stack' => json_encode(['Laravel', 'Alpine.js', 'Tailwind CSS', 'Redis']),
            'views' => 1567,
        ]);

        Projects::create([
            'user_id' => $user->id,
            'title' => 'Inventory Management',
            'slug' => 'inventory-management',
            'description' => 'A comprehensive inventory management system for small businesses with barcode scanning, reporting, and supplier management.',
            'thumbnail' => 'projects/inventory-thumb.jpg',
            'github_url' => 'https://github.com/example/inventory-management',
            'live_url' => null,
            'tech_stack' => json_encode(['Laravel', 'Filament', 'PostgreSQL', 'QR Code']),
            'views' => 678,
        ]);
    }
}
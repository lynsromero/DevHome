<?php

namespace Database\Seeders;

use App\Models\Projects;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str; // Import Str for slugs

class ProjectSeeder extends Seeder
{
    public function run(): void
    {
        $user = User::first() ?? User::factory()->create([
            'name' => 'Demo User',
            'email' => 'demo@example.com',
        ]);

        $projects = [
            [
                'title' => 'E-Commerce Platform',
                'description' => 'A full-featured e-commerce platform built with Laravel and Vue.js.',
                'tech_stack' => ['Laravel', 'Vue.js', 'MySQL', 'Stripe API'],
                'thumbnail' => 'projects/ecommerce-thumb.jpg',
            ],
            [
                'title' => 'Task Management System',
                'description' => 'A collaborative task management application with real-time updates.',
                'tech_stack' => ['Laravel', 'Livewire', 'Tailwind CSS', 'WebSocket'],
                'thumbnail' => 'projects/taskmanager-thumb.jpg',
            ],
            [
                'title' => 'Weather Dashboard',
                'description' => 'A responsive weather dashboard that displays real-time weather data.',
                'tech_stack' => ['Laravel', 'React', 'OpenWeather API'],
                'thumbnail' => 'projects/weather-thumb.jpg',
            ],
        ];

        foreach ($projects as $item) {
            Projects::create([
                'user_id' => $user->id,
                'title' => $item['title'],
                'slug' => Str::slug($item['title']), // Generate slug here
                'description' => $item['description'],
                'thumbnail' => $item['thumbnail'],
                'github_url' => 'https://github.com/example',
                'live_url' => 'https://demo.example.com',
                'tech_stack' => $item['tech_stack'], // No json_encode needed!
                'views' => rand(500, 2000),
            ]);
        }
    }
}
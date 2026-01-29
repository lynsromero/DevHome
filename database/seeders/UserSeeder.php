<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'John Doe',
            'email' => 'john.doe@example.com',
            'email_verified_at' => now(),
            'password' => Hash::make('password'),
            'image' => 'images/download.jfif',
            'designation' => 'Full Stack Developer',
            'facebook_url' => 'https://facebook.com/johndoe',
            'linkedin_url' => 'https://linkedin.com/in/johndoe',
            'github_url' => 'https://github.com/johndoe',
            'experience' => '5+ years',
            'languages' => 'PHP, JavaScript, Python',
            'remember_token' => \Illuminate\Support\Str::random(10),
        ]);

        User::create([
            'name' => 'Jane Smith',
            'email' => 'jane.smith@example.com',
            'email_verified_at' => now(),
            'password' => Hash::make('password'),
            'image' => 'images/download (1).jfif',
            'designation' => 'UI/UX Designer',
            'facebook_url' => 'https://facebook.com/janesmith',
            'linkedin_url' => 'https://linkedin.com/in/janesmith',
            'github_url' => 'https://github.com/janesmith',
            'experience' => '3+ years',
            'languages' => 'html, CSS, JavaScript',
            'remember_token' => \Illuminate\Support\Str::random(10),
        ]);

        User::create([
            'name' => 'Ahmed Hassan',
            'email' => 'ahmed.hassan@example.com',
            'email_verified_at' => now(),
            'password' => Hash::make('password'),
            'image' => 'images/يشبهني.jfif',
            'designation' => 'Backend Developer',
            'facebook_url' => 'https://facebook.com/ahmedhassan',
            'linkedin_url' => 'https://linkedin.com/in/ahmedhassan',
            'github_url' => 'https://github.com/ahmedhassan',
            'experience' => '4+ years',
            'languages' => 'python, Ruby, Java',
            'remember_token' => \Illuminate\Support\Str::random(10),
        ]);

        User::create([
            'name' => 'Sarah Johnson',
            'email' => 'sarah.johnson@example.com',
            'email_verified_at' => now(),
            'password' => Hash::make('password'),
            'image' => 'images/Programming wallpaper.jfif',
            'designation' => 'DevOps Engineer',
            'facebook_url' => 'https://facebook.com/sarahjohnson',
            'linkedin_url' => 'https://linkedin.com/in/sarahjohnson',
            'github_url' => 'https://github.com/sarahjohnson',
            'experience' => '6+ years',
            'languages' => 'c++, Go, Bash',
            'remember_token' => \Illuminate\Support\Str::random(10),
        ]);

        User::create([
            'name' => 'Mike Wilson',
            'email' => 'mike.wilson@example.com',
            'email_verified_at' => now(),
            'password' => Hash::make('password'),
            'image' => 'images/4 Ridiculously Simple Ways to Print Hello World in Python.jfif',
            'designation' => 'Mobile Developer',
            'facebook_url' => 'https://facebook.com/mikewilson',
            'linkedin_url' => 'https://linkedin.com/in/mikewilson',
            'github_url' => 'https://github.com/mikewilson',
            'experience' => '2+ years',
            'languages' => 'node.js, Swift, Kotlin',
            'remember_token' => \Illuminate\Support\Str::random(10),
        ]);
    }
}
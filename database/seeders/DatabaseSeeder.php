<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Main roles (Super Admin + Admin + Teacher + Students)
        User::factory()->create([
            'name' => 'Super Admin',
            'email' => 'test@gmail.com',
            'password' => bcrypt('12345678'),
            'role' => User::ROLE_SUPER_ADMIN,
        ]);

        User::factory()->create([
            'name' => 'Sara Admin',
            'email' => 'sara@gmail.com',
            'password' => bcrypt('12345678'),
            'role' => User::ROLE_ADMIN,
        ]);

        User::factory()->create([
            'name' => 'Salma Admin',
            'email' => 'salma@gmail.com',
            'password' => bcrypt('12345678'),
            'role' => User::ROLE_ADMIN,
        ]);

        User::factory()->create([
            'name' => 'Teacher User',
            'email' => 'teacher@gmail.com',
            'password' => bcrypt('12345678'),
            'role' => User::ROLE_TEACHER,
        ]);

        User::factory()->create([
            'name' => 'Default Student',
            'email' => 'student@gmail.com',
            'password' => bcrypt('12345678'),
            'role' => User::ROLE_STUDENT,
        ]);
    }
}

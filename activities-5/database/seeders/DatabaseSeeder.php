<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Admin User
        User::factory()->create([
            'name' => 'admin',
            'full_name' => 'System Administrator',
            'role' => 'admin',
            'email' => 'admin@example.com',
            'password' => Hash::make('password123'),
        ]);

        // Regular User
        User::factory()->create([
            'name' => 'johndoe',
            'full_name' => 'John Doe',
            'role' => 'user',
            'email' => 'user@example.com',
            'password' => Hash::make('password123'),
        ]);
    }
}

<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Seeder Admin
        User::updateOrCreate(
            ['email' => 'admin@staimaswonogiri.ac.id'],
            [
                'name' => 'Admin LPPM',
                'password' => Hash::make('admin123'),
            ]
        );

        $this->call([
            MenuSeeder::class,
        ]);
    }
}
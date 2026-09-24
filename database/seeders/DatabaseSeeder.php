<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Seeder Admin Rumit & Aman
        User::updateOrCreate(
            ['email' => 'admin.lppm.auth2026@staimaswonogiri.ac.id'],
            [
                'name' => 'Administrator LPPM STAIMAS',
                'password' => Hash::make('LppmStaimas2026#SecureAdmin!'),
            ]
        );

        $this->call([
            MenuSeeder::class,
        ]);
    }
}
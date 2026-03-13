<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class WaiterSeeder extends Seeder
{
    public function run(): void
    {
        User::create([
            'name' => 'Carlos García',
            'email' => 'camarero@restaurante.com',
            'password' => Hash::make('camarero123'),
            'email_verified_at' => now(),
        ]);

        User::create([
            'name' => 'María López',
            'email' => 'maria@restaurante.com',
            'password' => Hash::make('camarero123'),
            'email_verified_at' => now(),
        ]);

        User::create([
            'name' => 'Admin',
            'email' => 'admin@restaurante.com',
            'password' => Hash::make('admin123'),
            'email_verified_at' => now(),
        ]);
    }
}

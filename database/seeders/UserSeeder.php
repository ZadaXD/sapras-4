<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        User::insert([
            [
                'name' => 'Calon Pengguna',
                'email' => 'calon@amiktaruna.ac.id',
                'password' => Hash::make('password'),
                'role' => 'calon_pengguna',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Wadir II',
                'email' => 'wadir@amiktaruna.ac.id',
                'password' => Hash::make('password'),
                'role' => 'wadir_ii',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Kabag SI',
                'email' => 'kabag@amiktaruna.ac.id',
                'password' => Hash::make('password'),
                'role' => 'kabag',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'PJ Lab',
                'email' => 'lab@amiktaruna.ac.id',
                'password' => Hash::make('password'),
                'role' => 'penanggung_jawab_lab',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}

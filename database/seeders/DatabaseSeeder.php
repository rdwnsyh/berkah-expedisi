<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        \App\Models\User::create([
            'name' => 'Administrator',
            'username' => 'admin',
            'email' => 'admin@admin.com',
            'password' => Hash::make('password123')
        ]);

        \App\Models\User::create([
            'name' => 'User Test',
            'username' => 'user',
            'email' => 'user@test.com',
            'password' => Hash::make('password123')
        ]);

        $this->call([
            CategoryArmadaSeeder::class,
            ArmadaSeeder::class
        ]);
    }
}

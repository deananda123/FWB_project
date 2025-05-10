<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    public function run()
    {
        User::create([
            'name' => 'Admin',
            'email' => 'admin@arteka.com',
            'password' => bcrypt('admin123'),
            'role' => 'admin',
        ]);

        User::create([
            'name' => 'Luna Marquez',
            'email' => 'luna.marquez@arteka.com',
            'password' => bcrypt('seniman123'),
            'role' => 'seniman',
        ]);

        User::create([
            'name' => 'Kai Nakamura',
            'email' => 'kai.nakamura@arteka.com',
            'password' => bcrypt('seniman123'),
            'role' => 'seniman',
        ]);

        User::create([
            'name' => 'Elise Moreau',
            'email' => 'elise.moreau@arteka.com',
            'password' => bcrypt('seniman123'),
            'role' => 'seniman',
        ]);

        User::create([
            'name' => 'Ethan Rivera',
            'email' => 'ethan.rivera@arteka.com',
            'password' => bcrypt('konsumen123'),
            'role' => 'konsumen',
        ]);

        User::create([
            'name' => 'Sofia Bennett',
            'email' => 'sofia.bennett@arteka.com',
            'password' => bcrypt('konsumen123'),
            'role' => 'konsumen',
        ]);

        User::create([
            'name' => 'Noah Kim',
            'email' => 'noah.kim@arteka.com',
            'password' => bcrypt('konsumen123'),
            'role' => 'konsumen',
        ]);
    }
}

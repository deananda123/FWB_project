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
            'name' => 'Seniman A',
            'email' => 'senimanA@arteka.com',
            'password' => bcrypt('seniman123'),
            'role' => 'seniman',
        ]);
    }
}

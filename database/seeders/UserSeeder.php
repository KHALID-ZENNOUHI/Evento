<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Gaveroche',
            'email' => 'gaveroche@gmail.com',
            'password' => bcrypt('gaveroche'),
            'role_id' => 1,
        ]);
    }
}

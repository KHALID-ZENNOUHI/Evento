<?php

namespace Database\Seeders;

use App\Models\Permission;
// use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $adminRole = \Spatie\Permission\Models\Role::create(['name' => 'admin', 'guard_name' => 'web']);
        $organizerRole = \Spatie\Permission\Models\Role::create(['name' => 'organizer', 'guard_name' => 'web']);
        $userRole = \Spatie\Permission\Models\Role::create(['name' => 'user', 'guard_name' => 'web']);
    }
}

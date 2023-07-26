<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (!Role::where('name', 'superadmin')->first()) Role::create(['name' => 'superadmin', 'guard_name' => 'web']);
        if (!Role::where('name', 'admin')->first()) Role::create(['name' => 'admin', 'guard_name' => 'web']);
        if (!Role::where('name', 'member')->first()) Role::create(['name' => 'member', 'guard_name' => 'web']);
    }
}

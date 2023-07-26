<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (!User::where(['email' => 'rahat@admin.com'])->first()) {
            $user = User::create([
                'email' => 'rahat@admin.com',
                'name' => 'superadmin',
                'password' => Hash::make('!@#dev2023!@#')
            ]);
            $user->syncRoles(['admin', 'superadmin']);
        }
    }
}

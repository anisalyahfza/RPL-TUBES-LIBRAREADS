<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::firstOrCreate(
            [
                'id' => '00000001-0000-0000-0000-000000000001',
                'email' => 'staff@gmail.com',
            ],
            [
                'name' => 'Staff',
                'password' => Hash::make('password'),
                'role' => 'ADMIN',
            ],
        );

        User::firstOrCreate(
            [
                'id' => '00000001-0000-0000-0000-000000000002',
                'email' => 'member@gmail.com',
            ],
            [
                'name' => 'Member',
                'password' => Hash::make('password'),
                'role' => 'MEMBER',
            ],
        );
        User::firstOrCreate(
            [
                'id' => '00000001-0000-0000-0000-000000000003',
                'email' => 'superadmin@gmail.com',
            ],
            [
                'name' => 'Admin',
                'password' => Hash::make('password'),
                'role' => 'SUPERADMIN',
            ],
        );
    }
}

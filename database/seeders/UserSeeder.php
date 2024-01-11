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
        User::insert([
            [
                'name' => 'Super Admin',
                'email' => 'imsystem.0001@gmail.com',
                'password' => Hash::make('password'),
                'created_at' => now(),
                'created_by' => 'imsystem.0001@gmail.com',
            ],
            [
                'name' => 'Admin',
                'email' => 'imsystem.0002@gmail.com',
                'password' => Hash::make('password'),
                'created_at' => now(),
                'created_by' => 'imsystem.0001@gmail.com',
            ],
            [
                'name' => 'Technician',
                'email' => 'imsystem.0003@gmail.com',
                'password' => Hash::make('password'),
                'created_at' => now(),
                'created_by' => 'imsystem.0001@gmail.com',
            ],
        ]);
    }
}

<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Role::insert([
            [
                'title' => 'admin'
            ],
            [
                'title' => 'personnel'
            ],
        ]);

        User::find(1)->roles()->sync(1);
    }
}

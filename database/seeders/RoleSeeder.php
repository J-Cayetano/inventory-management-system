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
                'title' => 'super_admin'
            ],
            [
                'title' => 'admin'
            ],
            [
                'title' => 'technician'
            ],
        ]);

        User::find(1)->roles()->sync(1);
        User::find(2)->roles()->sync(2);
        User::find(3)->roles()->sync(3);
    }
}

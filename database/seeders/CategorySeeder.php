<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Category::insert([
            [
                'code' => 'MNTR',
                'title' => 'Monitor',
                'created_at' => now(),
                'created_by' => 'imsystem.0001@gmail.com',
            ],
            [
                'code' => 'LPTP',
                'title' => 'Laptop',
                'created_at' => now(),
                'created_by' => 'imsystem.0001@gmail.com',
            ],
            [
                'code' => 'KYBR',
                'title' => 'Keyboard',
                'created_at' => now(),
                'created_by' => 'imsystem.0001@gmail.com',
            ],
        ]);
    }
}

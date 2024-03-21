<?php

namespace Database\Seeders;

use App\Models\Size;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SizeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Size::insert([
            [
                'code' => '8.4MM',
                'name' => '8.4 mm',
                'created_at' => '2024-01-01 05:12:03',
                'created_by' => 'imsystem.0001@gmail.com',
            ],
            [
                'code' => '',
                'name' => '',
                'created_at' => '2024-01-01 05:12:03',
                'created_by' => 'imsystem.0001@gmail.com',
            ],
        ]);
    }
}

<?php

namespace Database\Seeders;

use App\Models\Brand;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BrandSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Brand::insert([
            [
                'code' => 'Brand X',
                'name' => 'Branded X',
                'created_at' => '2024-01-01 05:12:03',
                'created_by' => 'imsystem.0001@gmail.com',
            ],
        ]);
    }
}

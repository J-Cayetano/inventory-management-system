<?php

namespace Database\Seeders;

use App\Models\Subcategory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SubcategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Subcategory::insert([
            [
                'code' => 'SPRK-PLG',
                'name' => 'Spark Plug',
                'category_id' => 1,
                'created_at' => '2024-01-01 05:12:03',
                'created_by' => 'imsystem.0001@gmail.com',
            ],
            [
                'code' => 'TAIL-LGHT',
                'name' => 'Tail Light',
                'category_id' => 1,
                'created_at' => '2024-01-01 05:12:03',
                'created_by' => 'imsystem.0001@gmail.com',
            ],
            [
                'code' => 'HEAD-LGHT',
                'name' => 'Head Light',
                'category_id' => 1,
                'created_at' => '2024-01-01 05:12:03',
                'created_by' => 'imsystem.0001@gmail.com',
            ],
            [
                'code' => 'CRNSHFT',
                'name' => 'Crankshaft',
                'category_id' => 2,
                'created_at' => '2024-01-01 05:12:03',
                'created_by' => 'imsystem.0001@gmail.com',
            ],
            [
                'code' => 'CYLN-HEAD',
                'name' => 'Cylinder Head',
                'category_id' => 2,
                'created_at' => '2024-01-01 05:12:03',
                'created_by' => 'imsystem.0001@gmail.com',
            ],
            [
                'code' => 'MUFF',
                'name' => 'Muffler',
                'category_id' => 3,
                'created_at' => '2024-01-01 05:12:03',
                'created_by' => 'imsystem.0001@gmail.com',
            ],
            [
                'code' => 'FL-TANK',
                'name' => 'Fuel Tank',
                'category_id' => 4,
                'created_at' => '2024-01-01 05:12:03',
                'created_by' => 'imsystem.0001@gmail.com',
            ],
            [
                'code' => 'DSC',
                'name' => 'Disc',
                'category_id' => 5,
                'created_at' => '2024-01-01 05:12:03',
                'created_by' => 'imsystem.0001@gmail.com',
            ],
            [
                'code' => 'FRNT-SHCK',
                'name' => 'Front Shock',
                'category_id' => 5,
                'created_at' => '2024-01-01 05:12:03',
                'created_by' => 'imsystem.0001@gmail.com',
            ],
        ]);
    }
}

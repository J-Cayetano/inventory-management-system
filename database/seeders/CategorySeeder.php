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
                'code' => 'ELCTC-CMPNTS',
                'name' => 'Electrical Components',
                'created_at' => '2024-01-01 05:12:03',
                'created_by' => 'imsystem.0001@gmail.com',
            ],
            [
                'code' => 'ENGN-CMPNTS',
                'name' => 'Engine Components',
                'created_at' => '2024-01-01 05:12:03',
                'created_by' => 'imsystem.0001@gmail.com',
            ],
            [
                'code' => 'EXH-SYS',
                'name' => 'Exhaust Systems',
                'created_at' => '2024-01-01 05:12:03',
                'created_by' => 'imsystem.0001@gmail.com',
            ],
            [
                'code' => 'FL-SYS',
                'name' => 'Fuel Systems',
                'created_at' => '2024-01-01 05:12:03',
                'created_by' => 'imsystem.0001@gmail.com',
            ],
            [
                'code' => 'SPSN-BRK',
                'name' => 'Suspension and Brake',
                'created_at' => '2024-01-01 05:12:03',
                'created_by' => 'imsystem.0001@gmail.com',
            ],
        ]);
    }
}

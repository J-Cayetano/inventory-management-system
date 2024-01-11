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
                'title' => 'Electrical Components',
                'created_at' => now(),
                'created_by' => 'imsystem.0001@gmail.com',
            ],
            [
                'code' => 'ENGN-CMPNTS',
                'title' => 'Engine Components',
                'created_at' => now(),
                'created_by' => 'imsystem.0001@gmail.com',
            ],
            [
                'code' => 'EXH-SYS',
                'title' => 'Exhaust Systems',
                'created_at' => now(),
                'created_by' => 'imsystem.0001@gmail.com',
            ],
            [
                'code' => 'FL-SYS',
                'title' => 'Fuel Systems',
                'created_at' => now(),
                'created_by' => 'imsystem.0001@gmail.com',
            ],
            [
                'code' => 'SPSN-BRK',
                'title' => 'Suspension and Brake',
                'created_at' => now(),
                'created_by' => 'imsystem.0001@gmail.com',
            ],
        ]);
    }
}

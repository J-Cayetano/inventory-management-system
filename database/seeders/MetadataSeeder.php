<?php

namespace Database\Seeders;

use App\Models\Metadata;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class MetadataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Metadata::insert([
            [
                'name' => 'color',
                'created_at' => '2024-01-01 05:12:03',
                'created_by' => 'imsystem.0001@gmail.com',
            ],
            [
                'name' => 'size',
                'created_at' => '2024-01-01 05:12:03',
                'created_by' => 'imsystem.0001@gmail.com',
            ],
            [
                'name' => 'capacity',
                'created_at' => '2024-01-01 05:12:03',
                'created_by' => 'imsystem.0001@gmail.com',
            ],
        ]);
    }
}

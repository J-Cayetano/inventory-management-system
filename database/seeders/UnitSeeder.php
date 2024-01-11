<?php

namespace Database\Seeders;

use App\Models\Unit;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UnitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Unit::insert([
            [
                'code' => 'PC',
                'title' => 'Piece',
                'created_at' => now(),
                'created_by' => 'imsystem.0001@gmail.com',
            ],
            [
                'code' => 'PCK',
                'title' => 'Pack',
                'created_at' => now(),
                'created_by' => 'imsystem.0001@gmail.com',
            ],
        ]);
    }
}

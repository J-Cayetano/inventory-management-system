<?php

namespace Database\Seeders;

use App\Models\ItemVariation;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ItemVariationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ItemVariation::insert([
            [
                "item_id" => 3,
                "color_id" => 1,
                "size_id" => 1,
                "cost_amount" => 1300.0,
                "selling_amount" => 1500.0,
                'quantity_stock' => 0,
                'quantity_sold' => 0,
                'minimum_stock' => 5,
                'maximum_stock' => null,
                "created_at" => '2024-01-01 05:12:03',
                "created_by" => "imsystem.0001@gmail.com"
            ],
        ]);
    }
}

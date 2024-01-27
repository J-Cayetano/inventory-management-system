<?php

namespace Database\Seeders;

use App\Models\Supplier;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SupplierSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Supplier::insert([
            [
                "code" => "LUIGI",
                "name" => "Team Luigi",
                "city" => "Makati",
                "address" => "Bld. 9, St. Makati",
                "email" => "team.luigi@info.com",
                "contact" => "09123456789",
                "created_at" => '2024-01-01 05:12:03',
                "created_by" => "imsystem.0001@gmail.com"
            ],
            [
                "code" => "JMG",
                "name" => "Juan Miguelito",
                "city" => "Mandaluyong",
                "address" => "Bld. 8, St. Mandaluyonh",
                "email" => "jmg@info.com",
                "contact" => "09123456799",
                "created_at" => '2024-01-01 05:12:03',
                "created_by" => "imsystem.0001@gmail.com"
            ],
            [
                "code" => "BCH",
                "name" => "Bosch",
                "city" => "Antipolo",
                "address" => "Bld. 7, St. Antipolo",
                "email" => "bch@info.com",
                "contact" => "09123456799",
                "created_at" => '2024-01-01 05:12:03',
                "created_by" => "imsystem.0001@gmail.com"
            ],
            [
                "code" => "MFX",
                "name" => "Mofox",
                "city" => "Manila",
                "address" => "Kamaong St.",
                "email" => "mofox@email.com",
                "contact" => "09128394123",
                "created_at" => '2024-01-01 05:12:03',
                "created_by" => "imsystem.0001@gmail.com"
            ]
        ]);
    }
}

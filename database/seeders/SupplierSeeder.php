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
                'code' => 'SMSNG',
                'name' => 'Samsung',
                'city' => 'Makati',
                'address' => 'Bld. 9, St. Makati',
                'email' => 'samsung@info.com',
                'contact' => '09123456789',
                'created_at' => now(),
                'created_by' => 'imsystem.0001@gmail.com',
            ],
            [
                'code' => 'LG',
                'name' => 'LG',
                'city' => 'Mandaluyong',
                'address' => 'Bld. 8, St. Mandaluyonh',
                'email' => 'lg@info.com',
                'contact' => '09123456789',
                'created_at' => now(),
                'created_by' => 'imsystem.0001@gmail.com',
            ],
            [
                'code' => 'XM',
                'name' => 'Xiaomi',
                'city' => 'Montalban',
                'address' => 'Bld. 7, St. Montalban',
                'email' => 'xiaomi@info.com',
                'contact' => '09123456789',
                'created_at' => now(),
                'created_by' => 'imsystem.0001@gmail.com',
            ],
        ]);
    }
}

<?php

namespace Database\Seeders;

use App\Models\Item;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Item::insert([
            [
                "code" => "BSCH-YR7D30-RDM-SPRK-PLG",
                "name" => "Bosch YR7DI30 Iridium Spark Plug",
                "photo" => "items/photo/oSI8rTgDjLTQepyvmfC8sZdDiaHdLHKeUbGhP3nd.jpg",
                "category_id" => 1,
                "unit_id" => 1,
                "supplier_id" => 3,
                "cost_price" => 1300.0,
                "selling_price" => 1500.0,
                "created_at" => now(),
                "created_by" => "imsystem.0001@gmail.com"
            ],
            [
                "code" => "LSGP-CRNKSHFT-TMX",
                "name" => "Alisgp Crankshaft TMX",
                "photo" => "items/photo/gVsMfPEJVFbkqlEBeJ18NWGpDIH9CfPcKzqfgcNs.jpg",
                "category_id" => 2,
                "unit_id" => 1,
                "supplier_id" => 2,
                "cost_price" => 1200.0,
                "selling_price" => 1500.0,
                "created_at" => now(),
                "created_by" => "imsystem.0001@gmail.com"
            ],
            [
                "code" => "MFX-D2-LSRGN-WHTYLW-FGLGHT",
                "name" => "MOFOX D2 Laser Gun White and Yellow Fog Light",
                "photo" => "items/photo/JR025IclWWeXLjLa90bLevc4Yn20JgKAnxUyxoFR.jpg",
                "category_id" => 1,
                "unit_id" => 2,
                "supplier_id" => 4,
                "cost_price" => 750.0,
                "selling_price" => 1100.0,
                "created_at" => now(),
                "created_by" => "imsystem.0001@gmail.com"
            ],
            [
                "code" => "MFX-TR1-LSRGN-MTRCYCL-LDLGHT",
                "name" => "MOFOX TR1 Laser Gun Motorcycle LED Light",
                "photo" => "items/photo/ofnWSLoaxppcBCXQus2NpGNVBfN7WESVKBbRLBN3.jpg",
                "category_id" => 1,
                "unit_id" => 2,
                "supplier_id" => 4,
                "cost_price" => 750.0,
                "selling_price" => 1100.0,
                "created_at" => now(),
                "created_by" => "imsystem.0001@gmail.com"
            ],
            [
                "code" => "MTRCYCL-HDLGHT-GRL-RTR",
                "name" => "Motorcycle Headlight Grille Retro",
                "photo" => "items/photo/SBbWUWR87V6j4xvsnPIRjGZkrMyC6q5ZfJl7xEsB.png",
                "category_id" => 1,
                "unit_id" => 1,
                "supplier_id" => 4,
                "cost_price" => 900.0,
                "selling_price" => 1250.0,
                "created_at" => now(),
                "created_by" => "imsystem.0001@gmail.com"
            ],
            [
                "code" => "MTRCYCL-LD-HDLGHT-NVRSL-RTR",
                "name" => "Motorcycle LED Headlight Universal Retro",
                "photo" => "items/photo/IxA1tCgbkeWqw3Z1UKbbb1gb1ngYxOdsyNci3Txz.jpg",
                "category_id" => 1,
                "unit_id" => 1,
                "supplier_id" => 4,
                "cost_price" => 1230.0,
                "selling_price" => 1550.0,
                "created_at" => now(),
                "created_by" => "imsystem.0001@gmail.com"
            ],
            [
                "code" => "MTRCYCL-TL-LGHT-CSRS-RFTNG-BRK-LGHTS",
                "name" => "Motorcycle Tail Light Accessories Refitting Brake Lights",
                "photo" => "items/photo/g5fVneIUixEi8jPf08bV2W9tjYyfn5NTjWTgnYH5.jpg",
                "category_id" => 1,
                "unit_id" => 2,
                "supplier_id" => 4,
                "cost_price" => 650.0,
                "selling_price" => 1000.0,
                "created_at" => now(),
                "created_by" => "imsystem.0001@gmail.com"
            ],
            [
                "code" => "CRNKSHFT-SMBLY-HND-XRM-125",
                "name" => "Crankshaft Assembly Honda XRM 125",
                "photo" => "items/photo/oSd2xtMEerukJyq7cYmynPMNJshga2QCuNM3Ol9C.jpg",
                "category_id" => 2,
                "unit_id" => 1,
                "supplier_id" => 1,
                "cost_price" => 1700.0,
                "selling_price" => 2000.0,
                "created_at" => now(),
                "created_by" => "imsystem.0001@gmail.com"
            ],
            [
                "code" => "CRNKSHFT-SMBLY-M-SPRTY",
                "name" => "Crankshaft Assembly Mio Sporty",
                "photo" => "items/photo/2JTcI5SauN8UoySLrbwFL491RbhekUCnLxYsRIy8.jpg",
                "category_id" => 2,
                "unit_id" => 1,
                "supplier_id" => 2,
                "cost_price" => 1700.0,
                "selling_price" => 2000.0,
                "created_at" => now(),
                "created_by" => "imsystem.0001@gmail.com"
            ],
            [
                "code" => "STNLS-PP-51M-BG-LBW-FR-TMX-150",
                "name" => "Stainless pipe 51mm big elbow for tmx 150",
                "photo" => "items/photo/ssqBBLl1uygpoRxuqfQPfZLT2yQ9REEDSemlpkhb.jpg",
                "category_id" => 3,
                "unit_id" => 2,
                "supplier_id" => 2,
                "cost_price" => 2340.0,
                "selling_price" => 2800.0,
                "created_at" => now(),
                "created_by" => "imsystem.0001@gmail.com"
            ],
            [
                "code" => "STNLS-PP-BG-LBW-51M-XM",
                "name" => "Stainless Pipe Big Elbow 51mm XM",
                "photo" => "items/photo/lZkkFWBYboyd130FVZshhAqgGK5OLHn4cy9hNnJ1.jpg",
                "category_id" => 3,
                "unit_id" => 2,
                "supplier_id" => 2,
                "cost_price" => 2405.0,
                "selling_price" => 2700.0,
                "created_at" => now(),
                "created_by" => "imsystem.0001@gmail.com"
            ],
            [
                "code" => "STNLS-STCK-LBW-XRM125",
                "name" => "Stainless stock elbow XRM125",
                "photo" => "items/photo/spYSZUjuiYMkflTCUlDYixYitJatqkNfNKmHHvOz.jpg",
                "category_id" => 3,
                "unit_id" => 2,
                "supplier_id" => 2,
                "cost_price" => 2560.0,
                "selling_price" => 2900.0,
                "created_at" => now(),
                "created_by" => "imsystem.0001@gmail.com"
            ],
            [
                "code" => "SGP-GNN-FL-TNK-FR-RDR-150-R150-CRB-ND-F1",
                "name" => "SGP Genuine Fuel Tank for Raider 150 R150 Carb and F1",
                "photo" => "items/photo/OrVcxtOaB6dIBZvHK5ZlW43yMWG4oPT95KcH0w1P.jpg",
                "category_id" => 4,
                "unit_id" => 2,
                "supplier_id" => 2,
                "cost_price" => 4122.0,
                "selling_price" => 4500.0,
                "created_at" => now(),
                "created_by" => "imsystem.0001@gmail.com"
            ]
        ]);
    }
}

<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Supplier;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Supplier::create(
            [
                "supplier_name" => "Eliod",
                "address" => "Kikoni",
                "mobile" => "0780487574",
                "email" => "elioda@gmail.com"
            ],
            [
                "supplier_name" => "Bruno",
                "address" => "Makerere",
                "mobile" => "0780423454",
                "email" => "bruno@gmail.com"
            ],
            [
                "supplier_name" => "Ema",
                "address" => "Wandegeya",
                "mobile" => "0780423452",
                "email" => "ema@gmail.com"
            ]
        );
    }
}

<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call([
            MonthSeeder::class,
            StaffStatusSeeder::class,
            StaffSeeder::class,
            CustomerSeeder::class,
            CitySeeder::class,
            TariffSeeder::class,
            WaterSupplierSeeder::class
        ]);
    }
}

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
            ConsumeTypeSeeder::class,
            WaterSupplierSeeder::class,
            CustomerSeeder::class,
            CitySeeder::class,
            TariffSeeder::class,
            CounterSeeder::class,
            MeterDataSeeder::class,
            WaterSourceSeeder::class
        ]);
    }
}

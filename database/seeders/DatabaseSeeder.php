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
            ConsumeTypeSeeder::class,
            WaterSupplierSeeder::class,
            CitySeeder::class,
            CustomerSeeder::class,
            TariffSeeder::class,
            StaffSeeder::class,
            CounterSeeder::class,
            MeterDataSeeder::class,
            WaterSourceSeeder::class,
            ResultSeeder::class
        ]);
    }
}

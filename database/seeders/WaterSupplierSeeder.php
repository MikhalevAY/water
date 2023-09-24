<?php

namespace Database\Seeders;

use App\Models\WaterSupplier;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class WaterSupplierSeeder extends Seeder
{
    public function run(): void
    {
        $suppliers = [];
        for ($i = 0; $i < 100; $i++) {
            $suppliers[] = [
                'bin' => rand(111111111111, 999999999999),
                'name' => fake()->company,
                'contract_number' => Str::random(8),
                'enclosed_at' => fake()->date,
                'validity_period' => rand(1, 12),
                'tariff_id' => rand(1, 10),
                'order_number' => '#' . Str::random(12),
                'order_created_at' => fake()->date,
                'order_started_at' => fake()->date,
                'water_sources' => json_encode([1,2,3]),
                'created_at' => now(),
            ];
        }

        WaterSupplier::query()->insert($suppliers);
    }
}

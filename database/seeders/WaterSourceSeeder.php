<?php

namespace Database\Seeders;

use App\Models\WaterSource;
use App\Models\WaterSupplier;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class WaterSourceSeeder extends Seeder
{
    public function run(): void
    {
        $sources = [];
        for ($i = 0; $i < 100; $i++) {

            $sources[] = [
                'water_source_id' => rand(10000, 99999),
                'name' => fake()->company,
                'location' => fake()->streetName,
                'ipvu' => Str::random(10),
                'water_suppliers' => json_encode(WaterSupplier::query()->inRandomOrder()->limit(3)->get()->pluck('bin')->toArray()),
                'created_at' => now(),
            ];
        }

        WaterSource::query()->insert($sources);
    }
}

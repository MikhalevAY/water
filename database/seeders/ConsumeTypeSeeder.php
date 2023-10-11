<?php

namespace Database\Seeders;

use App\Models\ConsumeType;
use Illuminate\Database\Seeder;

class ConsumeTypeSeeder extends Seeder
{
    public function run(): void
    {
        $types = [];
        for ($i = 0; $i < 100; $i++) {
            $types[] = [
                'name' => fake()->company,
                'payment' => rand(1000, 9999)
            ];
        }

        ConsumeType::query()->insert($types);
    }
}

<?php

namespace Database\Seeders;

use App\Models\Tariff;
use Illuminate\Database\Seeder;

class TariffSeeder extends Seeder
{
    public function run(): void
    {
        $tariffs = [
            ['name' => 'Tariff 1'],
            ['name' => 'Tariff 2'],
            ['name' => 'Tariff 3'],
            ['name' => 'Tariff 4'],
            ['name' => 'Tariff 5'],
            ['name' => 'Tariff 6'],
            ['name' => 'Tariff 7'],
            ['name' => 'Tariff 8'],
            ['name' => 'Tariff 9'],
            ['name' => 'Tariff 10'],
        ];

        Tariff::query()->insert($tariffs);
    }
}

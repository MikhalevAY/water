<?php

namespace Database\Seeders;

use App\Models\Counter;
use App\Models\MeterData;
use Illuminate\Database\Seeder;

class MeterDataSeeder extends Seeder
{
    public function run(): void
    {
        $data = [];

        foreach (Counter::all() as $counter) {
            $data[] = [
                'customer_account' => $counter->customer_account,
                'indication' => rand(1000, 9999),
                'month' => rand(1, 12),
                'year' => rand(2020, 2023),
                'staff_iin' => '123321123321',
                'consumed_volume' => rand(100, 1000),
                'counter_serial' => $counter->serial,
                'created_at' => now(),
            ];
        }

        MeterData::query()->insert($data);
    }
}

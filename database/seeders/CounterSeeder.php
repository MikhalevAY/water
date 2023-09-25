<?php

namespace Database\Seeders;

use App\Models\Counter;
use App\Models\Customer;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class CounterSeeder extends Seeder
{
    public function run(): void
    {
        $counters = [];

        foreach (Customer::all() as $customer) {
            $counters[] = [
                'serial' => Str::random(10),
                'customer_account' => $customer->account,
                'checked_at' => fake()->date,
                'created_at' => now()
            ];
        }
        Counter::query()->insert($counters);
    }
}

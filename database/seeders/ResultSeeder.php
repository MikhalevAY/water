<?php

namespace Database\Seeders;

use App\Models\Customer;
use App\Models\Result;
use Illuminate\Database\Seeder;

class ResultSeeder extends Seeder
{
    public function run(): void
    {
        $data = [];

        foreach (Customer::all() as $customer) {
            $data[] = [
                'customer_account' => $customer->account,
                'month' => rand(5, 9),
                'year' => date('Y'),
                'total_consumption' => rand(100, 999),
            ];
        }

        Result::query()->insert($data);

    }
}

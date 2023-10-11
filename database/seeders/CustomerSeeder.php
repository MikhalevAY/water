<?php

namespace Database\Seeders;

use App\Models\Customer;
use App\Models\WaterSupplier;
use Illuminate\Database\Seeder;

class CustomerSeeder extends Seeder
{
    public function run(): void
    {
        $customers = [];

        for ($i = 0; $i < 1; $i++) {
            $waterSupplier = WaterSupplier::find(rand(1,100));
            $customers[] = [
                'account' => rand(1000000, 9999999),
                'last_name' => fake()->lastName,
                'name' => fake()->name,
                'iin' => rand(111111111111, 999999999999),
                'water_supplier_bin' => $waterSupplier->bin,
                'registration_city_id' => rand(1, 100),
                'registration_address' => fake()->address,
                'residence_city_id' => rand(1, 100),
                'residence_address' => fake()->address,
                'amount_of_people' => rand(1, 5),
                'connected_at' => now(),
                'consume_type_id' => rand(1,20),
                'created_at' => now()
            ];
        }

        Customer::query()->insert($customers);
    }
}

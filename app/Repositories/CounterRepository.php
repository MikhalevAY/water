<?php

namespace App\Repositories;

use App\Models\Counter;
use App\RepositoryInterfaces\CounterRepositoryInterface;
use Illuminate\Support\Collection;

class CounterRepository implements CounterRepositoryInterface
{

    public function getWaterSupplierCustomers(int $bin): Collection
    {
        return Counter::query()
            ->select('counters.*')
            ->leftJoin('customers', 'customers.account', 'counters.customer_account')
            ->where('customers.water_supplier_bin', $bin)
            ->get();
    }
}

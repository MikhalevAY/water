<?php

namespace App\Repositories;

use App\Models\Customer;
use App\RepositoryInterfaces\CustomerRepositoryInterface;
use Illuminate\Support\Collection;

class CustomerRepository implements CustomerRepositoryInterface
{
    public function getWaterSupplierCustomers(string $bin): Collection
    {
        return Customer::WithLastMeterData()->where('water_supplier_bin', $bin)->get();
    }
}

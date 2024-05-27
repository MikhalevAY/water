<?php

namespace App\RepositoryInterfaces;

use Illuminate\Support\Collection;

interface CustomerRepositoryInterface
{
    public function getWaterSupplierCustomers(string $bin): Collection;
}

<?php

namespace App\RepositoryInterfaces;

use Illuminate\Support\Collection;

interface CounterRepositoryInterface
{
    public function getWaterSupplierCustomers(string $bin): Collection;
}

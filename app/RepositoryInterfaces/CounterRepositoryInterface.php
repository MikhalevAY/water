<?php

namespace App\RepositoryInterfaces;

use Illuminate\Support\Collection;

interface CounterRepositoryInterface
{
    public function getWaterSupplierCustomers(int $bin): Collection;
}

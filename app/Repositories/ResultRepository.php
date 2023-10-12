<?php

namespace App\Repositories;

use App\Models\Result;
use App\RepositoryInterfaces\ResultRepositoryInterface;

class ResultRepository implements ResultRepositoryInterface
{

    public function chartData(): array
    {
        $currentMonth = (int)date('m');

        return Result::query()
            ->selectRaw('SUM(results.total_consumption) as total_consumption, cities.code, results.month')
            ->leftJoin('customers', 'customers.account', 'results.customer_account')
            ->leftJoin('cities', 'cities.code', 'customers.registration_city_code')
            ->whereBetween('results.month', [$currentMonth - 5, $currentMonth - 1])
            ->where('results.year', date('Y'))
            ->groupBy('results.month', 'cities.code')
            ->orderBy('cities.code')
            ->orderBy('results.month')
            ->get()
            ->toArray();
    }
}

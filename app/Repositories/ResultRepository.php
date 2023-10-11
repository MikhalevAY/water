<?php

namespace App\Repositories;

use App\Models\Result;
use App\RepositoryInterfaces\ResultRepositoryInterface;

class ResultRepository implements ResultRepositoryInterface
{

    public function chartData(int $locationCode): array
    {
        $currentMonth = (int)date('m');

        return Result::query()
            ->selectRaw('SUM(results.total_consumption) as total_consumption, results.month')
            ->leftJoin('customers', 'customers.account', 'results.customer_account')
            ->where('customers.registration_city_code', $locationCode)
            ->whereBetween('results.month', [$currentMonth - 5, $currentMonth - 1])
            ->where('results.year', date('Y'))
            ->groupBy('results.month')
            ->orderBy('results.month')
            ->get()
            ->toArray();
    }
}

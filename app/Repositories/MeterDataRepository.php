<?php

namespace App\Repositories;

use App\Models\MeterData;
use App\RepositoryInterfaces\MeterDataRepositoryInterface;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class MeterDataRepository implements MeterDataRepositoryInterface
{

    public function getPaginated(string $bin, int $page): LengthAwarePaginator
    {
        return MeterData::query()
            ->with('photos')
            ->leftJoin('customers', 'customers.account', 'meter_data.customer_account')
            ->select('meter_data.*')
            ->where('customers.water_supplier_bin', $bin)
            ->orderBy('meter_data.id', 'desc')
            ->paginate(perPage: MeterData::PER_PAGE, page: $page);
    }

    public function store(array $params): MeterData
    {
        return MeterData::create($params);
    }
}

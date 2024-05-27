<?php

namespace App\RepositoryInterfaces;

use App\Models\MeterData;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

interface MeterDataRepositoryInterface
{
    public function getPaginated(string $bin, int $page): LengthAwarePaginator;

    public function store(array $params): MeterData;
}

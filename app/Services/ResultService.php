<?php

namespace App\Services;

use App\RepositoryInterfaces\ResultRepositoryInterface;
use Illuminate\Support\Arr;

class ResultService
{
    public function __construct(private readonly ResultRepositoryInterface $repository)
    {
    }

    public function chartData(): array
    {
        $data = [];

        foreach ($this->repository->chartData() as $row) {
            $data[$row['code']][] = Arr::except($row, 'code');
        }

        return $data;
    }
}

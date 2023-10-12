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
        $results = [];

        foreach ($this->repository->chartData() as $item) {
            $codeExists = false;
            foreach ($results as &$resultItem) {
                if ($resultItem['code'] === $item['code']) {
                    $codeExists = true;
                    $resultItem['data'][] = Arr::except($item, 'code');
                }
            }

            if (!$codeExists) {
                $results[] = [
                    'code' => $item['code'],
                    'data' => [Arr::except($item, 'code')],
                ];
            }
        }

        return $results;
    }
}

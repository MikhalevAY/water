<?php

namespace App\RepositoryInterfaces;

interface ResultRepositoryInterface
{
    public function chartData(int $locationCode): array;
}

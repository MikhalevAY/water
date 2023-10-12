<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\RepositoryInterfaces\ResultRepositoryInterface;
use Illuminate\Http\JsonResponse;

class ResultController extends Controller
{
    public function __construct(private readonly ResultRepositoryInterface $repository)
    {
    }

    public function index(): JsonResponse
    {
        return response()->json([
            'results' => $this->repository->chartData()
        ]);
    }
}

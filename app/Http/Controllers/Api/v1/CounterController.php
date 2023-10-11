<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Models\Counter;
use App\RepositoryInterfaces\CounterRepositoryInterface;
use Illuminate\Http\JsonResponse;

class CounterController extends Controller
{
    public function __construct(private readonly CounterRepositoryInterface $repository)
    {
    }

    public function index(): JsonResponse
    {
        return response()->json([
            'counters' => $this->repository->getWaterSupplierCustomers(auth()->user()->waterSupplier->bin),
        ]);
    }
}

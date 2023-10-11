<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\RepositoryInterfaces\CustomerRepositoryInterface;
use Illuminate\Http\JsonResponse;

class CustomerController extends Controller
{
    public function __construct(private readonly CustomerRepositoryInterface $repository)
    {
    }

    public function index(): JsonResponse
    {
        return response()->json([
            'customers' => $this->repository->getWaterSupplierCustomers(auth()->user()->waterSupplier->bin),
        ]);
    }
}

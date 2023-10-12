<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Services\ResultService;
use Illuminate\Http\JsonResponse;

class ResultController extends Controller
{
    public function __construct(private readonly ResultService $service)
    {
    }

    public function index(): JsonResponse
    {
        return response()->json([
            'results' => $this->service->chartData()
        ]);
    }
}

<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\MeterData\StoreRequest;
use App\Services\MeterDataService;
use Illuminate\Http\JsonResponse;

class MeterDataController extends Controller
{
    public function __construct(private readonly MeterDataService $meterDataService)
    {
    }

    public function index(int $page = 1): JsonResponse
    {
        $paginated = $this->meterDataService->getPaginated(auth()->user()->waterSupplier->bin, $page);

        return response()->json([
            'pages' => $paginated->lastPage(),
            'total' => $paginated->total(),
            'current_page' => $paginated->currentPage(),
            'meter_data' => $paginated->items(),
        ]);
    }

    public function store(StoreRequest $request): JsonResponse
    {
        return response()->json(
            $this->meterDataService->store($request->validated())
        );
    }
}

<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Models\WaterSource;
use Illuminate\Http\JsonResponse;

class WaterSourceController extends Controller
{
    public function index(): JsonResponse
    {
        return response()->json([
            'water_sources' => WaterSource::all(),
        ]);
    }
}

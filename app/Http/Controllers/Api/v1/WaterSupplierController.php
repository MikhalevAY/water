<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Models\WaterSupplier;
use Illuminate\Http\JsonResponse;

class WaterSupplierController extends Controller
{
    public function index(): JsonResponse
    {
        return response()->json([
            'water_suppliers' => WaterSupplier::all(),
        ]);
    }
}

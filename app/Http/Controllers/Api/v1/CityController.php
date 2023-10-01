<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Models\City;
use Illuminate\Http\JsonResponse;

class CityController extends Controller
{
    public function index(): JsonResponse
    {
        return response()->json([
            'regions' => City::query()->with(['districts', 'districts.children'])->get()
        ]);
    }

    public function byRegion(?int $regionId = null): JsonResponse
    {
        return response()->json([
            'districts' => City::query()->with('children')->where('city_id', $regionId)->get()
        ]);
    }
}

<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Models\City;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class CityController extends Controller
{
    public function index(): JsonResponse
    {
        return response()->json([
            'cities' => City::all()
        ]);
    }

    public function byCity(?int $cityId = null): JsonResponse
    {
        return response()->json([
            'cities' => City::query()->where('city_id', $cityId)->get()
        ]);
    }
}

<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Models\Tariff;
use Illuminate\Http\JsonResponse;

class TariffController extends Controller
{
    public function index(): JsonResponse
    {
        return response()->json([
            'cities' => Tariff::all(),
        ]);
    }
}

<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Models\Counter;
use Illuminate\Http\JsonResponse;

class CounterController extends Controller
{
    public function index(): JsonResponse
    {
        return response()->json([
            'counters' => Counter::all(),
        ]);
    }
}

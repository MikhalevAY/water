<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Models\Month;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class MonthController extends Controller
{
    public function index(): JsonResponse
    {
        return response()->json([
            'months' => Month::ordered()->get()
        ]);
    }
}

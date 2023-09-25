<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use Illuminate\Http\JsonResponse;

class CustomerController extends Controller
{
    public function index(): JsonResponse
    {
        return response()->json([
            'customers' => Customer::WithLastMeterData()->get(),
        ]);
    }
}

<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Models\UserStatus;
use Illuminate\Http\JsonResponse;

class StaffStatusController extends Controller
{
    public function index(): JsonResponse
    {
        return response()->json([
            'staff_statuses' => UserStatus::all()
        ]);
    }
}

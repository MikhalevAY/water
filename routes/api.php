<?php

use App\Http\Controllers\Api\v1\CityController;
use App\Http\Controllers\Api\v1\MonthController;
use App\Http\Controllers\Api\v1\StaffStatusController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::group(['middleware' => 'api', 'prefix' => 'v1'], function () {
    Route::get('/cities', [CityController::class, 'index']);
    Route::get('/months', [MonthController::class, 'index']);
    Route::get('/staff-statuses', [StaffStatusController::class, 'index']);
});

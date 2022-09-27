<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ApiProductController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ChartController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\RateController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ReportController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post('auth/login', [AuthController::class, 'login']);
Route::middleware('auth:sanctum')->group(function () {
    Route::get('product', [ApiProductController::class, 'index']);
    Route::get('product/{id}', [ApiProductController::class, 'show']);
    Route::post('auth/logout', [AuthController::class, 'logout']);

    Route::post('chart', [ChartController::class, 'add']);
    Route::get('chart', [ChartController::class, 'show']);
    Route::post('chart/edit/{id}', [ChartController::class, 'edit']);
    Route::post('chart/delete/{id}', [ChartController::class, 'delete']);

    Route::post('checkout', [CheckoutController::class, 'checkout']);

    Route::get('profile', [ProfileController::class, 'get']);
    Route::post('profile', [ProfileController::class, 'update']);
});

Route::get('report/user', [ReportController::class, 'user']);
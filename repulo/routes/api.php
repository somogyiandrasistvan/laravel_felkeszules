<?php

use App\Http\Controllers\AirlineController;
use App\Http\Controllers\TravelController;
use Illuminate\Http\Request;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::middleware('auth.basic')->group(function () {
    Route::get('travel_auth_users', [TravelController::class, 'travelAuthUsers']);
    Route::get('user_flights/{country}', [TravelController::class, 'showUserFlightsByAirLineCountry']);
});

Route::get('airlines', [AirlineController::class, 'index']);
Route::get('airlines/{id}', [AirlineController::class, 'show']);
Route::post('airlines', [AirlineController::class, 'store']);
Route::put('airlines/{id}', [AirlineController::class, 'update']);

//lekérdezés
Route::get('one_airline_flights/{airline_id}', [AirlineController::class, 'oneAirlineFlights']);
Route::delete('airline_today_delet/{name}', [AirlineController::class, 'airlineTodayDelet']);
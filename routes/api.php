<?php

use App\Http\Controllers\RomanNumeralController;
use App\Http\Controllers\RomanNumeralStatsController;

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
// main endpoint for the conversion
// automatically invoked via RomanNumeralController as it's a single action controller
Route::post('/get', RomanNumeralController::class);

Route::get('/stats/recent', [RomanNumeralStatsController::class, 'recent']);
Route::get('/stats/top', [RomanNumeralStatsController::class, 'topConversions']);

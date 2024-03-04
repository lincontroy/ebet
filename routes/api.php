<?php

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


Route::post('v1/stk', [App\Http\Controllers\ApiController::class, 'sendstk'])->name('sendstk');
Route::post('v1/payments', [App\Http\Controllers\ApiController::class, 'payments'])->name('payments');
Route::get('v1/registerurl', [App\Http\Controllers\ApiController::class, 'registerurl'])->name('registerurl');
Route::post('matches', [App\Http\Controllers\MatchesController::class, 'getMatches'])->name('getMatches');

Route::post('payments', [App\Http\Controllers\TransactionController::class, 'store'])->name('payments');

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

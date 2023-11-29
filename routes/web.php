<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return redirect(route("home"));
});

Auth::routes();

Route::middleware(['auth'])->group(function () {
    // Your authenticated routes go here
    Route::resource('/members', App\Http\Controllers\MemberController::class);
    Route::resource('/districts', App\Http\Controllers\DistrictController::class);
    Route::resource('/channels', App\Http\Controllers\ChannelController::class);
    Route::resource('/transactions', App\Http\Controllers\TransactionController::class);
    Route::post('/transaction/post', [App\Http\Controllers\TransactionController::class,'savetransaction'])->name('savetransaction');
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    
});


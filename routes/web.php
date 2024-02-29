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

// Route::get('/', function () {
//     // return redirect(route("home"));
//     return view('welcome');
    
// });
Route::get('match/{id}', [App\Http\Controllers\HomeController::class, 'match'])->name('match');
Route::get('/', [App\Http\Controllers\HomeController::class, 'homepage'])->name('home');
Route::get('/verify', [App\Http\Controllers\HomeController::class, 'verifycode'])->name('verify');
Route::post('/verifyPost', [App\Http\Controllers\HomeController::class, 'verifyPost'])->name('verifyPost');

Auth::routes();

Route::middleware(['auth'])->group(function () {
    // Your authenticated routes go here
    Route::resource('/members', App\Http\Controllers\MemberController::class);
    Route::resource('/leagues', App\Http\Controllers\LeaguesController::class);
    Route::resource('/teams', App\Http\Controllers\TeamsController::class);
    Route::resource('/matches', App\Http\Controllers\MatchesController::class);
    Route::resource('/notifications', App\Http\Controllers\NotificationsController::class);
    Route::resource('/expenses', App\Http\Controllers\ExpensesController::class);
    Route::resource('/districts', App\Http\Controllers\DistrictController::class);
    Route::resource('/channels', App\Http\Controllers\ChannelController::class);
    Route::resource('/transactions', App\Http\Controllers\TransactionController::class);
    Route::post('/transaction/post', [App\Http\Controllers\TransactionController::class,'savetransaction'])->name('savetransaction');
    Route::post('/expense/category', [App\Http\Controllers\ExpenseCategoryController::class,'store'])->name('store');
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::get('/getusers', [App\Http\Controllers\HomeController::class, 'getusers'])->name('getusers');
    Route::get('/createUser', [App\Http\Controllers\HomeController::class, 'createUser'])->name('createUser');
    Route::post('/createUserPost', [App\Http\Controllers\HomeController::class, 'createUserPost'])->name('createUserPost');
    Route::get('/reports', [App\Http\Controllers\ReportsController::class, 'index'])->name('index');
    Route::get('/logout', [App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('logout');
    
});


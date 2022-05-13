<?php

use App\Http\Controllers\Dashboard\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::prefix('dashboard')->name('dashboard.')->group(function () { 

    //LOGIN
    Route::get('/login', [UserController::class, 'index'])->name('user.login.get');
    Route::post('/login', [UserController::class, 'login'])->name('user.login.post');
    Route::post('/signup', [UserController::class, 'signup'])->name('user.signup.post');
});

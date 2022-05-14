<?php

use App\Http\Controllers\Dashboard\DashboardController;
use App\Http\Controllers\Dashboard\DashboardUniversityController;
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
    
    Route::middleware('auth')->group(function() {
        
        Route::get('/', [DashboardController::class, 'index'])->name('index.get');

        Route::get('/logout', [UserController::class, 'logout'])->name('user.logout.get');

        Route::prefix('universidade')->name('university.')->group(function () { 
            Route::get('/inscrever/{university}', [DashboardUniversityController::class, 'subscribe'])->name('subscribe.get');
            Route::post('/sugestao', [DashboardUniversityController::class, 'addSuggestion'])->name('suggestion.post');
        });
    });

    Route::prefix('usuario')->name('user.')->group(function () { 
        Route::get('/login', [UserController::class, 'index'])->name('login.get');
        Route::post('/login', [UserController::class, 'login'])->name('login.post');
        Route::post('/signup', [UserController::class, 'signup'])->name('signup.post');
    });

});

<?php

use App\Http\Controllers\API\UniversityAPIController;
use App\Http\Controllers\API\UserAPIController;
use Illuminate\Support\Facades\Route;


Route::get('universities', [UniversityAPIController::class, 'getUniversities'])->name('api.universities.get');
Route::get('university/{university}', [UniversityAPIController::class, 'getUniversity'])->name('api.university.get');

Route::post('user', [UserAPIController::class, 'login'])->name('api.user.login');

Route::middleware('auth:sanctum')->group(function (){ 
    Route::get('user', [UserAPIController::class, 'user'])->name('api.user.get');
});
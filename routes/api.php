<?php

use App\Http\Controllers\API\UniversityAPIController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('universities', [UniversityAPIController::class, 'getUniversities'])->name('api.universities.get');
Route::get('university/{university}', [UniversityAPIController::class, 'getUniversity'])->name('api.university.get');
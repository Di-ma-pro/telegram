<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\User;

// header('Access-Control-Allow-Origin: *');
// header('Access-Control-Allow-Headers: Authorization');

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/login', [App\Http\Controllers\Auth\Api\AuthController::class, 'login'])->name('apiLogin');


Route::middleware('auth:sanctum')->get('/get-user', function (Request $request) {
    return $request->user();
});

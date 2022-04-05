<?php

use App\Models\User;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Auth\ApiAuthController;
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



Route::group(['middleware' => ['cors', 'json.response']], function () {

    Route::post('/login', [ApiAuthController::class, 'login'])->name('login.api');
    Route::post('/register', [ApiAuthController::class, 'register'])->name('register.api');
    Route::post('/login', [ApiAuthController::class, 'login'])->name('login.api');
    Route::get('/user', [UserController::class, 'index'])->name('index.api');
});

Route::middleware('auth:api')->group(function () {

    // our routes to be protected will go in here
    Route::post('/logout', [ApiAuthController::class, 'logout'])->name('logout.api');
});

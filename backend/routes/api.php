<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\DateAchievement\DateAchievementController;
use App\Http\Controllers\Diet\DietController;
use App\Http\Controllers\DietDay\DietDishDayController;
use App\Http\Controllers\HistoryHealth\HistoryHealthController;
use App\Http\Controllers\New\NewController;
use App\Http\Controllers\Profile\UserController;
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

Route::prefix('v1')->group(function () {
    Route::controller(AuthController::class)->group(function () {
        Route::post('login', 'login');
//        Route::post('register', 'register');
        Route::post('logout', 'logout')->middleware('auth:api');
        Route::post('refresh', 'refresh');
    });

    Route::middleware('auth:api')->group(function () {
        Route::controller(UserController::class)->group(function () {
            Route::get('user', 'index')->middleware('auth:api');
        });

        Route::controller(DateAchievementController::class)->group(function () {
            Route::get('date-achievement', 'index')->middleware('auth:api');
        });

        Route::controller(HistoryHealthController::class)->group(function () {
            Route::get('history-heath', 'index');
        });

        Route::controller(DietController::class)->group(function () {
            Route::get('diet', 'index');
        });
        Route::controller(DietDishDayController::class)->group(function () {
            Route::get('diet-dish-day', 'index');
        });
    });

    Route::controller(NewController::class)->group(function () {
        Route::get('new', 'index');
    });
});



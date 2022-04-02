<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\API\ClientController;
use App\Http\Controllers\API\ClientInvoiceController;

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

Route::group(['prefix' => 'v1'], function(){

    #### Authentication routes #####
    Route::prefix('auth')->group( function () {
        Route::post('login', [AuthController::class, 'login']);
    });

    ######### Routes for logged user #########
    Route::middleware('auth:api')->group( function () {

        #### Authentication routes #####
        Route::prefix('auth')->group( function () {
            Route::post('logout', [AuthController::class, 'logout']);
        });

        ######### Client routes #########
        Route::apiResource('client', ClientController::class);
        Route::apiResource('client-invoice', ClientInvoiceController::class);

    });

});

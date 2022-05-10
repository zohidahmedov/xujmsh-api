<?php

use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'v1', 'middleware' => 'api', 'namespace' => 'Api'], function () {

    Route::group(['prefix' => 'auth'], function () {
        Route::post('login', 'AuthController@login')->name('login');
        Route::get('logout', 'AuthController@logout')->name('logout');
        Route::post('refresh', 'AuthController@refresh');
        Route::get('me', 'AuthController@me');
    });

    Route::middleware('auth:api')->group(function () {
        Route::apiResource('users', 'UserController');
        Route::apiResource('flats', 'FlatController');
        Route::apiResource('houses', 'HouseController');
        Route::apiResource('payment-types', 'PaymentTypeController');
        Route::apiResource('services', 'ServiceController');
        Route::apiResource('payments', 'PaymentController');
        Route::get('calculating-types', 'ServiceController@calculatingTypes');
        Route::get('flat-service/{flat}', 'FlatController@service');

        Route::group(['prefix' => 'resources'], function () {

        });

    });

});





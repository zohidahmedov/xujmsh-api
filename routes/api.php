<?php

use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'v1', 'middleware' => 'api', 'namespace' => 'Api'], function ($router) {

    Route::post('login', 'AuthController@login')->name('login');
    Route::get('logout', 'AuthController@logout')->name('logout');
    Route::post('refresh', 'AuthController@refresh');
    Route::post('auth/get-info', 'AuthController@me');

    Route::middleware('auth:api')->group(function () {
        Route::apiResource('users', 'UserController');

        Route::group(['prefix' => 'resources'], function () {

        });

    });

});




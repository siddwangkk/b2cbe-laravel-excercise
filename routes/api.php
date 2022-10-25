<?php

use Illuminate\Http\Request;
use app\Http\Controllers\ItemsApiController;
use app\Http\Controllers\ExchangeApiController;

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

Route::group(['prefix' => 'v1'], function() {
    Route::apiResource('items', 'ItemsApiController');
    Route::delete('items', 'ItemsApiController@clean');
    Route::apiResource('exchange', 'ExchangeApiController')->only(['index', 'show']);
});

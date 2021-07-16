<?php

use App\Http\Controllers\Api\MediaController;
use App\Http\Controllers\Api\PostmanController;
use App\Http\Controllers\Api\RestfulController;
use App\Http\Middleware\RestfulTokenIsValid;
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

Route::middleware('auth:api')
    ->get('/user', function (Request $request) {
        return $request->user();
    });

Route::resource('media', MediaController::class)
    ->middleware('auth:api');
Route::get('media', [MediaController::class, 'index']);

Route::group(['prefix' => 'restful/{resourceName}', 'middleware' => [RestfulTokenIsValid::class]],
    function () {
    Route::get('/', [RestfulController::class, 'list']);
    Route::get('/{dataId}', [RestfulController::class, 'detail']);
    Route::post('/', [RestfulController::class, 'store']);
    Route::put('/{dataId}', [RestfulController::class, 'update']);
    Route::delete('/{dataId}', [RestfulController::class, 'destroy']);
});


Route::group(['prefix' => 'postman'], function () {
    Route::get('{dataset_id}-c/{file_name}', [PostmanController::class, 'collection']);
    Route::get('{dataset_id}-e/{file_name}', [PostmanController::class, 'environment']);
});

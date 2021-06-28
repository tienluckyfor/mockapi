<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\RallydataController;
use App\Http\Controllers\Api\PostmanController;
use App\Http\Controllers\Api\MediaController;

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

Route::resource('media', MediaController::class)
    ->middleware('auth:api');

Route::resource('restful', RallydataController::class);
Route::get('restful/{datasetId}/{resourceName}', [RallydataController::class, 'list']);
Route::get('restful/{datasetId}/{resourceName}/{dataId}', [RallydataController::class, 'detail']);

Route::group(['prefix' => 'postman'], function() {
    Route::get('{dataset_id}-c/{file_name}', [PostmanController::class, 'collection']);
    Route::get('{dataset_id}-e/{file_name}', [PostmanController::class, 'environment']);
});

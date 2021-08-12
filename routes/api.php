<?php

use App\Http\Controllers\Api\MediaController;
use App\Http\Controllers\Api\PostmanController;
use App\Http\Controllers\Api\RallyBackupController;
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

Route::group(['prefix' => 'rally_backup'], function () {
    Route::get('export', [RallyBackupController::class, 'export']);
    Route::post('import', [RallyBackupController::class, 'import'])
        ->middleware('auth:api');
});


Route::group(['prefix' => 'backup'], function () {
    $export = new \App\Services\Backup\ExportService();
    $import = new \App\Services\Backup\ImportService();

    Route::get('export', function () use ($export) {
        return $export->database()->files('media')->download();
    });
    Route::group(['prefix' => 'import'], function () use ($import) {
        Route::get('take', function () use ($import) {
            $export_url = request()->export_url;
            return response()->json(['status' => $import->take($export_url)]);
        });
        Route::get('list', function () use ($import) {
            $list = $import->list();
            return response()->json(['data' => $list, 'status' => true]);
        });
        Route::get('process', function () use ($import) {
            $fName = request()->fName;
            $process = request()->process;
            switch ($process){
                case 'databases':
                    $import->process($fName)->database();
                    break;
                case 'files':
                    $import->process($fName)->files('media');
                    break;
                case 'databases_files':
                    $import->process($fName)->database()->files('media');
                    break;
            }
            return response()->json(['status' => true]);
        });
    });
});
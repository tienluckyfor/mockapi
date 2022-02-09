<?php

use App\Http\Controllers\Api\MediaController;
use App\Http\Controllers\Api\PostmanController;
use App\Http\Controllers\Api\RallyBackupController;
use App\Http\Controllers\Api\RestfulController;
use App\Http\Middleware\RallyTokenIsValid;
use App\Http\Middleware\RestfulTokenIsValid;
use App\Http\Middleware\ResourceAuthCheck;
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

Route::get('restful/test', function () {
    $res = [
        'status' => true,
        'data' => [
            'name'=>'Tien',
            'date'=>'2022-11-11'
        ],
    ];
    return response()->json($res);
});

Route::post('restful/test', function (Request $request) {
//    $res = [
//        'status' => true,
//        'data' => [
//            'name'=>'Tien',
//            'date'=>'2022-11-11'
//        ],
//    ];
    \Illuminate\Support\Facades\Log::channel('single')->info('$request->all()', [$request->all()]);
    
    return response()->json($request->all());
});

Route::group(['prefix' => 'restful/{resourceName}', 'middleware' => [RestfulTokenIsValid::class]],
    function () {
        Route::get('/auth', [RestfulController::class, 'auth'])
            ->middleware([RallyTokenIsValid::class]);
        Route::post('/auth-register', [RestfulController::class, 'authRegister']);
        Route::post('/auth-login', [RestfulController::class, 'authLogin']);

        Route::get('/', [RestfulController::class, 'list']);
        Route::get('/{dataId}', [RestfulController::class, 'detail']);
        Route::post('/', [RestfulController::class, 'store'])
            ->middleware([ResourceAuthCheck::class]);
        Route::put('/{dataId}', [RestfulController::class, 'update'])
            ->middleware([ResourceAuthCheck::class]);
        Route::delete('/{dataId}', [RestfulController::class, 'destroy'])
            ->middleware([ResourceAuthCheck::class]);
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
            switch ($process) {
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
<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;
use App\Services\ExportService;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/export', function () {
    $export = new ExportService();
    return $export
        ->database()
        ->files('media');
//        ->download();
});

Route::get('/', function () {
    $output=null;
    exec('which zip', $output);
    dd($output);
    echo "Returned with status $retval and output:\n";
    print_r($output);
//    $resource = \App\Models\Resource::find(1);
//    dd($resource->dataset->toArray());
//    dd($resource->toArray());
//    $user = \App\Models\User::where('id', 4)
////    ->withCount(['apis', 'resources', 'datasets'])
//    ->first()
//    ->loadCount(['apis', 'resources', 'datasets']);
//
//    dd($user->toArray());
//    dd($user->datasets->shares);
//    dd($user->datasets->toArray());
//    $d = \App\Models\DataSet::find(1);
//    dd($d->resources->toArray());
//    dd($d->shares->toArray());
//    dd($d->toArray());
    return view('welcome');
});

Route::get('/test', function () {
    \App\Models\RallyData::insert([
        [
            "resource_id" => 38,
            "dataset_id"  => 22,
            "data"        => "{\"id\":1,\"Text\":\"Unde quia expedita ducimus dolorem. Et sit ut soluta rem quo. Dolores quod praesentium fugit perferendis sit. Qui vero consequuntur cumque incidunt qui et ipsam asperiores.\",\"LongText\":\"Ut pariatur et odit quos natus deserunt. Vel ullam quos ea eum nobis assumenda voluptatum. Eos fugiat odio doloremque sed ea sunt neque. Qui dolor labore voluptatem debitis hic. Odit quos velit maiores. Quaerat deserunt qui animi et ea animi. Voluptas maxime sed harum sequi harum eaque sequi. Occaecati nulla autem sed ullam exercitationem et. Et aut et fugiat. Unde magnam perspiciatis officiis doloremque provident fuga ut aperiam. Sapiente in corporis asperiores veniam assumenda. Minima accusantium possimus sunt accusantium esse velit et. Blanditiis enim quasi ducimus iure nobis. Consectetur fuga harum rerum non dolor voluptatem. Ut eos itaque sapiente accusantium. Voluptatum sapiente nisi nostrum aut consequatur. Qui illum ab ea quia labore at tempore. Eos est et non veniam aut. Nesciunt saepe tempore quis quia reprehenderit. Perspiciatis sit rerum eveniet dolor. Dolore nulla alias qui et eveniet harum.\",\"Number\":274739333,\"Boolean\":[false],\"Object\":[],\"Array\":[],\"Date\":\"2021-04-23T21:47:08.934544Z\"}"
        ]
    ]);
    dd(1);
});

Route::get('/pusher', function () {
//    dd(formatDate(now()));
//    $options = array(
//        'cluster' => 'ap1',
//        'useTLS' => true
//    );
//    $pusher = new Pusher\Pusher(
//        'f209d321f560d24c53b5',
//        '3f4876ca2c46177dc51f',
//        '1178250',
//        $options
//    );
//
//    $data['message'] = 'hello world';
//    $pusher->trigger('my-channel', 'my-event', $data);
    $data['message'] = 'hello world';
    pushSocket('my-channel', 'my-event', $data);
});


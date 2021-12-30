@php
    $tkw = $http->get('/thiet-ke-app')->data();
    $tkw = collect($tkw)->groupBy('type')->toArray();
    $tkw1 = \Illuminate\Support\Arr::first($tkw['thiet-ke-app-1']);
    $tkw2 = \Illuminate\Support\Arr::first($tkw['thiet-ke-app-2']);
    $tkw3 = \Illuminate\Support\Arr::first($tkw['thiet-ke-app-3']);
    $tkw4 = \Illuminate\Support\Arr::first($tkw['thiet-ke-app-4']);
    $tkwSub = $http->get('/thiet-ke-app-sub')->data();
    $tkwSub2 = collect($tkwSub)->filter(function ($item1){
       return in_array('thiet-ke-app-2', $item1['type']);
    })
    ->values()
    ->toArray();
    $tkwSub3 = collect($tkwSub)->filter(function ($item1){
       return in_array('thiet-ke-app-3', $item1['type']);
    })
    ->values()
    ->toArray();
    $arr = [
        'tkw'=>$tkw,
        'tkw1'=>$tkw1,
        'tkw2'=>$tkw2,
        'tkw3'=>$tkw3,
        'tkw4'=>$tkw4,
        'tkwSub'=>$tkwSub,
        'tkwSub2'=>$tkwSub2,
        'tkwSub3'=>$tkwSub3,
    ];
@endphp

@include($config->view.'/components/thiet-ke-app', $arr)


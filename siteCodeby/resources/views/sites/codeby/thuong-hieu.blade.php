@php
    $tkw = $http->get('/thuong-hieu')->data();
    $tkw = collect($tkw)->groupBy('type')->toArray();
    $tkw2 = \Illuminate\Support\Arr::first($tkw['thuong-hieu-2']);
    $tkw3 = \Illuminate\Support\Arr::first($tkw['thuong-hieu-3']);
    $tkw4 = \Illuminate\Support\Arr::first($tkw['thuong-hieu-4']);
    $tkwSub = $http->get('/thuong-hieu-sub')->data();
    $tkwSub1 = collect($tkwSub)->filter(function ($item1){
       return in_array('thuong-hieu-1', $item1['type']);
    })
    ->values()
    ->toArray();
    $tkwSub2 = collect($tkwSub)->filter(function ($item1){
       return in_array('thuong-hieu-2', $item1['type']);
    })
    ->values()
    ->toArray();
    $tkwSub3 = collect($tkwSub)->filter(function ($item1){
       return in_array('thuong-hieu-3', $item1['type']);
    })
    ->values()
    ->toArray();
    $tkwSub4 = collect($tkwSub)->filter(function ($item1){
       return in_array('thuong-hieu-4', $item1['type']);
    })
    ->values()
    ->toArray();
    $arr = [
        'tkw'=>$tkw,
        'tkw2'=>$tkw2,
        'tkw3'=>$tkw3,
        'tkw4'=>$tkw4,
        'tkwSub'=>$tkwSub,
        'tkwSub1'=>$tkwSub1,
        'tkwSub2'=>$tkwSub2,
        'tkwSub3'=>$tkwSub3,
        'tkwSub4'=>$tkwSub4,
    ];
@endphp

@include($config->view.'/components/thiet-ke-website', $arr)


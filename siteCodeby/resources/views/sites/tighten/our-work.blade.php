@extends($config->layout.'/master')
@section('main')

    <div class="content">
        <header class="header">
            <div class="header-panel-small background-hero">
                <h2 class="header-panel-small__title">Our Work</h2>
            </div>
        </header>

        <nav class="flex flex-no-wrap justify-center overflow-x-scroll border-b-2 border-gray-200">
            @php
                $works = $http->get('/work_category')->data();
                $id = request()->id ?? \Illuminate\Support\Arr::first($works)['id'];
                $workC = collect($works)->where('id', $id)->first();
            @endphp
            @foreach($works as $key => $item)
                <a class="pill-grey {{$item['id']==$id ? 'pill-grey--selected':''}}"
                   href="{{$config->base_url}}/our-work?id={{$item['id']}}"
                   title="{{$item['name']}}">{{$item['name']}}</a>
            @endforeach
        </nav>

        <div class="flex flex-col items-start xl:flex-row">
            <div class="w-full p-6 xl:w-1/3 sm:p-8">
                <h2 class="text-left title-2">{{$workC['name']}}</h2>
                <p>{{$workC['description']}}</p>
            </div>

            <div class="flex flex-col flex-wrap justify-start flex-1 w-full xl:w-2/3 md:flex-row">
                @foreach($workC['work_post'] as $key => $item)
                    <div class="justify-end border-white cursor-pointer tile-portfolio bg-adopt-a-drain" style="background-image:url({{$media->set($item['thumb'])->first()}})"
                         onclick="window.location.href='{{$config->base_url}}/work_post?id={{$item['id']}}'">
                        <header class="tile-portfolio__header">
                            <small>{{$item['sub_title']}}</small>
                            <h3 class="title-3">
                                {!! $item['title'] !!}
                            </h3>
                        </header>

                        <a href="{{$config->base_url}}/work_post?id={{$item['id']}}" title="{{$item['title']}}" class="mt-8 text-sm btn btn-dark">
                            {{$item['button']['label']}}
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
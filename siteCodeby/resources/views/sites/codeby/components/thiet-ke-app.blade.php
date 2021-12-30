@extends($config->layout.'/master')
@section('main')
    <main class="space-y-16 lg:space-y-32">
        {{-- thiet-ke-app-1 --}}
        <section class="bg-white mt-16">
            <div class="max-w-2xl mx-auto px-4 sm:px-6 lg:max-w-7xl lg:px-8">
                <div class="max-w-3xl mx-auto text-center">
                    <h2 class="text-3xl font-extrabold tracking-tight text-gray-900 sm:text-4xl">
                        {{$tkw1['name']}}
                    </h2>
                    <p class="mt-4 text-gray-500">
                        {{$tkw1['name-sub']}}
                    </p>
                </div>
            </div>
        </section>

        {{-- thiet-ke-app-2 --}}
        @include($config->view.'/components/collapse', ['home2'  => $tkw2, 'homeSub2'=>$tkwSub2])

        {{-- thiet-ke-app-3 --}}
        <section class="bg-white">
            <div class="max-w-2xl mx-auto px-4 sm:px-6 lg:max-w-7xl lg:px-8">
                <div class="max-w-3xl mx-auto text-center">
                    <h2 class="text-3xl font-extrabold tracking-tight text-gray-900 sm:text-4xl">
                        {{$tkw3['name']}}
                    </h2>
                    <p class="mt-4 text-gray-500">
                        {{@$tkw3['name-sub']}}
                    </p>
                </div>
                @foreach($tkwSub3 as $key => $item)
                    @if($key%2) @continue @endif
                    @php
                        $item1 = @$tkwSub3[$key+1];
                    @endphp

                    <div class="mt-16 space-y-16">
                        <div class="flex flex-col-reverse lg:grid lg:grid-cols-12 lg:gap-x-8 lg:items-center">
                            <div class="mt-6 lg:mt-0 lg:row-start-1 lg:col-span-5 xl:col-span-4 lg:col-start-1">
                                <h3 class="text-lg font-medium text-gray-900">{{$item['name']}}</h3>
                                <p class="mt-2 text-sm text-gray-500">{{$item['content']}}</p>
                            </div>
                            <div class="flex-auto lg:row-start-1 lg:col-span-7 xl:col-span-8 lg:col-start-6 xl:col-start-5">
                                <div class="aspect-w-5 aspect-h-2 rounded-lg bg-gray-100 overflow-hidden">
                                    <img src="{{$media->set($item['image'])->first()}}"
                                         alt="{{$item['name']}}"
                                         class="object-center object-cover">
                                </div>
                            </div>
                        </div>
                        @if($item1)
                            <div class="flex flex-col-reverse lg:grid lg:grid-cols-12 lg:gap-x-8 lg:items-center">
                                <div class="mt-6 lg:mt-0 lg:row-start-1 lg:col-span-5 xl:col-span-4 lg:col-start-8 xl:col-start-9">
                                    <h3 class="text-lg font-medium text-gray-900">{{$item['name']}}</h3>
                                    <p class="mt-2 text-sm text-gray-500">{{$item['content']}}</p>
                                </div>
                                <div class="flex-auto lg:row-start-1 lg:col-span-7 xl:col-span-8 lg:col-start-1">
                                    <div class="aspect-w-5 aspect-h-2 rounded-lg bg-gray-100 overflow-hidden">
                                        <img src="{{$media->set($item1['image'])->first()}}"
                                             alt="{{$item['name']}}"
                                             class="object-center object-cover">
                                    </div>
                                </div>
                            </div>
                        @endif

                    </div>
                @endforeach
            </div>
        </section>

        {{-- thiet-ke-app-4 --}}
        @include($config->view.'/components/contact', ['tkw4'  => $tkw4])


    </main>

@endsection
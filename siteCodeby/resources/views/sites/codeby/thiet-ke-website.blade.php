@extends($config->layout.'/master')

@section('main')
    @php
        $tkw = $http->get('/thiet-ke-web')->data();
        $tkw = collect($tkw)->groupBy('type')->toArray();
        $tkw2 = \Illuminate\Support\Arr::first($tkw['thiet-ke-web-2']);
        $tkw3 = \Illuminate\Support\Arr::first($tkw['thiet-ke-web-3']);
        $tkwSub = $http->get('/thiet-ke-web-sub')->data();
        $tkwSub1 = collect($tkwSub)->filter(function ($item1){
           return in_array('thiet-ke-web-1', $item1['type']);
        })
        ->values()
        ->toArray();
        $tkwSub2 = collect($tkwSub)->filter(function ($item1){
           return in_array('thiet-ke-web-2', $item1['type']);
        })
        ->values()
        ->toArray();
    @endphp
    <main class="space-y-16 lg:space-y-32">
        {{-- thiet-ke-website-1 --}}
        @include($config->view.'/components/slider-white', ['sliders'  => $tkwSub1])

        {{-- thiet-ke-website-2 --}}
        <section class="bg-white">
            <div class="max-w-2xl mx-auto px-4 sm:px-6 lg:max-w-7xl lg:px-8">
                <div class="max-w-3xl mx-auto text-center">
                    <h2 class="text-3xl font-extrabold tracking-tight text-gray-900 sm:text-4xl">
                        {{$tkw2['name']}}
                    </h2>
                    <p class="mt-4 text-gray-500">
                        {{$tkw2['name-sub']}}
                    </p>
                </div>
                @foreach($tkwSub2 as $key => $item)
                    @if($key%2) @continue @endif
                    @php
                        $item1 = @$tkwSub2[$key+1];
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

        {{-- thiet-ke-website-3 --}}
        <section class="bg-white">
            <div class="relative bg-gray-900">
                <!-- Decorative image and overlay -->
                <div aria-hidden="true" class="absolute inset-0 overflow-hidden">
                    <img src="{{$media->set($tkw3['image'])->first()}}" alt=""
                         class="w-full h-full object-center object-cover">
                </div>
                <div aria-hidden="true" class="absolute inset-0 bg-gray-900 opacity-50"></div>
                <!-- This example requires Tailwind CSS v2.0+ -->
                <div class="relative ">
                    <div class="max-w-7xl mx-auto py-12 px-4 sm:px-6 lg:py-24 lg:px-8 lg:flex lg:items-center lg:justify-between">
                        <div class="w-2/3 text-white">
                            <h2 class="text-3xl font-medium tracking-tight text-white md:text-4xl">
                                <span class="block">{{$tkw3['name']}}</span>
                            </h2>

                            <!-- grid -->
                            <div class="grid grid-cols-12 gap-7 mt-5">
                                <div class="col-span-6">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Magnam sunt vel vitae voluptas? Consequatur dolor dolorem dolorum, laudantium voluptate voluptates. Et iusto necessitatibus nemo nobis quam sit, suscipit totam vero.</div>
                                <div class="col-span-6">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Magnam sunt vel vitae voluptas? Consequatur dolor dolorem dolorum, laudantium voluptate voluptates. Et iusto necessitatibus nemo nobis quam sit, suscipit totam vero.</div>
                                <div class="col-span-6">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Magnam sunt vel vitae voluptas? Consequatur dolor dolorem dolorum, laudantium voluptate voluptates. Et iusto necessitatibus nemo nobis quam sit, suscipit totam vero.</div>
                                <div class="col-span-6">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Magnam sunt vel vitae voluptas? Consequatur dolor dolorem dolorum, laudantium voluptate voluptates. Et iusto necessitatibus nemo nobis quam sit, suscipit totam vero.</div>
                            </div>
                        </div>
                        <div class="mt-8 flex lg:mt-0 lg:flex-shrink-0">
                            <div class="inline-flex rounded-md shadow">
                                <a href="#"
                                   class="inline-flex items-center justify-center px-5 py-3 border border-transparent text-base font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700">
                                    Get started
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- <div class="relative max-w-7xl mx-auto py-32 px-6 flex flex-col items-center text-center sm:py-64 lg:px-0">
                     <h1 class="text-4xl font-extrabold tracking-tight text-white lg:text-6xl">New arrivals are here</h1>
                     <p class="mt-4 text-xl text-white">The new arrivals have, well, newly arrived. Check out the latest
                         options from our summer small-batch release while they're still in stock.</p>
                     <a href="#"
                        class="mt-8 inline-block bg-white border border-transparent rounded-md py-3 px-8 text-base font-medium text-gray-900 hover:bg-gray-100">Shop
                         New Arrivals</a>
                 </div>--}}
            </div>
        </section>

    </main>

@endsection
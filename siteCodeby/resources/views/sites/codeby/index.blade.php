@extends($config->layout.'/master')

@section('main')
    @php
        $home = $http->get('/home')->data();
        $homeSub = $http->get('/home-sub')->data();
        $home = collect($home)->groupBy('type')->toArray();
        $home1 = \Illuminate\Support\Arr::first($home['home-1']);
        $home2 = \Illuminate\Support\Arr::first($home['home-2']);
        $home3 = \Illuminate\Support\Arr::first($home['home-3']);
        $home4 = \Illuminate\Support\Arr::first($home['home-4']);
        $home5 = \Illuminate\Support\Arr::first($home['home-5']);
        $homeSub1 = collect($homeSub)->filter(function ($item1){
           return in_array('home-1', $item1['type']);
        })
        ->values()
        ->toArray();
        $homeSub2 = collect($homeSub)->filter(function ($item1){
           return in_array('home-2', $item1['type']);
        })->toArray();
        $homeSub3 = collect($homeSub)->filter(function ($item1){
           return in_array('home-3', $item1['type']);
        })->toArray();
    @endphp
    <main class="space-y-16 lg:space-y-32">

        {{-- home-1 --}}
        @include($config->view.'/components/slider', ['sliders'  => $homeSub1])

        {{-- home-2 --}}
        @include($config->view.'/components/collapse', ['home2'  => $home2, 'homeSub2'=>$homeSub2])

        {{-- home-3 --}}
        <section class="relative bg-white ">
            <div class="mx-auto max-w-md px-4 text-center sm:max-w-3xl sm:px-6 lg:px-8 lg:max-w-7xl">
                @isset($home3['name-sub'])
                    <h2 class="text-base font-semibold tracking-wider text-indigo-600 uppercase">{{$home3['name-sub']}}</h2>
                @endisset
                <p class="mt-2 text-3xl font-extrabold text-gray-900 tracking-tight sm:text-4xl">
                    {{$home3['name']}}
                </p>
                <p class="mt-5 max-w-prose mx-auto text-xl text-gray-500">
                    {{$home3['content']}}
                </p>
                <div class="mt-12">
                    <div class="grid grid-cols-1 gap-8 sm:grid-cols-2 lg:grid-cols-3">
                        @foreach($homeSub3 as $key => $item)
                            <div class="pt-6">
                                <div class="flow-root bg-gray-50 rounded-lg px-6 pb-8">
                                    <div class="-mt-6">
                                        <div>
                                        <span class="inline-flex items-center justify-center p-3 bg-indigo-500 rounded-md shadow-lg">
                                          <!-- Heroicon name: outline/cloud-upload -->
                                          {{--<svg class="h-6 w-6 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                               stroke="currentColor" aria-hidden="true">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                  d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"/>
                                          </svg>--}}
                                            <img class="h-6 w-6 text-white"
                                                 src="{{$media->set($item['image'])->first()}}" alt="">
                                        </span>
                                        </div>
                                        <h3 class="mt-8 text-lg font-medium text-gray-900 tracking-tight">
                                            {{$item['name']}}
                                        </h3>
                                        <p class="mt-5 text-base text-gray-500">
                                            {{$item['content']}}
                                        </p>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </section>
        {{-- home-4 --}}
        <section class="bg-white ">
            @php
                $files = $media->set($home4['image'])->files();
            @endphp
            <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="relative py-24 px-8 bg-indigo-500 rounded-xl shadow-2xl overflow-hidden lg:px-16 lg:grid lg:grid-cols-2 lg:gap-x-8">
                    <div class="absolute inset-0 opacity-50 filter saturate-0 mix-blend-multiply">
                        <img src="{{$files[0]}}"
                             alt="" class="w-full h-full object-cover">
                    </div>
                    <div class="relative lg:col-span-1">
                        <img class="h-12 w-auto" src="{{$files[1]}}"
                             alt="">
                        <blockquote class="mt-6 text-white">
                            <p class="text-xl font-medium sm:text-2xl">
{{--                                {{$home4['content']}}--}}
                                {!! $home4['content'] !!}
                            </p>
                            <footer class="mt-6">
                                <p class="flex flex-col font-medium">
                                    <span>{{$home4['more']['name']}}</span>
                                    <span>{{$home4['more']['role']}}</span>
                                </p>
                            </footer>
                        </blockquote>
                    </div>
                </div>
            </div>
        </section>

        {{-- home-5 --}}
        <section class="relative bg-gray-50 px-4 sm:px-6 lg:px-8">
            <div class="absolute inset-0">
                <div class="bg-white h-1/3 sm:h-2/3"></div>
            </div>
            <div class="relative max-w-7xl mx-auto">
                <div class="text-center">
                    <h2 class="text-3xl tracking-tight font-extrabold text-gray-900 sm:text-4xl">
                        {{$home5['name']}}
                    </h2>
                    <p class="mt-3 max-w-2xl mx-auto text-xl text-gray-500 sm:mt-4">
                        {{$home5['name-sub']}}
                    </p>
                </div>

                <div class="mt-12 max-w-lg mx-auto grid gap-5 lg:grid-cols-3 lg:max-w-none">
                    <div class="flex flex-col rounded-lg shadow-lg overflow-hidden">
                        <div class="flex-shrink-0">
                            <img class="h-48 w-full object-cover"
                                 src="https://images.unsplash.com/photo-1547586696-ea22b4d4235d?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1679&q=80"
                                 alt=""/>
                        </div>
                        <div class="flex-1 bg-white p-6 flex flex-col justify-between">
                            <div class="flex-1">
                                <p class="text-sm font-medium text-indigo-600">
                                    <a href="#" class="hover:underline">
                                        Video
                                    </a>
                                </p>
                                <a href="#" class="block mt-2">
                                    <p class="text-xl font-semibold text-gray-900">
                                        How to use search engine optimization to drive sales
                                    </p>
                                    <p class="mt-3 text-base text-gray-500">
                                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Velit facilis
                                        asperiores porro quaerat doloribus, eveniet dolore. Adipisci tempora aut
                                        inventore optio animi., tempore temporibus quo laudantium.
                                    </p>
                                </a>
                            </div>
                            <div class="mt-6 flex items-center">
                                <div class="flex-shrink-0">
                                    <a href="#">
                                        <span class="sr-only">Brenna Goyette</span>
                                        <img class="h-10 w-10 rounded-full"
                                             src="https://images.unsplash.com/photo-1550525811-e5869dd03032?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80"
                                             alt=""/>
                                    </a>
                                </div>
                                <div class="ml-3">
                                    <p class="text-sm font-medium text-gray-900">
                                        <a href="#" class="hover:underline">
                                            Brenna Goyette
                                        </a>
                                    </p>
                                    <div class="flex space-x-1 text-sm text-gray-500">
                                        <time datetime="2020-03-10">
                                            Mar 10, 2020
                                        </time>
                                        <span aria-hidden="true">
                            &middot;
                        </span>
                                        <span>
                            4 min read
                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="flex flex-col rounded-lg shadow-lg overflow-hidden">
                        <div class="flex-shrink-0">
                            <img class="h-48 w-full object-cover"
                                 src="https://images.unsplash.com/photo-1492724441997-5dc865305da7?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1679&q=80"
                                 alt=""/>
                        </div>
                        <div class="flex-1 bg-white p-6 flex flex-col justify-between">
                            <div class="flex-1">
                                <p class="text-sm font-medium text-indigo-600">
                                    <a href="#" class="hover:underline">
                                        Case Study
                                    </a>
                                </p>
                                <a href="#" class="block mt-2">
                                    <p class="text-xl font-semibold text-gray-900">
                                        Improve your customer experience
                                    </p>
                                    <p class="mt-3 text-base text-gray-500">
                                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Sint harum rerum
                                        voluptatem quo recusandae magni placeat saepe molestiae, sed excepturi cumque
                                        corporis perferendis hic.
                                    </p>
                                </a>
                            </div>
                            <div class="mt-6 flex items-center">
                                <div class="flex-shrink-0">
                                    <a href="#">
                                        <span class="sr-only">Daniela Metz</span>
                                        <img class="h-10 w-10 rounded-full"
                                             src="https://images.unsplash.com/photo-1487412720507-e7ab37603c6f?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80"
                                             alt=""/>
                                    </a>
                                </div>
                                <div class="ml-3">
                                    <p class="text-sm font-medium text-gray-900">
                                        <a href="#" class="hover:underline">
                                            Daniela Metz
                                        </a>
                                    </p>
                                    <div class="flex space-x-1 text-sm text-gray-500">
                                        <time datetime="2020-02-12">
                                            Feb 12, 2020
                                        </time>
                                        <span aria-hidden="true">
                            &middot;
                        </span>
                                        <span>
                            11 min read
                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


            </div>
        </section>

    </main>

@endsection
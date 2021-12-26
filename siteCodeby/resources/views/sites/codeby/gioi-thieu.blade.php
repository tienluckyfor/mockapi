@extends($config->layout.'/master')

@section('main')
    @php
        $gt = $http->get('/gioi-thieu')->data();
        $gt = collect($gt)->groupBy('type')->toArray();
        $gt2 = \Illuminate\Support\Arr::first($gt['gioi-thieu-2']);
        $gt3 = \Illuminate\Support\Arr::first($gt['gioi-thieu-3']);
        $gtSub = $http->get('/gioi-thieu-sub')->data();
        $gtSub1 = collect($gtSub)->filter(function ($item1){
           return in_array('gioi-thieu-1', $item1['type']);
        })
        ->values()
        ->toArray();
        $gtSub3 = collect($gtSub)->filter(function ($item1){
           return in_array('gioi-thieu-3', $item1['type']);
        })
        //->values()
        ->toArray();
    @endphp
    <main class="space-y-16 lg:space-y-32">

        {{-- gioi-thieu-1 --}}
        @include($config->view.'/components/slider', ['sliders'  => $gtSub1])

        {{-- gioi-thieu-2 --}}
        <section class="relative bg-white ">
            <div class="lg:mx-auto lg:max-w-7xl lg:px-8 lg:grid lg:grid-cols-2 lg:gap-24 lg:items-start">
                <div class="relative sm:py-16 lg:py-0">
                    <div aria-hidden="true" class="hidden sm:block lg:absolute lg:inset-y-0 lg:right-0 lg:w-screen">
                        <div class="absolute inset-y-0 right-1/2 w-full bg-gray-50 rounded-r-3xl lg:right-72"></div>
                        <svg class="absolute top-8 left-1/2 -ml-3 lg:-right-8 lg:left-auto lg:top-12" width="404"
                             height="392" fill="none" viewBox="0 0 404 392">
                            <defs>
                                <pattern id="02f20b47-fd69-4224-a62a-4c9de5c763f7" x="0" y="0" width="20" height="20"
                                         patternUnits="userSpaceOnUse">
                                    <rect x="0" y="0" width="4" height="4" class="text-gray-200" fill="currentColor"/>
                                </pattern>
                            </defs>
                            <rect width="404" height="392" fill="url(#02f20b47-fd69-4224-a62a-4c9de5c763f7)"/>
                        </svg>
                    </div>
                    <div class="relative mx-auto max-w-md px-4 sm:max-w-3xl sm:px-6 lg:px-0 lg:max-w-none lg:py-20">
                        <!-- Testimonial card-->
                        @php
                            $files = $media->set($gt2['image'])->files();
                        @endphp
                        <div class="relative pt-64 pb-10 rounded-2xl shadow-xl overflow-hidden">
                            <img class="absolute inset-0 h-full w-full object-cover" src="{{$files[0]}}" alt="">
                            <div class="absolute inset-0 bg-indigo-500 mix-blend-multiply"></div>
                            <div class="absolute inset-0 bg-gradient-to-t from-indigo-600 via-indigo-600 opacity-90"></div>
                            <div class="relative px-8">
                                <div>
                                    <img class="h-12" src="{{$files[1]}}" alt="Workcation">
                                </div>
                                <blockquote class="mt-8">
                                    <div class="relative text-lg font-medium text-white md:flex-grow">
                                        <svg class="absolute top-0 left-0 transform -translate-x-3 -translate-y-2 h-8 w-8 text-indigo-400"
                                             fill="currentColor" viewBox="0 0 32 32" aria-hidden="true">
                                            <path d="M9.352 4C4.456 7.456 1 13.12 1 19.36c0 5.088 3.072 8.064 6.624 8.064 3.36 0 5.856-2.688 5.856-5.856 0-3.168-2.208-5.472-5.088-5.472-.576 0-1.344.096-1.536.192.48-3.264 3.552-7.104 6.624-9.024L9.352 4zm16.512 0c-4.8 3.456-8.256 9.12-8.256 15.36 0 5.088 3.072 8.064 6.624 8.064 3.264 0 5.856-2.688 5.856-5.856 0-3.168-2.304-5.472-5.184-5.472-.576 0-1.248.096-1.44.192.48-3.264 3.456-7.104 6.528-9.024L25.864 4z"/>
                                        </svg>
                                        <p class="relative">
                                            {{$gt2['content']}}
                                        </p>
                                    </div>

                                    <footer class="mt-4">
                                        <p class="text-base font-semibold text-indigo-200">{{$gt2['more']['author']}}</p>
                                    </footer>
                                </blockquote>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="relative mx-auto max-w-md px-4 sm:max-w-3xl sm:px-6 lg:px-0">
                    <!-- Content area -->
                    <div class="pt-12 sm:pt-16 lg:pt-20">
                        <h2 class="text-3xl text-gray-900 font-extrabold tracking-tight sm:text-4xl">
                            {{$gt2['name']}}
                        </h2>
                        <div class="mt-6 text-gray-500 space-y-6">
                            {!! nl2br(e($gt2['name-sub']))  !!}
                        </div>
                    </div>

                    <!-- Stats section -->
                    <div class="mt-10">
                        <dl class="grid grid-cols-2 gap-x-4 gap-y-8">
                            @foreach($gt2['more']['statistic'] as $key => $item)
                                <div class="border-t-2 border-gray-100 pt-6">
                                    <dt class="text-base font-medium text-gray-500">{{$item['name']}}</dt>
                                    <dd class="text-3xl font-extrabold tracking-tight text-gray-900">{{$item['content']}}</dd>
                                </div>
                            @endforeach
                        </dl>
                        <div class="mt-10">
                            <a href="{{$config->base_url}}{{$gt2['more']['button']['link']}}"
                               class="text-base font-medium text-indigo-600"> {{$gt2['more']['button']['name']}} <span
                                        aria-hidden="true">&rarr;</span> </a>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        {{-- gioi-thieu-3 --}}
        <section class="bg-white">
            <div class="max-w-7xl mx-auto px-4 text-center sm:px-6 lg:px-8 ">
                <div class="space-y-12">
                    <div class="space-y-5 sm:mx-auto sm:max-w-xl sm:space-y-4 lg:max-w-5xl">
                        <h2 class="text-3xl font-extrabold tracking-tight sm:text-4xl">{{$gt3['name']}}</h2>
                        <p class="text-xl text-gray-500">{{$gt3['name-sub']}}</p>
                    </div>
                    <ul role="list"
                        class="mx-auto space-y-16 sm:grid sm:grid-cols-2 sm:gap-16 sm:space-y-0 lg:grid-cols-3 lg:max-w-5xl">
                        @foreach($gtSub3 as $key => $item)
                            <li>
                                <div class="space-y-6">
                                    {{--<img class="mx-auto h-40 w-40 rounded-full xl:w-56 xl:h-56"
                                         src="{{$media->set($item['image'])->first()}}"
                                         alt="{{$item['name']}}">--}}

                                    <!-- image-pb-1x1 -->
                                            <div class="mx-auto h-40 w-40 rounded-full xl:w-56 xl:h-56 overflow-hidden">
                                                <div class="pb-1x1 relative rounded-sm overflow-hidden bg-gray-300">
                                                    <img
                                                            src="{{$media->set($item['image'])->first()}}"
                                                            alt="{{$item['name']}}"
                                                            class="absolute h-full w-full object-cover"
                                                    />
                                                </div>
                                            </div>
                                    <div class="space-y-2">
                                        <div class="text-lg leading-6 font-medium space-y-1">
                                            <h3>{{$item['name']}}</h3>
                                            <p class="text-indigo-600">{{$item['content']}}</p>
                                        </div>
                                        <ul role="list" class="flex justify-center space-x-5">
                                            @foreach($item['more']['socials'] as $key1 => $item1)
                                                <li>
                                                    <a href="{{$item1['link']}}"
                                                       class="text-gray-400 hover:text-gray-500">
                                                        <span class="sr-only">{{$item1['platform']}}</span>
                                                        @switch($item1['platform'])
                                                            @case('facebook')
                                                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                                                                 aria-hidden="true">
                                                                <path fill-rule="evenodd"
                                                                      d="M9 8h-3v4h3v12h5v-12h3.642l.358-4h-4v-1.667c0-.955.192-1.333 1.115-1.333h2.885v-5h-3.808c-3.596 0-5.192 1.583-5.192 4.615v3.385z"/>
                                                            </svg>
                                                            @break
                                                            @case('zalo')
<img class="w-5 h-5" src="{{$config->static}}/assets/images/zalo-1.svg"/>

                                                            @break
                                                        @endswitch
                                                    </a>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            </li>
                        @endforeach

                    </ul>
                </div>
            </div>
        </section>


    </main>

@endsection
@extends($config->layout.'/master')

@section('main')
    @php
        $bgl = $http->get('/bao-gia-logo')->data();
        $bglOrg = $bgl;
        $bgl = collect($bgl)->groupBy('type')->toArray();
        $bgl_cn = \Illuminate\Support\Arr::first($bgl['chuc-nang']);
        $bgl_pt = \Illuminate\Support\Arr::first($bgl['phu-tro']);
        $bgl_g = collect($bglOrg)->filter(function ($item){
           return preg_match('#goi-#mis', \Illuminate\Support\Arr::first(@$item['type']));
        })
        ->values()
        ->toArray();
    @endphp
    <main class="space-y-16 lg:space-y-24">
        <section class="mx-auto px-4 sm:px-6 lg:px-8 pt-32">
            <div class="sm:flex sm:flex-col sm:align-center">
                <h1 class="text-5xl font-extrabold text-gray-900 sm:text-center">{{$bgl_cn['name']}}</h1>
                <p class="mt-5 text-xl text-gray-500 sm:text-center">{{$bgl_cn['name-sub']}}</p>
            </div>
        </section>

        <section
                class="max-w-7xl mx-auto px-4 bg-white sm:px-6 lg:px-8 ">
            <div class="space-y-12 lg:space-y-0 lg:grid lg:grid-cols-3 lg:gap-x-8">
            @foreach($bgl_g as $key => $item)

                <div class="relative p-8 bg-white border border-gray-200 rounded-2xl shadow-sm flex flex-col">
                    <div class="flex-1">
                        <h3 class="text-xl font-semibold text-gray-900">{{$item['name']}}</h3>
                        @if(@$item['more']['popular'])
                            <p class="absolute top-0 py-1.5 px-4 bg-indigo-500 rounded-full text-xs font-semibold uppercase tracking-wide text-white transform -translate-y-1/2">{{$item['more']['popular']}}</p>
                        @endif

                        <p class="mt-4 flex items-baseline text-gray-900">
                            <span class="text-5xl font-extrabold tracking-tight">{{$item['name-sub']}}</span>
                        </p>
                        <p class="mt-6 text-gray-500">{{$item['content']}}</p>

                        <!-- Feature list -->
                        <ul role="list" class="mt-6 space-y-6">
                            @foreach($item['more']['list'] as $key1 => $item1)

                                <li class="flex">
                                    <svg class="flex-shrink-0 w-6 h-6 text-indigo-500"
                                         x-description="Heroicon name: outline/check" xmlns="http://www.w3.org/2000/svg"
                                         fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                              d="M5 13l4 4L19 7"></path>
                                    </svg>
                                    <span class="ml-3 text-gray-500">{{$item1}}</span>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                    @if(@$item['more']['button']['name'])
                        <a href="{{$item['more']['button']['link']}}"
                           class="bg-indigo-500 text-white hover:bg-indigo-600 mt-8 block w-full py-3 px-6 border border-transparent rounded-md text-center font-medium">
                            {{$item['more']['button']['name']}}
                        </a>
                    @endif
                </div>
            @endforeach
            </div>

        </section>

        <section class="max-w-7xl mx-auto px-4 bg-white sm:px-6 lg:px-8 ">
            <div class="xl:grid xl:grid-cols-3 xl:gap-x-8">
                <div>
                    <h2 class="text-base font-semibold text-indigo-600 tracking-wide uppercase">{{$bgl_pt['name-sub']}}</h2>
                    <p class="mt-2 text-3xl font-extrabold text-gray-900">{{$bgl_pt['name']}}</p>
                    <p class="mt-4 text-lg text-gray-500">{{$bgl_pt['content']}}</p>
                </div>
                <div class="mt-4 sm:mt-8 md:mt-10 md:grid md:grid-cols-2 md:gap-x-8 xl:mt-0 xl:col-span-2">
                    @php
                        $halved = array_chunk($bgl_pt['more']['list'], ceil(count($bgl_pt['more']['list'])/2));
                    @endphp
                    <ul role="list" class="divide-y divide-gray-200">
                        @foreach($halved[0] as $key => $item)
                            <li class="py-4 flex {{$key==0?'md:py-0 md:pb-4':''}}">
                                <svg class="flex-shrink-0 h-6 w-6 text-green-500"
                                     x-description="Heroicon name: outline/check" xmlns="http://www.w3.org/2000/svg"
                                     fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                          d="M5 13l4 4L19 7"></path>
                                </svg>
                                <span class="ml-3 text-base text-gray-500">{{$item}}</span>
                            </li>
                        @endforeach
                    </ul>
                    <ul role="list" class="border-t border-gray-200 divide-y divide-gray-200 md:border-t-0">
                        @foreach($halved[1] as $key => $item)
                        <li class="py-4 flex md:border-t-0 {{$key==0?'md:py-0 md:pb-4':''}}">
                            <svg class="flex-shrink-0 h-6 w-6 text-green-500"
                                 x-description="Heroicon name: outline/check" xmlns="http://www.w3.org/2000/svg"
                                 fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                      d="M5 13l4 4L19 7"></path>
                            </svg>
                            <span class="ml-3 text-base text-gray-500">{{$item}}</span>
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </section>

    </main>

@endsection
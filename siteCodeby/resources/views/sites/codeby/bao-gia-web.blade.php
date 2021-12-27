@extends($config->layout.'/master')

@section('main')
    @php
        $bgw = $http->get('/bao-gia-web')->data();
        $bgwOrg = $bgw;
        $bgw = collect($bgw)->groupBy('type')->toArray();
        $bgw_cn = \Illuminate\Support\Arr::first($bgw['chuc-nang']);
        $bgw_g = collect($bgwOrg)->filter(function ($item){
           return preg_match('#goi-#mis', \Illuminate\Support\Arr::first(@$item['type']));
        })
        ->values()
        ->toArray();
        $bgw_khac = \Illuminate\Support\Arr::first($bgw['khac']);
    @endphp
    <main class="space-y-16">

        <section class="mx-auto px-4 sm:px-6 lg:px-8 pt-32">
            <div class="sm:flex sm:flex-col sm:align-center">
                <h1 class="text-5xl font-extrabold text-gray-900 sm:text-center">{{$bgw_cn['name']}}</h1>
                <p class="mt-5 text-xl text-gray-500 sm:text-center">{{$bgw_cn['name-sub']}}</p>
            </div>
        </section>
        <section class="max-w-7xl mx-auto bg-white sm:px-6 lg:px-8">

            <!-- xs to lg -->
            <div class="max-w-2xl mx-auto space-y-16 lg:hidden">

                @foreach($bgw_g as $key => $item)
                    <section>
                        <div class="px-4 mb-8">
                            <h2 class="text-lg leading-6 font-medium text-gray-900">{{$item['name']}}</h2>
                            <p class="mt-4">
                                <span class="text-4xl font-extrabold text-gray-900">{!! $item['name-sub'] !!}</span>
                            </p>
                            <a href="#"
                               class="mt-6 block border border-transparent rounded-md bg-indigo-600 w-full py-2 text-sm font-semibold text-white text-center hover:bg-indigo-700">
                                Đăng ký</a>
                        </div>

                        <table class="w-full">
                            <caption
                                    class="bg-gray-50 border-t border-gray-200 py-3 px-4 text-sm font-medium text-gray-900 text-left">
                                Chức năng
                            </caption>
                            <thead>
                            <tr>
                                <th class="sr-only" scope="col">Feature</th>
                                <th class="sr-only" scope="col">Included</th>
                            </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-200">
                            @foreach($item['more'] as $key1 => $item1)
                                <tr class="border-t border-gray-200">
                                    <th class="py-5 px-4 text-sm font-normal text-gray-500 text-left" scope="row">
                                        {{$item1['name']}}
                                    </th>
                                    @if(isset($item1['isOk']) && $item1['isOk']=='no')
                                        <td class="py-5 pr-4">
                                            <!-- Heroicon name: solid/minus -->
                                            <svg class="ml-auto h-5 w-5 text-gray-400"
                                                 xmlns="http://www.w3.org/2000/svg"
                                                 viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                                <path fill-rule="evenodd"
                                                      d="M3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z"
                                                      clip-rule="evenodd"/>
                                            </svg>
                                            <span class="sr-only">No</span>
                                        </td>
                                    @else
                                        <td class="py-5 pr-4">
                                            <!-- Heroicon name: solid/check -->
                                            <svg class="ml-auto h-5 w-5 text-green-500"
                                                 xmlns="http://www.w3.org/2000/svg"
                                                 viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                                <path fill-rule="evenodd"
                                                      d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                                      clip-rule="evenodd"/>
                                            </svg>
                                            <span class="sr-only">Yes</span>
                                        </td>
                                    @endif
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        <div class="border-t border-gray-200 px-4 pt-5">
                            <a href="#"
                               class="block w-full bg-indigo-600 border border-transparent rounded-md py-2 text-sm font-semibold text-white text-center hover:bg-indigo-700">
                                Đăng ký</a>
                        </div>
                    </section>
                @endforeach

            </div>

            <!-- lg+ -->
            <div class="hidden lg:block">
                <table class="w-full h-px table-fixed">
                    <caption class="sr-only">
                        Pricing plan comparison
                    </caption>
                    <thead>
                    <tr class="text-xl">
                        <th class="pb-4 px-6 text-gray-900 text-left" scope="col">
                            <span class="sr-only">Feature by</span>
                            <span>{{@$bgw_cn['content']}}</span>
                        </th>
                        @foreach($bgw_g as $key => $item)
                            <th class="w-1/{{count($bgw_g)+1}} pb-4 px-6 leading-6 text-gray-900 text-left"
                                scope="col">
                                {{$item['name']}}
                            </th>
                        @endforeach
                    </tr>
                    </thead>
                    <tbody class="border-t border-gray-200 divide-y divide-gray-200">
                    <tr>
                        <th class="py-8 px-6 text-sm font-medium text-gray-900 text-left align-top" scope="row">
                            Giá dịch vụ
                        </th>

                        @foreach($bgw_g as $key => $item)
                            <td class="h-full py-8 px-6 align-top">
                                <div class="relative h-full table space-y-3">
                                    <p>
                                        @php
                                            $price = explode(';', $item['name-sub']);
                                        @endphp
                                        <span class="text-xl font-slim text-gray-400 line-through">{{@$price[0]}}</span>
                                        <span class="text-3xl font-extrabold text-gray-900">{{@$price[1]}}</span>
                                    </p>
                                    <a href="#"
                                       class="flex-grow block w-full bg-indigo-600 border border-transparent rounded-md 5 py-2 text-sm font-semibold text-white text-center hover:bg-indigo-700">
                                        Đăng ký</a>
                                </div>
                            </td>
                        @endforeach
                    </tr>

                    @foreach($bgw_cn['more'] as $key => $item)
                        <tr>
                            <th class="py-5 px-6 text-sm font-normal text-gray-500 text-left" scope="row">
                                {{$item['name']}}
                            </th>
                            @foreach($bgw_g as $key1 => $item1)
                                @php
                                    $item2 = collect($item1['more'])->where('key', $item['key'])->first();
                                @endphp
                                <td class="py-5 px-6 text-sm font-normal text-gray-900 text-left">
                                    <!-- Heroicon name: solid/check -->
                                    {{--<svg class="h-5 w-5 text-green-500" xmlns="http://www.w3.org/2000/svg"
                                         viewBox="0 0 20 20"
                                         fill="currentColor" aria-hidden="true">
                                        <path fill-rule="evenodd"
                                              d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                              clip-rule="evenodd"/>
                                    </svg>--}}
                                    <span class="sr-only">{{@$item2['name']??'-'}}</span>
                                    <span>{{@$item2['name']??'-'}}</span>
                                </td>
                            @endforeach
                        </tr>

                    @endforeach
                    </tbody>
                </table>
            </div>
        </section>

        <section class="-my-12">
            <div class="max-w-7xl mx-auto px-2 sm:px-6 lg:px-8">
                <div class="p-2 rounded-lg bg-indigo-600 shadow-lg sm:p-3">
                    <div class="flex items-center justify-between flex-wrap">
                        <div class="w-0 flex-1 flex items-center">
          <span class="flex p-2 rounded-lg bg-indigo-800">
            <!-- Heroicon name: outline/speakerphone -->
            <svg class="h-6 w-6 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                 stroke="currentColor" aria-hidden="true">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M11 5.882V19.24a1.76 1.76 0 01-3.417.592l-2.147-6.15M18 13a3 3 0 100-6M5.436 13.683A4.001 4.001 0 017 6h1.832c4.1 0 7.625-1.234 9.168-3v14c-1.543-1.766-5.067-3-9.168-3H7a3.988 3.988 0 01-1.564-.317z"/>
            </svg>
          </span>
                            <p class="ml-3 font-medium text-white truncate">
            <span class="md:hidden">
              {{$bgw_khac['name']}}
            </span>
                                <span class="hidden md:inline">
              {{$bgw_khac['name']}}
            </span>
                            </p>
                        </div>
                        <div class="order-3 mt-2 flex-shrink-0 w-full sm:order-2 sm:mt-0 sm:w-auto">
                            <a href="{{$bgw_khac['more']['button']['link']}}"
                               class="flex items-center justify-center px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-indigo-600 bg-white hover:bg-indigo-50">
                                {{$bgw_khac['more']['button']['name']}}
                            </a>
                        </div>
                        <div class="order-2 flex-shrink-0 sm:order-3 sm:ml-2">
                            <button type="button"
                                    class="-mr-1 flex p-2 rounded-md hover:bg-indigo-500 focus:outline-none focus:ring-2 focus:ring-white">
                                <span class="sr-only">Dismiss</span>
                                <!-- Heroicon name: outline/x -->
                                <svg class="h-6 w-6 text-white" xmlns="http://www.w3.org/2000/svg" fill="none"
                                     viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                          d="M6 18L18 6M6 6l12 12"/>
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </section>

    </main>

@endsection
<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    {{-- <link href="http://site-codeby.test/css/app.css" rel="stylesheet"> --}}
    <link href="{{ asset('css-phumy/app.css') }}" rel="stylesheet">
    <script src="//unpkg.com/alpinejs" defer></script>
</head>
<style>
    .bg-gray {
        background: #144C4B;
    }

    .btn-gradient {
        background: linear-gradient(90deg, #BF953F 0%, #FCF6BA 22.4%, #FBF5B7 44.27%, #B38728 60.42%, #FBF5B7 78.13%);
    }
</style>
<body>
<!-- This example requires Tailwind CSS v2.0+ -->
<header class="relative bg-gray " x-data="{ showMobileMenu: false }">
    <div class="absolute inset-0 shadow z-30 pointer-events-none" aria-hidden="true"></div>
    <div class="relative z-20 ">
        <div class="max-w-7xl h-20 mx-auto flex justify-between items-center px-4 sm:px-6 lg:px-8 md:space-x-10">
            <div>
                <a href="{{$config->base_url}}/" class="flex flex-shrink-0">
                    <span class="sr-only">Workflow</span>
                    <img class="h-12 w-auto " src="{{$media->set($con['logo'])->first()}}" alt="">
                    {{--                    <img class="h-8 w-auto sm:h-10" src="https://tailwindui.com/img/logos/workflow-mark-indigo-600.svg" alt="">--}}
                </a>
            </div>
            <div class="-mr-2 -my-2 md:hidden">
                <button type="button" @click="showMobileMenu = ! showMobileMenu"
                        class="bg-white rounded-md p-2 inline-flex items-center justify-center text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-indigo-500"
                        aria-expanded="false">
                    <span class="sr-only">Open menu</span>
                    <!-- Heroicon name: outline/menu -->
                    <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                         stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M4 6h16M4 12h16M4 18h16"/>
                    </svg>
                </button>
            </div>
            <div class="hidden md:flex">
                <nav class="flex space-x-8 items-center">
                    @php
                        $menu = $http->get('/menu')->data();
                        $menuSub = $http->get('/menu-sub')->data();
                    @endphp
                    @foreach($menu as $key => $item)
                        @php
                            $menuSub1 = collect($menuSub)->filter(function ($item1) use ($item){
                               return in_array($item['name'], $item1['category']);
                            })->toArray();
                        @endphp
                        {{--@if($menuSub1)
                            <div x-data="{ show: false }" @click.away="show = false">
                                <button type="button" @click="show = ! show"
                                        class="text-gray-500 group bg-white rounded-md inline-flex items-center text-base font-medium focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                                        aria-expanded="false">
                                    <span>{{$item['name']}}</span>
                                    <svg
                                            class=" ml-2 h-5 w-5 "
                                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                                            aria-hidden="true">
                                        <path fill-rule="evenodd"
                                              d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                              clip-rule="evenodd"/>
                                    </svg>
                                </button>

                                <div x-show="show"
                                     x-transition:enter="transition ease-out duration-200"
                                     x-transition:enter-start="opacity-0 -translate-y-1"
                                     x-transition:enter-end="opacity-100 translate-y-0"
                                     x-transition:leave="transition ease-in duration-150"
                                     x-transition:leave-start="opacity-100 translate-y-0"
                                     x-transition:leave-end="opacity-0 -translate-y-1"
                                     class="hidden md:block absolute z-10 top-full inset-x-0 transform shadow-lg bg-white">
                                    <div
                                            class="max-w-7xl mx-auto grid gap-y-6 px-4 py-6 sm:grid-cols-2 sm:gap-8 sm:px-6 sm:py-8 lg:grid-cols-4 lg:px-8 lg:py-12 xl:py-16">
                                        @foreach($menuSub1 as $key1 => $item1)
                                            <a href="{{$config->base_url}}{{$item1['link']}}"
                                               class="-m-3 p-3 flex flex-col justify-between rounded-lg hover:bg-gray-50">
                                                <div class="flex md:h-full lg:flex-col">
                                                    <div class="flex-shrink-0">
                                                    <span
                                                            class="inline-flex items-center justify-center h-10 w-10 rounded-md bg-indigo-500 text-white sm:h-12 sm:w-12">
                                                        <!-- Heroicon name: outline/chart-bar -->
                                                        --}}{{--<svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none"
                                                             viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                  stroke-width="2"
                                                                  d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" />
                                                        </svg>--}}{{--
                                                        <img class="h-6 w-6"
                                                             src="{{$media->set($item1['image'])->first()}}"/>
                                                    </span>
                                                    </div>
                                                    <div
                                                            class="ml-4 md:flex-1 md:flex md:flex-col md:justify-between lg:ml-0 lg:mt-4">
                                                        <div>
                                                            <p class="text-base font-medium text-gray-900">
                                                                {{$item1['name']}}
                                                            </p>
                                                            <p class="mt-1 text-sm text-gray-500">
                                                                {{$item1['content']}}
                                                            </p>
                                                        </div>
                                                        <p class="mt-2 text-sm font-medium text-indigo-600 lg:mt-4">
                                                            Xem thêm
                                                            <span aria-hidden="true">&rarr;</span>
                                                        </p>
                                                    </div>
                                                </div>
                                            </a>
                                        @endforeach
                                    </div>
                                    <div class="bg-gray-50">
                                        <div
                                                class="max-w-7xl mx-auto space-y-6 px-4 py-5 sm:flex sm:space-y-0 sm:space-x-10 sm:px-6 lg:px-8">
                                            <div class="flow-root">
                                                <a href="#"
                                                   class="-m-3 p-3 flex items-center rounded-md text-base font-medium text-gray-900 hover:bg-gray-100">
                                                    <!-- Heroicon name: outline/play -->
                                                    <svg class="flex-shrink-0 h-6 w-6 text-gray-400"
                                                         xmlns="http://www.w3.org/2000/svg" fill="none"
                                                         viewBox="0 0 24 24"
                                                         stroke="currentColor" aria-hidden="true">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                              stroke-width="2"
                                                              d="M14.752 11.168l-3.197-2.132A1 1 0 0010 9.87v4.263a1 1 0 001.555.832l3.197-2.132a1 1 0 000-1.664z"/>
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                              stroke-width="2" d="M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                                    </svg>
                                                    <span class="ml-3">Watch Demo</span>
                                                </a>
                                            </div>

                                            <div class="flow-root">
                                                <a href="#"
                                                   class="-m-3 p-3 flex items-center rounded-md text-base font-medium text-gray-900 hover:bg-gray-100">
                                                    <!-- Heroicon name: outline/check-circle -->
                                                    <svg class="flex-shrink-0 h-6 w-6 text-gray-400"
                                                         xmlns="http://www.w3.org/2000/svg" fill="none"
                                                         viewBox="0 0 24 24"
                                                         stroke="currentColor" aria-hidden="true">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                              stroke-width="2"
                                                              d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                                    </svg>
                                                    <span class="ml-3">View All Products</span>
                                                </a>
                                            </div>

                                            <div class="flow-root">
                                                <a href="#"
                                                   class="-m-3 p-3 flex items-center rounded-md text-base font-medium text-gray-900 hover:bg-gray-100">
                                                    <!-- Heroicon name: outline/phone -->
                                                    <svg class="flex-shrink-0 h-6 w-6 text-gray-400"
                                                         xmlns="http://www.w3.org/2000/svg" fill="none"
                                                         viewBox="0 0 24 24"
                                                         stroke="currentColor" aria-hidden="true">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                              stroke-width="2"
                                                              d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/>
                                                    </svg>
                                                    <span class="ml-3">Contact Sales</span>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @else--}}
                        <a href="{{$config->base_url}}{{$item['link']}}"
                           class="text-base font-medium text-white relative group">
                            {{$item['name']}}
                            <div class="group-hover:block hidden border-b-4 border-white absolute inset-0 -mb-3"></div>
                        </a>
                        {{--                        @endif--}}
                    @endforeach
                    <button class="btn-gradient h-9 px-3 rounded-lg">LIÊN HỆ: 0935 68 79 85</button>
                </nav>
            </div>
        </div>
    </div>
    <!--
      Mobile menu
    -->
    <div x-show="showMobileMenu" @click.away="showMobileMenu = false"
         class="absolute z-30 top-0 inset-x-0 p-2 transition transform origin-top-right md:hidden">
        <div class="rounded-lg shadow-lg ring-1 ring-black ring-opacity-5 bg-white divide-y-2 divide-gray-50">
            <div class="pt-5 pb-6 px-5 sm:pb-8">
                <div class="flex items-center justify-between">
                    <div>
                        <img class="h-8 w-auto" src="{{$media->set($con['logo'])->first()}}"
                             alt="Workflow">
                    </div>
                    <div class="-mr-2">
                        <button type="button" @click="showMobileMenu = ! showMobileMenu"
                                class="bg-white rounded-md p-2 inline-flex items-center justify-center text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-indigo-500">
                            <span class="sr-only">Close menu</span>
                            <!-- Heroicon name: outline/x -->
                            <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                 stroke="currentColor" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                      d="M6 18L18 6M6 6l12 12"/>
                            </svg>
                        </button>
                    </div>
                </div>
                <div class="mt-6 sm:mt-8">
                    <nav>
                        <div class="grid gap-7 sm:grid-cols-2 sm:gap-y-8 sm:gap-x-4">
                        @foreach($menu as $key => $item)
                            @php
                                $menuSub1 = collect($menuSub)->filter(function ($item1) use ($item){
                                   return in_array($item['name'], $item1['category']);
                                })->toArray();
                            @endphp
                            @if($menuSub1)
                                <!-- This example requires Tailwind CSS v2.0+ -->
                                    <div class="relative" x-data="{ show: false }">
                                        <!-- Item active: "text-gray-900", Item inactive: "text-gray-500" -->
                                        <button type="button" @click="show = ! show"
                                                x-bind:class="show ? 'text-gray-900' : ''"
                                                class="text-gray-500 group bg-white rounded-md inline-flex items-center text-base font-medium hover:text-gray-900 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                                                aria-expanded="false">
                                            <span>{{$item['name']}}</span>
                                            <svg x-bind:class="show ? 'text-gray-600' : ''"
                                                 class="text-gray-400 ml-2 h-5 w-5 group-hover:text-gray-500"
                                                 xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                                 fill="currentColor" aria-hidden="true">
                                                <path fill-rule="evenodd"
                                                      d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                                      clip-rule="evenodd"/>
                                            </svg>
                                        </button>

                                        <div x-show="show" @click.away="show = false"
                                             x-transition:enter="transition ease-out duration-200"
                                             x-transition:enter-start="opacity-0 -translate-y-1"
                                             x-transition:enter-end="opacity-100 translate-y-0"
                                             x-transition:leave="transition ease-in duration-150"
                                             x-transition:leave-start="opacity-100 translate-y-0"
                                             x-transition:leave-end="opacity-0 -translate-y-1"
                                             class=" absolute z-10 left-1/2 transform -translate-x-1/2 mt-3 px-2 w-screen max-w-xs sm:px-0">
                                            <div class="rounded-lg shadow-lg ring-1 ring-black ring-opacity-5 overflow-hidden">
                                                <div class="relative grid gap-6 bg-white px-5 py-6 sm:gap-8 sm:p-8 lg:grid-cols-2 space-y-6">
                                                    @foreach($menuSub1 as $key1 => $item1)
                                                        <a href="{{$config->base_url}}{{$item1['link']}}"
                                                           class="-m-3 p-3 flex  items-start rounded-lg hover:bg-gray-50 transition ease-in-out duration-150">
                                                            <div class="flex-shrink-0 flex items-center justify-center h-10 w-10 rounded-md bg-indigo-500 text-white sm:h-12 sm:w-12">
                                                                <img class="h-6 w-6"
                                                                     src="{{$media->set($item1['image'])->first()}}"/>
                                                            </div>
                                                            <div class="ml-4">
                                                                <p class="text-base font-medium text-gray-900">
                                                                    {{$item1['name']}}
                                                                </p>
                                                                <p class="mt-1 text-sm text-gray-500">
                                                                    {{$item1['content']}}
                                                                </p>
                                                                <p class="mt-2 text-sm font-medium text-indigo-600 lg:mt-4">
                                                                    Xem thêm
                                                                    <span aria-hidden="true">&rarr;</span>
                                                                </p>
                                                            </div>
                                                        </a>
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @else
                                    <a href="{{$config->base_url}}{{$item['link']}}"
                                       class="-m-3 flex items-center p-3 rounded-lg hover:bg-gray-50">
                                        <div class="text-base font-medium text-gray-900">
                                            {{$item['name']}}
                                        </div>
                                    </a>
                                @endif
                            @endforeach
                            <div class="flex items-center md:ml-12">
                                {{--<a href="#" class="text-base font-medium text-gray-500 hover:text-gray-900">
                                    Đăng Nhập
                                </a>
                                <a href="#"
                                   class="ml-8 inline-flex items-center justify-center px-4 py-2 border border-transparent rounded-md shadow-sm text-base font-medium text-white bg-indigo-600 hover:bg-indigo-700">
                                    Đăng ký
                                </a>--}}
                                <a href="#"
                                   class="inline-flex items-center p-2 border border-transparent rounded-full shadow-sm text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                    <!-- Heroicon name: outline/plus-sm -->
                                    <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none"
                                         viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                              d="M9 8h-3v4h3v12h5v-12h3.642l.358-4h-4v-1.667c0-.955.192-1.333 1.115-1.333h2.885v-5h-3.808c-3.596 0-5.192 1.583-5.192 4.615v3.385z"/>
                                    </svg>
                                </a>
                                <a href="#"
                                   class="ml-4 inline-flex items-center p-2 border border-transparent rounded-full shadow-sm text-white bg-red-600 hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500">
                                    <!-- Heroicon name: outline/plus-sm -->
                                    <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none"
                                         viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                              d="M19.615 3.184c-3.604-.246-11.631-.245-15.23 0-3.897.266-4.356 2.62-4.385 8.816.029 6.185.484 8.549 4.385 8.816 3.6.245 11.626.246 15.23 0 3.897-.266 4.356-2.62 4.385-8.816-.029-6.185-.484-8.549-4.385-8.816zm-10.615 12.816v-8l8 3.993-8 4.007z"/>
                                    </svg>
                                </a>
                            </div>
                            {{--<a href="{{$config->base_url}}"
                               class="w-full flex items-center justify-center px-4 py-2 border border-transparent rounded-md shadow-sm text-base font-medium text-white bg-indigo-600 hover:bg-indigo-700">
                                Đăng ký
                            </a>

                            <button type="button" class="inline-flex items-center p-2 border border-transparent rounded-full shadow-sm text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                <!-- Heroicon name: solid/plus-sm -->
                                <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                    <path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd" />
                                </svg>
                            </button>

                            <p class=" text-center text-base font-medium text-gray-500">
                                Đã có tài khoản?
                                <a href="{{$config->base_url}}" class="text-indigo-600 hover:text-indigo-500">
                                    Đăng nhập
                                </a>
                            </p>--}}
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</header>
@yield('main')
<!--
  This example requires Tailwind CSS v2.0+

  This example requires some changes to your config:

  ```
  // tailwind.config.js
  module.exports = {
    // ...
    plugins: [
      // ...
      require('@tailwindcss/forms'),
    ],
  }
  ```
-->
{{--
<footer class="bg-gray-800 mt-16 lg:mt-32" aria-labelledby="footer-heading">
    <h2 id="footer-heading" class="sr-only">Footer</h2>
    <div class="max-w-7xl mx-auto py-12 px-4 sm:px-6 lg:py-16 lg:px-8">
        <div class="pb-8 xl:grid xl:grid-cols-5 xl:gap-8">
            <div class="grid grid-cols-2 gap-8 xl:col-span-4">
                <div class="md:grid md:grid-cols-2 md:gap-8">
                    <div>
                        <h3 class="text-sm font-semibold text-gray-400 tracking-wider uppercase">
                            Solutions
                        </h3>
                        <ul role="list" class="mt-4 space-y-4">
                            <li>
                                <a href="#" class="text-base text-gray-300 hover:text-white">
                                    Marketing
                                </a>
                            </li>

                            <li>
                                <a href="#" class="text-base text-gray-300 hover:text-white">
                                    Analytics
                                </a>
                            </li>

                            <li>
                                <a href="#" class="text-base text-gray-300 hover:text-white">
                                    Commerce
                                </a>
                            </li>

                            <li>
                                <a href="#" class="text-base text-gray-300 hover:text-white">
                                    Insights
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div class="mt-12 md:mt-0">
                        <h3 class="text-sm font-semibold text-gray-400 tracking-wider uppercase">
                            Support
                        </h3>
                        <ul role="list" class="mt-4 space-y-4">
                            <li>
                                <a href="#" class="text-base text-gray-300 hover:text-white">
                                    Pricing
                                </a>
                            </li>

                            <li>
                                <a href="#" class="text-base text-gray-300 hover:text-white">
                                    Documentation
                                </a>
                            </li>

                            <li>
                                <a href="#" class="text-base text-gray-300 hover:text-white">
                                    Guides
                                </a>
                            </li>

                            <li>
                                <a href="#" class="text-base text-gray-300 hover:text-white">
                                    API Status
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="md:grid md:grid-cols-2 md:gap-8">
                    <div>
                        <h3 class="text-sm font-semibold text-gray-400 tracking-wider uppercase">
                            Company
                        </h3>
                        <ul role="list" class="mt-4 space-y-4">
                            <li>
                                <a href="#" class="text-base text-gray-300 hover:text-white">
                                    About
                                </a>
                            </li>

                            <li>
                                <a href="#" class="text-base text-gray-300 hover:text-white">
                                    Blog
                                </a>
                            </li>

                            <li>
                                <a href="#" class="text-base text-gray-300 hover:text-white">
                                    Jobs
                                </a>
                            </li>

                            <li>
                                <a href="#" class="text-base text-gray-300 hover:text-white">
                                    Press
                                </a>
                            </li>

                            <li>
                                <a href="#" class="text-base text-gray-300 hover:text-white">
                                    Partners
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div class="mt-12 md:mt-0">
                        <h3 class="text-sm font-semibold text-gray-400 tracking-wider uppercase">
                            Legal
                        </h3>
                        <ul role="list" class="mt-4 space-y-4">
                            <li>
                                <a href="#" class="text-base text-gray-300 hover:text-white">
                                    Claim
                                </a>
                            </li>

                            <li>
                                <a href="#" class="text-base text-gray-300 hover:text-white">
                                    Privacy
                                </a>
                            </li>

                            <li>
                                <a href="#" class="text-base text-gray-300 hover:text-white">
                                    Terms
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="mt-12 xl:mt-0">
                <h3 class="text-sm font-semibold text-gray-400 tracking-wider uppercase">
                    Language &amp; Currency
                </h3>
                <form class="mt-4 sm:max-w-xs">
                    <fieldset class="w-full">
                        <label for="language" class="sr-only">Language</label>
                        <div class="relative">
                            <select id="language" name="language"
                                    class="appearance-none block w-full bg-none bg-gray-700 border border-transparent rounded-md py-2 pl-3 pr-10 text-base text-white focus:outline-none focus:ring-white focus:border-white sm:text-sm">
                                <option selected>English</option>
                                <option>French</option>
                                <option>German</option>
                                <option>Japanese</option>
                                <option>Spanish</option>
                            </select>
                            <div class="pointer-events-none absolute inset-y-0 right-0 px-2 flex items-center">
                                <!-- Heroicon name: solid/chevron-down -->
                                <svg class="h-4 w-4 text-white" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                     fill="currentColor" aria-hidden="true">
                                    <path fill-rule="evenodd"
                                          d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                          clip-rule="evenodd"/>
                                </svg>
                            </div>
                        </div>
                    </fieldset>
                    <fieldset class="mt-4 w-full">
                        <label for="currency" class="sr-only">Currency</label>
                        <div class="mt-1.5 relative">
                            <select id="currency" name="currency"
                                    class="appearance-none w-full bg-none bg-gray-700 border border-transparent rounded-md block py-2 pl-3 pr-10 text-base text-white focus:outline-none focus:ring-white focus:border-white sm:text-sm">
                                <option>ARS</option>
                                <option selected>AUD</option>
                                <option>CAD</option>
                                <option>CHF</option>
                                <option>EUR</option>
                                <option>GBP</option>
                                <option>JPY</option>
                                <option>USD</option>
                            </select>
                            <div class="pointer-events-none absolute inset-y-0 right-0 px-2 flex items-center">
                                <!-- Heroicon name: solid/chevron-down -->
                                <svg class="h-4 w-4 text-white" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                     fill="currentColor" aria-hidden="true">
                                    <path fill-rule="evenodd"
                                          d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                          clip-rule="evenodd"/>
                                </svg>
                            </div>
                        </div>
                    </fieldset>
                </form>
            </div>
        </div>
        <div class="border-t border-gray-700 pt-8 lg:flex lg:items-center lg:justify-between xl:mt-0">
            <div>
                <h3 class="text-sm font-semibold text-gray-400 tracking-wider uppercase">
                    Subscribe to our newsletter
                </h3>
                <p class="mt-2 text-base text-gray-300">
                    The latest news, articles, and resources, sent to your inbox weekly.
                </p>
            </div>
            <form class="mt-4 sm:flex sm:max-w-md lg:mt-0">
                <label for="email-address" class="sr-only">Email address</label>
                <input type="email" name="email-address" id="email-address" autocomplete="email" required
                       class="appearance-none min-w-0 w-full bg-white border border-transparent rounded-md py-2 px-4 text-base text-gray-900 placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-800 focus:ring-white focus:border-white focus:placeholder-gray-400 sm:max-w-xs"
                       placeholder="Enter your email">
                <div class="mt-3 rounded-md sm:mt-0 sm:ml-3 sm:flex-shrink-0">
                    <button type="submit"
                            class="w-full bg-indigo-500 border border-transparent rounded-md py-2 px-4 flex items-center justify-center text-base font-medium text-white hover:bg-indigo-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-800 focus:ring-indigo-500">
                        Subscribe
                    </button>
                </div>
            </form>
        </div>
        <div class="mt-8 border-t border-gray-700 pt-8 md:flex md:items-center md:justify-between">
            <div class="flex space-x-6 md:order-2">
                <a href="#" class="text-gray-400 hover:text-gray-300">
                    <span class="sr-only">Facebook</span>
                    <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                        <path fill-rule="evenodd"
                              d="M22 12c0-5.523-4.477-10-10-10S2 6.477 2 12c0 4.991 3.657 9.128 8.438 9.878v-6.987h-2.54V12h2.54V9.797c0-2.506 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.771-1.63 1.562V12h2.773l-.443 2.89h-2.33v6.988C18.343 21.128 22 16.991 22 12z"
                              clip-rule="evenodd"/>
                    </svg>
                </a>

                <a href="#" class="text-gray-400 hover:text-gray-300">
                    <span class="sr-only">Instagram</span>
                    <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                        <path fill-rule="evenodd"
                              d="M12.315 2c2.43 0 2.784.013 3.808.06 1.064.049 1.791.218 2.427.465a4.902 4.902 0 011.772 1.153 4.902 4.902 0 011.153 1.772c.247.636.416 1.363.465 2.427.048 1.067.06 1.407.06 4.123v.08c0 2.643-.012 2.987-.06 4.043-.049 1.064-.218 1.791-.465 2.427a4.902 4.902 0 01-1.153 1.772 4.902 4.902 0 01-1.772 1.153c-.636.247-1.363.416-2.427.465-1.067.048-1.407.06-4.123.06h-.08c-2.643 0-2.987-.012-4.043-.06-1.064-.049-1.791-.218-2.427-.465a4.902 4.902 0 01-1.772-1.153 4.902 4.902 0 01-1.153-1.772c-.247-.636-.416-1.363-.465-2.427-.047-1.024-.06-1.379-.06-3.808v-.63c0-2.43.013-2.784.06-3.808.049-1.064.218-1.791.465-2.427a4.902 4.902 0 011.153-1.772A4.902 4.902 0 015.45 2.525c.636-.247 1.363-.416 2.427-.465C8.901 2.013 9.256 2 11.685 2h.63zm-.081 1.802h-.468c-2.456 0-2.784.011-3.807.058-.975.045-1.504.207-1.857.344-.467.182-.8.398-1.15.748-.35.35-.566.683-.748 1.15-.137.353-.3.882-.344 1.857-.047 1.023-.058 1.351-.058 3.807v.468c0 2.456.011 2.784.058 3.807.045.975.207 1.504.344 1.857.182.466.399.8.748 1.15.35.35.683.566 1.15.748.353.137.882.3 1.857.344 1.054.048 1.37.058 4.041.058h.08c2.597 0 2.917-.01 3.96-.058.976-.045 1.505-.207 1.858-.344.466-.182.8-.398 1.15-.748.35-.35.566-.683.748-1.15.137-.353.3-.882.344-1.857.048-1.055.058-1.37.058-4.041v-.08c0-2.597-.01-2.917-.058-3.96-.045-.976-.207-1.505-.344-1.858a3.097 3.097 0 00-.748-1.15 3.098 3.098 0 00-1.15-.748c-.353-.137-.882-.3-1.857-.344-1.023-.047-1.351-.058-3.807-.058zM12 6.865a5.135 5.135 0 110 10.27 5.135 5.135 0 010-10.27zm0 1.802a3.333 3.333 0 100 6.666 3.333 3.333 0 000-6.666zm5.338-3.205a1.2 1.2 0 110 2.4 1.2 1.2 0 010-2.4z"
                              clip-rule="evenodd"/>
                    </svg>
                </a>

                <a href="#" class="text-gray-400 hover:text-gray-300">
                    <span class="sr-only">Twitter</span>
                    <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                        <path d="M8.29 20.251c7.547 0 11.675-6.253 11.675-11.675 0-.178 0-.355-.012-.53A8.348 8.348 0 0022 5.92a8.19 8.19 0 01-2.357.646 4.118 4.118 0 001.804-2.27 8.224 8.224 0 01-2.605.996 4.107 4.107 0 00-6.993 3.743 11.65 11.65 0 01-8.457-4.287 4.106 4.106 0 001.27 5.477A4.072 4.072 0 012.8 9.713v.052a4.105 4.105 0 003.292 4.022 4.095 4.095 0 01-1.853.07 4.108 4.108 0 003.834 2.85A8.233 8.233 0 012 18.407a11.616 11.616 0 006.29 1.84"/>
                    </svg>
                </a>

                <a href="#" class="text-gray-400 hover:text-gray-300">
                    <span class="sr-only">GitHub</span>
                    <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                        <path fill-rule="evenodd"
                              d="M12 2C6.477 2 2 6.484 2 12.017c0 4.425 2.865 8.18 6.839 9.504.5.092.682-.217.682-.483 0-.237-.008-.868-.013-1.703-2.782.605-3.369-1.343-3.369-1.343-.454-1.158-1.11-1.466-1.11-1.466-.908-.62.069-.608.069-.608 1.003.07 1.531 1.032 1.531 1.032.892 1.53 2.341 1.088 2.91.832.092-.647.35-1.088.636-1.338-2.22-.253-4.555-1.113-4.555-4.951 0-1.093.39-1.988 1.029-2.688-.103-.253-.446-1.272.098-2.65 0 0 .84-.27 2.75 1.026A9.564 9.564 0 0112 6.844c.85.004 1.705.115 2.504.337 1.909-1.296 2.747-1.027 2.747-1.027.546 1.379.202 2.398.1 2.651.64.7 1.028 1.595 1.028 2.688 0 3.848-2.339 4.695-4.566 4.943.359.309.678.92.678 1.855 0 1.338-.012 2.419-.012 2.747 0 .268.18.58.688.482A10.019 10.019 0 0022 12.017C22 6.484 17.522 2 12 2z"
                              clip-rule="evenodd"/>
                    </svg>
                </a>

                <a href="#" class="text-gray-400 hover:text-gray-300">
                    <span class="sr-only">Dribbble</span>
                    <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                        <path fill-rule="evenodd"
                              d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10c5.51 0 10-4.48 10-10S17.51 2 12 2zm6.605 4.61a8.502 8.502 0 011.93 5.314c-.281-.054-3.101-.629-5.943-.271-.065-.141-.12-.293-.184-.445a25.416 25.416 0 00-.564-1.236c3.145-1.28 4.577-3.124 4.761-3.362zM12 3.475c2.17 0 4.154.813 5.662 2.148-.152.216-1.443 1.941-4.48 3.08-1.399-2.57-2.95-4.675-3.189-5A8.687 8.687 0 0112 3.475zm-3.633.803a53.896 53.896 0 013.167 4.935c-3.992 1.063-7.517 1.04-7.896 1.04a8.581 8.581 0 014.729-5.975zM3.453 12.01v-.26c.37.01 4.512.065 8.775-1.215.25.477.477.965.694 1.453-.109.033-.228.065-.336.098-4.404 1.42-6.747 5.303-6.942 5.629a8.522 8.522 0 01-2.19-5.705zM12 20.547a8.482 8.482 0 01-5.239-1.8c.152-.315 1.888-3.656 6.703-5.337.022-.01.033-.01.054-.022a35.318 35.318 0 011.823 6.475 8.4 8.4 0 01-3.341.684zm4.761-1.465c-.086-.52-.542-3.015-1.659-6.084 2.679-.423 5.022.271 5.314.369a8.468 8.468 0 01-3.655 5.715z"
                              clip-rule="evenodd"/>
                    </svg>
                </a>
            </div>
            <p class="mt-8 text-base text-gray-400 md:mt-0 md:order-1">
                &copy; 2020 Workflow, Inc. All rights reserved.
            </p>
        </div>
    </div>
</footer>
--}}

<footer class="bg-gray">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 ">
        <!-- grid -->
        <div class="grid grid-cols-12 gap-3 py-6">
            <div class="col-span-4 space-y-6 ">
                <img class="" src="{{$config->static}}/assets/images/PHUMYcopy.png" alt="">
                <p class="text-white text-xl text-center">Cổng thông tin cập nhật dự án Khu đô thị Phú Mỹ - Quảng
                    Ngãi</p>
            </div>
            <div class="col-span-4 text-center">
                <form action="" class="space-y-3">
                    <h4 class="text-white text-xl">NHẬN THÔNG TIN DỰ ÁN</h4>
                    @php
                        $fields = [
                            [
                                'name' => "ho-ten",
                                'hint' => "*Họ và tên"
                            ],
                            [
                                'name' => "email",
                                'type' => "email",
                                'hint' => "Email"
                            ],
                            [
                                'name' => "sdt",
                                'type' => "tel",
                                'hint' => "*Số điện thoại"
                            ]
                        ];
                    @endphp
                    @foreach($fields as $key => $item)
                        <label class="block w-2/3 mx-auto">
                            <input type="{{$item['type']??'text'}}"
                                   name="{{$item['name']}}"
                                   placeholder="{{$item['hint']}}"
                                   class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 ">
                        </label>
                    @endforeach

                    <button class="btn-gradient h-9 px-3 flex-shrink-0" type="submit">
                        Đăng ký ngay
                    </button>
                </form>
            </div>
            <div class="col-span-4 text-white space-y-3">
                <h4 class="text-white text-xl">THÔNG TIN LIÊN HỆ</h4>
                <p class="">PHÒNG KINH DOANH</p>
                <p class="">Hotline: 0935 687 985
                    0708 082 298</p>
                <p class="">Địa chỉ: Khu đô thị Phú Mỹ, Phường Nghĩa Chánh,
                    Tp Quảng Ngãi</p>
            </div>
        </div>
    </div>
    <hr class="">
    <p class="text-center text-white py-4 text-xl">
        Copyright © khudothiphumy. 2022.
    </p>
</footer>
</body>

</html>
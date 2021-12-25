@extends($config->layout.'/master')

@section('main')
@php
$home = $http->get('/home')->data();
$home = collect($home)->groupBy('type')->toArray();
dd($home);
$home2 = \Illuminate\Support\Arr::first($home['home-2']);
@endphp
    <main class="space-y-16 lg:space-y-32">
        <!-- This example requires Tailwind CSS v2.0+ -->
        <section class="relative bg-gray-800 py-32 px-6 sm:py-40 sm:px-12 lg:px-16">
            <div class="absolute inset-0 overflow-hidden">
                <img src="https://tailwindui.com/img/ecommerce-images/home-page-03-feature-section-full-width.jpg"
                     alt=""
                     class="w-full h-full object-center object-cover">
            </div>
            <div aria-hidden="true" class="absolute inset-0 bg-gray-900 bg-opacity-50"></div>
            <div class="relative max-w-3xl mx-auto flex flex-col items-center text-center">
                <h2 class="text-3xl font-extrabold tracking-tight text-white sm:text-4xl">Long-term thinking</h2>
                <p class="mt-3 text-xl text-white">We're committed to responsible, sustainable, and ethical
                    manufacturing.
                    Our small-scale approach allows us to focus on quality and reduce our impact. We're doing our best
                    to
                    delay the inevitable heat-death of the universe.</p>
                <a href="#"
                   class="mt-8 w-full block bg-white border border-transparent rounded-md py-3 px-8 text-base font-medium text-gray-900 hover:bg-gray-100 sm:w-auto">Read
                    our story</a>
            </div>
        </section>

        <!--
      This example requires Tailwind CSS v2.0+

      This example requires some changes to your config:

      ```
      // tailwind.config.js
      module.exports = {
        // ...
        plugins: [
          // ...
          require('@tailwindcss/aspect-ratio'),
        ],
      }
      ```
    -->
        <section class="relative bg-white">
            <div class="hidden absolute top-0 inset-x-0 h-1/2 bg-gray-50 lg:block" aria-hidden="true"></div>
            <div class="max-w-7xl mx-auto bg-indigo-600 lg:bg-transparent lg:px-8">
                <div class="lg:grid lg:grid-cols-12">
                    <div class="relative z-10 lg:col-start-1 lg:row-start-1 lg:col-span-4 lg:py-16 lg:bg-transparent">
                        <div class="absolute inset-x-0 h-1/2 bg-gray-50 lg:hidden" aria-hidden="true"></div>
                        <div class="max-w-md mx-auto px-4 sm:max-w-3xl sm:px-6 lg:max-w-none lg:p-0">
                            <div class="aspect-w-10 aspect-h-6 sm:aspect-w-2 sm:aspect-h-1 lg:aspect-w-1">
                                <img class="object-cover object-center rounded-3xl shadow-2xl"
                                     src="{{$media->set($home2['image'])->first()}}"
                                     alt="">
                            </div>
                        </div>
                    </div>

                    <div class="relative bg-indigo-600 lg:col-start-3 lg:row-start-1 lg:col-span-10 lg:rounded-3xl lg:grid lg:grid-cols-10 lg:items-center">
                        <div class="hidden absolute inset-0 overflow-hidden rounded-3xl lg:block" aria-hidden="true">
                            <svg class="absolute bottom-full left-full transform translate-y-1/3 -translate-x-2/3 xl:bottom-auto xl:top-0 xl:translate-y-0"
                                 width="404" height="384" fill="none" viewBox="0 0 404 384" aria-hidden="true">
                                <defs>
                                    <pattern id="64e643ad-2176-4f86-b3d7-f2c5da3b6a6d" x="0" y="0" width="20"
                                             height="20"
                                             patternUnits="userSpaceOnUse">
                                        <rect x="0" y="0" width="4" height="4" class="text-indigo-500"
                                              fill="currentColor"/>
                                    </pattern>
                                </defs>
                                <rect width="404" height="384" fill="url(#64e643ad-2176-4f86-b3d7-f2c5da3b6a6d)"/>
                            </svg>
                            <svg class="absolute top-full transform -translate-y-1/3 -translate-x-1/3 xl:-translate-y-1/2"
                                 width="404" height="384" fill="none" viewBox="0 0 404 384" aria-hidden="true">
                                <defs>
                                    <pattern id="64e643ad-2176-4f86-b3d7-f2c5da3b6a6d" x="0" y="0" width="20"
                                             height="20"
                                             patternUnits="userSpaceOnUse">
                                        <rect x="0" y="0" width="4" height="4" class="text-indigo-500"
                                              fill="currentColor"/>
                                    </pattern>
                                </defs>
                                <rect width="404" height="384" fill="url(#64e643ad-2176-4f86-b3d7-f2c5da3b6a6d)"/>
                            </svg>
                        </div>
                        <div class="relative max-w-md mx-auto py-12 px-4 space-y-6 sm:max-w-3xl sm:py-16 sm:px-6 lg:max-w-none lg:p-0 lg:col-start-4 lg:col-span-6">
                            <h2 class="text-3xl font-extrabold text-white" id="join-heading">{{$home2['name']}}</h2>
{{--                            <p class="text-lg text-white">{{$home2['content']}}</p>--}}
                            <a class="block w-full py-3 px-5 text-center bg-white border border-transparent rounded-md shadow-md text-base font-medium text-indigo-700 hover:bg-gray-50 sm:inline-block sm:w-auto"
                               href="{{@$home2['more']['button']['link']}}">{{@$home2['more']['button']['name']}}</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- This example requires Tailwind CSS v2.0+ -->
        <section class="relative bg-white ">
            <div class="mx-auto max-w-md px-4 text-center sm:max-w-3xl sm:px-6 lg:px-8 lg:max-w-7xl">
                <h2 class="text-base font-semibold tracking-wider text-indigo-600 uppercase">Deploy faster</h2>
                <p class="mt-2 text-3xl font-extrabold text-gray-900 tracking-tight sm:text-4xl">
                    Everything you need to deploy your app
                </p>
                <p class="mt-5 max-w-prose mx-auto text-xl text-gray-500">
                    Phasellus lorem quam molestie id quisque diam aenean nulla in. Accumsan in quis quis nunc,
                    ullamcorper
                    malesuada. Eleifend condimentum id viverra nulla.
                </p>
                <div class="mt-12">
                    <div class="grid grid-cols-1 gap-8 sm:grid-cols-2 lg:grid-cols-3">
                        <div class="pt-6">
                            <div class="flow-root bg-gray-50 rounded-lg px-6 pb-8">
                                <div class="-mt-6">
                                    <div>
                <span class="inline-flex items-center justify-center p-3 bg-indigo-500 rounded-md shadow-lg">
                  <!-- Heroicon name: outline/cloud-upload -->
                  <svg class="h-6 w-6 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                       stroke="currentColor" aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"/>
                  </svg>
                </span>
                                    </div>
                                    <h3 class="mt-8 text-lg font-medium text-gray-900 tracking-tight">Push to
                                        Deploy</h3>
                                    <p class="mt-5 text-base text-gray-500">
                                        Ac tincidunt sapien vehicula erat auctor pellentesque rhoncus. Et magna sit
                                        morbi
                                        lobortis.
                                    </p>
                                </div>
                            </div>
                        </div>

                        <div class="pt-6">
                            <div class="flow-root bg-gray-50 rounded-lg px-6 pb-8">
                                <div class="-mt-6">
                                    <div>
                <span class="inline-flex items-center justify-center p-3 bg-indigo-500 rounded-md shadow-lg">
                  <!-- Heroicon name: outline/lock-closed -->
                  <svg class="h-6 w-6 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                       stroke="currentColor" aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/>
                  </svg>
                </span>
                                    </div>
                                    <h3 class="mt-8 text-lg font-medium text-gray-900 tracking-tight">SSL
                                        Certificates</h3>
                                    <p class="mt-5 text-base text-gray-500">
                                        Ac tincidunt sapien vehicula erat auctor pellentesque rhoncus. Et magna sit
                                        morbi
                                        lobortis.
                                    </p>
                                </div>
                            </div>
                        </div>

                        <div class="pt-6">
                            <div class="flow-root bg-gray-50 rounded-lg px-6 pb-8">
                                <div class="-mt-6">
                                    <div>
                <span class="inline-flex items-center justify-center p-3 bg-indigo-500 rounded-md shadow-lg">
                  <!-- Heroicon name: outline/refresh -->
                  <svg class="h-6 w-6 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                       stroke="currentColor" aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"/>
                  </svg>
                </span>
                                    </div>
                                    <h3 class="mt-8 text-lg font-medium text-gray-900 tracking-tight">Simple Queues</h3>
                                    <p class="mt-5 text-base text-gray-500">
                                        Ac tincidunt sapien vehicula erat auctor pellentesque rhoncus. Et magna sit
                                        morbi
                                        lobortis.
                                    </p>
                                </div>
                            </div>
                        </div>

                        <div class="pt-6">
                            <div class="flow-root bg-gray-50 rounded-lg px-6 pb-8">
                                <div class="-mt-6">
                                    <div>
                <span class="inline-flex items-center justify-center p-3 bg-indigo-500 rounded-md shadow-lg">
                  <!-- Heroicon name: outline/shield-check -->
                  <svg class="h-6 w-6 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                       stroke="currentColor" aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/>
                  </svg>
                </span>
                                    </div>
                                    <h3 class="mt-8 text-lg font-medium text-gray-900 tracking-tight">Advanced
                                        Security</h3>
                                    <p class="mt-5 text-base text-gray-500">
                                        Ac tincidunt sapien vehicula erat auctor pellentesque rhoncus. Et magna sit
                                        morbi
                                        lobortis.
                                    </p>
                                </div>
                            </div>
                        </div>

                        <div class="pt-6">
                            <div class="flow-root bg-gray-50 rounded-lg px-6 pb-8">
                                <div class="-mt-6">
                                    <div>
                <span class="inline-flex items-center justify-center p-3 bg-indigo-500 rounded-md shadow-lg">
                  <!-- Heroicon name: outline/cog -->
                  <svg class="h-6 w-6 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                       stroke="currentColor" aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"/>
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                  </svg>
                </span>
                                    </div>
                                    <h3 class="mt-8 text-lg font-medium text-gray-900 tracking-tight">Powerful API</h3>
                                    <p class="mt-5 text-base text-gray-500">
                                        Ac tincidunt sapien vehicula erat auctor pellentesque rhoncus. Et magna sit
                                        morbi
                                        lobortis.
                                    </p>
                                </div>
                            </div>
                        </div>

                        <div class="pt-6">
                            <div class="flow-root bg-gray-50 rounded-lg px-6 pb-8">
                                <div class="-mt-6">
                                    <div>
                <span class="inline-flex items-center justify-center p-3 bg-indigo-500 rounded-md shadow-lg">
                  <!-- Heroicon name: outline/server -->
                  <svg class="h-6 w-6 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                       stroke="currentColor" aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M5 12h14M5 12a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v4a2 2 0 01-2 2M5 12a2 2 0 00-2 2v4a2 2 0 002 2h14a2 2 0 002-2v-4a2 2 0 00-2-2m-2-4h.01M17 16h.01"/>
                  </svg>
                </span>
                                    </div>
                                    <h3 class="mt-8 text-lg font-medium text-gray-900 tracking-tight">Database
                                        Backups</h3>
                                    <p class="mt-5 text-base text-gray-500">
                                        Ac tincidunt sapien vehicula erat auctor pellentesque rhoncus. Et magna sit
                                        morbi
                                        lobortis.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- This example requires Tailwind CSS v2.0+ -->
        <section class="bg-white ">
            <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="relative py-24 px-8 bg-indigo-500 rounded-xl shadow-2xl overflow-hidden lg:px-16 lg:grid lg:grid-cols-2 lg:gap-x-8">
                    <div class="absolute inset-0 opacity-50 filter saturate-0 mix-blend-multiply">
                        <img src="https://images.unsplash.com/photo-1601381718415-a05fb0a261f3?ixid=MXwxMjA3fDB8MHxwcm9maWxlLXBhZ2V8ODl8fHxlbnwwfHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=1216&q=80"
                             alt="" class="w-full h-full object-cover">
                    </div>
                    <div class="relative lg:col-span-1">
                        <img class="h-12 w-auto" src="https://tailwindui.com/img/logos/workcation-logo-white.svg"
                             alt="">
                        <blockquote class="mt-6 text-white">
                            <p class="text-xl font-medium sm:text-2xl">Workflow has completely transformed how we
                                interact with customers. We've seen record bookings, higher customer satisfaction, and
                                reduced churn.</p>
                            <footer class="mt-6">
                                <p class="flex flex-col font-medium">
                                    <span>Marie Chilvers</span>
                                    <span>CEO, Workcation</span>
                                </p>
                            </footer>
                        </blockquote>
                    </div>
                </div>
            </div>
        </section>
        <!-- This example requires Tailwind CSS v2.0+ -->
        <section class="relative bg-gray-50  px-4 sm:px-6 lg:px-8">
            <div class="absolute inset-0">
                <div class="bg-white h-1/3 sm:h-2/3"></div>
            </div>
            <div class="relative max-w-7xl mx-auto">
                <div class="text-center">
                    <h2 class="text-3xl tracking-tight font-extrabold text-gray-900 sm:text-4xl">
                        From the blog
                    </h2>
                    <p class="mt-3 max-w-2xl mx-auto text-xl text-gray-500 sm:mt-4">
                        Lorem ipsum dolor sit amet consectetur, adipisicing elit. Ipsa libero labore natus atque,
                        ducimus sed.
                    </p>
                </div>
                <div class="mt-12 max-w-lg mx-auto grid gap-5 lg:grid-cols-3 lg:max-w-none">
                    <div class="flex flex-col rounded-lg shadow-lg overflow-hidden">
                        <div class="flex-shrink-0">
                            <img class="h-48 w-full object-cover"
                                 src="https://images.unsplash.com/photo-1496128858413-b36217c2ce36?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1679&q=80"
                                 alt="">
                        </div>
                        <div class="flex-1 bg-white p-6 flex flex-col justify-between">
                            <div class="flex-1">
                                <p class="text-sm font-medium text-indigo-600">
                                    <a href="#" class="hover:underline">
                                        Article
                                    </a>
                                </p>
                                <a href="#" class="block mt-2">
                                    <p class="text-xl font-semibold text-gray-900">
                                        Boost your conversion rate
                                    </p>
                                    <p class="mt-3 text-base text-gray-500">
                                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Architecto accusantium
                                        praesentium eius, ut atque fuga culpa, similique sequi cum eos quis dolorum.
                                    </p>
                                </a>
                            </div>
                            <div class="mt-6 flex items-center">
                                <div class="flex-shrink-0">
                                    <a href="#">
                                        <span class="sr-only">Roel Aufderehar</span>
                                        <img class="h-10 w-10 rounded-full"
                                             src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80"
                                             alt="">
                                    </a>
                                </div>
                                <div class="ml-3">
                                    <p class="text-sm font-medium text-gray-900">
                                        <a href="#" class="hover:underline">
                                            Roel Aufderehar
                                        </a>
                                    </p>
                                    <div class="flex space-x-1 text-sm text-gray-500">
                                        <time datetime="2020-03-16">
                                            Mar 16, 2020
                                        </time>
                                        <span aria-hidden="true">
                  &middot;
                </span>
                                        <span>
                  6 min read
                </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="flex flex-col rounded-lg shadow-lg overflow-hidden">
                        <div class="flex-shrink-0">
                            <img class="h-48 w-full object-cover"
                                 src="https://images.unsplash.com/photo-1547586696-ea22b4d4235d?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1679&q=80"
                                 alt="">
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
                                             alt="">
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
                                 alt="">
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
                                             alt="">
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
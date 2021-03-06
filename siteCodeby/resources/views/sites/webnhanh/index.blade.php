<!DOCTYPE html>
<html lang="en">

<head>
    <title>Page title</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    {{--  <link rel="stylesheet" href="https://rsms.me/inter/inter.css">
      <link rel="stylesheet" href="css/tailwind/tailwind.min.css">
      <link rel="icon" type="image/png" sizes="16x16" href="favicon-tailwind.png">--}}
    <link href="{{ asset('css-webnhanh/app.css') }}" rel="stylesheet">
    <script src="//unpkg.com/alpinejs" defer></script>
</head>

<body class="font-sans antialiased text-gray-900">
<div class="">
    <div class="h-screen flex overflow-hidden bg-white">

        <div class="lg:hidden">
            <div class="fixed inset-0 flex z-40">
                <div class="fixed inset-0">
                    <div class="absolute inset-0 bg-gray-600 opacity-75"></div>
                </div>
                <div class="relative flex-1 flex flex-col max-w-xs w-full bg-white focus:outline-none" tabindex="0">
                    <div class="absolute top-0 right-0 -mr-12 pt-2">
                        <button
                                class="ml-1 flex items-center justify-center h-10 w-10 rounded-full focus:outline-none focus:ring-2 focus:ring-inset focus:ring-white"
                                type="button">
                            <span class="sr-only">Close sidebar</span>
                            <svg class="h-6 w-6 text-white" xmlns="http://www.w3.org/2000/svg" fill="none"
                                 viewbox="0 0 24 24"
                                 stroke="currentColor" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                      d="M6 18L18 6M6 6l12 12"></path>
                            </svg>
                        </button>
                    </div>
                    <div class="flex-1 h-0 pt-5 pb-4 overflow-y-auto">
                        <div class="flex-shrink-0 flex items-center px-4">
                            <img class="h-8 w-auto"
                                 src="https://tailwindui.com/img/logos/workflow-logo-indigo-600-mark-gray-900-text.svg"
                                 alt="Workflow">
                        </div>
                        <nav class="mt-5" aria-label="Sidebar">
                            <div class="px-2 space-y-1">
                                <a class="bg-gray-100 text-gray-900 group flex items-center px-2 py-2 text-base font-medium rounded-md"
                                   href="#">
                                    <svg class="text-gray-500 mr-4 h-6 w-6" xmlns="http://www.w3.org/2000/svg"
                                         fill="none"
                                         viewbox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                              d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6">
                                        </path>
                                    </svg>
                                    <span>D??? ??n web</span>
                                </a>
                                <a class="text-gray-600 hover:bg-gray-50 hover:text-gray-900 group flex items-center px-2 py-2 text-base font-medium rounded-md"
                                   href="#">
                                    <svg class="text-gray-400 group-hover:text-gray-500 mr-4 h-6 w-6"
                                         xmlns="http://www.w3.org/2000/svg"
                                         fill="none" viewbox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                              d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z">
                                        </path>
                                    </svg>
                                    <span>Calendar</span>
                                </a>
                                <a class="text-gray-600 hover:bg-gray-50 hover:text-gray-900 group flex items-center px-2 py-2 text-base font-medium rounded-md"
                                   href="#">
                                    <svg class="text-gray-400 group-hover:text-gray-500 mr-4 h-6 w-6"
                                         xmlns="http://www.w3.org/2000/svg"
                                         fill="none" viewbox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                              d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z">
                                        </path>
                                    </svg>
                                    <span>Teams</span>
                                </a>
                                <a class="text-gray-600 hover:bg-gray-50 hover:text-gray-900 group flex items-center px-2 py-2 text-base font-medium rounded-md"
                                   href="#">
                                    <svg class="text-gray-400 group-hover:text-gray-500 mr-4 h-6 w-6"
                                         xmlns="http://www.w3.org/2000/svg"
                                         fill="none" viewbox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                              d="M8 16l2.879-2.879m0 0a3 3 0 104.243-4.242 3 3 0 00-4.243 4.242zM21 12a9 9 0 11-18 0 9 9 0 0118 0z">
                                        </path>
                                    </svg>
                                    <span>Directory</span>
                                </a>
                                <a class="text-gray-600 hover:bg-gray-50 hover:text-gray-900 group flex items-center px-2 py-2 text-base font-medium rounded-md"
                                   href="#">
                                    <svg class="text-gray-400 group-hover:text-gray-500 mr-4 h-6 w-6"
                                         xmlns="http://www.w3.org/2000/svg"
                                         fill="none" viewbox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                              d="M11 5.882V19.24a1.76 1.76 0 01-3.417.592l-2.147-6.15M18 13a3 3 0 100-6M5.436 13.683A4.001 4.001 0 017 6h1.832c4.1 0 7.625-1.234 9.168-3v14c-1.543-1.766-5.067-3-9.168-3H7a3.988 3.988 0 01-1.564-.317z">
                                        </path>
                                    </svg>
                                    <span>Announcements</span>
                                </a>
                                <a class="text-gray-600 hover:bg-gray-50 hover:text-gray-900 group flex items-center px-2 py-2 text-base font-medium rounded-md"
                                   href="#">
                                    <svg class="text-gray-400 group-hover:text-gray-500 mr-4 h-6 w-6"
                                         xmlns="http://www.w3.org/2000/svg"
                                         fill="none" viewbox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                              d="M9 20l-5.447-2.724A1 1 0 013 16.382V5.618a1 1 0 011.447-.894L9 7m0 13l6-3m-6 3V7m6 10l4.553 2.276A1 1 0 0021 18.382V7.618a1 1 0 00-.553-.894L15 4m0 13V4m0 0L9 7">
                                        </path>
                                    </svg>
                                    <span>Office Map</span>
                                </a>
                            </div>
                        </nav>
                    </div>
                    <div class="flex-shrink-0 flex border-t border-gray-200 p-4">
                        <a class="flex-shrink-0 group block" href="#">
                            <div class="flex items-center">
                                <div>
                                    <img class="inline-block h-10 w-10 rounded-full"
                                         src="https://images.unsplash.com/photo-1517365830460-955ce3ccd263?ixlib=rb-=eyJhcHBfaWQiOjEyMDd9&amp;auto=format&amp;fit=facearea&amp;facepad=8&amp;w=256&amp;h=256&amp;q=80"
                                         alt="">
                                </div>
                                <div class="ml-3">
                                    <p class="text-base font-medium text-gray-700 group-hover:text-gray-900">Whitney
                                        Francis</p>
                                    <p class="text-sm font-medium text-gray-500 group-hover:text-gray-700">View
                                        profile</p>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="flex-shrink-0 w-14" aria-hidden="true"></div>
            </div>
        </div>

        <div class="hidden lg:flex lg:flex-shrink-0">
            <div class="flex flex-col w-64">
                <div class="flex flex-col h-0 flex-1 border-r border-gray-200 bg-gray-100">
                    <div class="flex-1 flex flex-col pt-5 pb-4 overflow-y-auto">
                        <div class="flex items-center flex-shrink-0 px-4">
                            <img class="h-8 w-auto"
                                 src="https://tailwindui.com/img/logos/workflow-logo-indigo-600-mark-gray-900-text.svg"
                                 alt="Workflow">
                        </div>
                        <nav class="mt-5 flex-1" aria-label="Sidebar">
                            <div class="px-2 space-y-1">
                                <a class="bg-gray-200 text-gray-900 group flex items-center px-2 py-2 text-sm font-medium rounded-md"
                                   href="#">
                                    <svg class="text-gray-500 mr-3 h-6 w-6" xmlns="http://www.w3.org/2000/svg"
                                         fill="none"
                                         viewbox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                              d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6">
                                        </path>
                                    </svg>
                                    <span>D??? ??n web</span>
                                </a>
                                <a class="text-gray-600 hover:bg-gray-50 hover:text-gray-900 group flex items-center px-2 py-2 text-sm font-medium rounded-md"
                                   href="#">
                                    <svg class="text-gray-400 group-hover:text-gray-500 mr-3 h-6 w-6"
                                         xmlns="http://www.w3.org/2000/svg"
                                         fill="none" viewbox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                              d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z">
                                        </path>
                                    </svg>
                                    <span>Calendar</span>
                                </a>
                                <a class="text-gray-600 hover:bg-gray-50 hover:text-gray-900 group flex items-center px-2 py-2 text-sm font-medium rounded-md"
                                   href="#">
                                    <svg class="text-gray-400 group-hover:text-gray-500 mr-3 h-6 w-6"
                                         xmlns="http://www.w3.org/2000/svg"
                                         fill="none" viewbox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                              d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z">
                                        </path>
                                    </svg>
                                    <span>Teams</span>
                                </a>
                                <a class="text-gray-600 hover:bg-gray-50 hover:text-gray-900 group flex items-center px-2 py-2 text-sm font-medium rounded-md"
                                   href="#">
                                    <svg class="text-gray-400 group-hover:text-gray-500 mr-3 h-6 w-6"
                                         xmlns="http://www.w3.org/2000/svg"
                                         fill="none" viewbox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                              d="M8 16l2.879-2.879m0 0a3 3 0 104.243-4.242 3 3 0 00-4.243 4.242zM21 12a9 9 0 11-18 0 9 9 0 0118 0z">
                                        </path>
                                    </svg>
                                    <span>Directory</span>
                                </a>
                                <a class="text-gray-600 hover:bg-gray-50 hover:text-gray-900 group flex items-center px-2 py-2 text-sm font-medium rounded-md"
                                   href="#">
                                    <svg class="text-gray-400 group-hover:text-gray-500 mr-3 h-6 w-6"
                                         xmlns="http://www.w3.org/2000/svg"
                                         fill="none" viewbox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                              d="M11 5.882V19.24a1.76 1.76 0 01-3.417.592l-2.147-6.15M18 13a3 3 0 100-6M5.436 13.683A4.001 4.001 0 017 6h1.832c4.1 0 7.625-1.234 9.168-3v14c-1.543-1.766-5.067-3-9.168-3H7a3.988 3.988 0 01-1.564-.317z">
                                        </path>
                                    </svg>
                                    <span>Announcements</span>
                                </a>
                                <a class="text-gray-600 hover:bg-gray-50 hover:text-gray-900 group flex items-center px-2 py-2 text-sm font-medium rounded-md"
                                   href="#">
                                    <svg class="text-gray-400 group-hover:text-gray-500 mr-3 h-6 w-6"
                                         xmlns="http://www.w3.org/2000/svg"
                                         fill="none" viewbox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                              d="M9 20l-5.447-2.724A1 1 0 013 16.382V5.618a1 1 0 011.447-.894L9 7m0 13l6-3m-6 3V7m6 10l4.553 2.276A1 1 0 0021 18.382V7.618a1 1 0 00-.553-.894L15 4m0 13V4m0 0L9 7">
                                        </path>
                                    </svg>
                                    <span>Office Map</span>
                                </a>
                            </div>
                        </nav>
                    </div>
                    <div class="flex-shrink-0 flex border-t border-gray-200 p-4">
                        <a class="flex-shrink-0 w-full group block" href="#">
                            <div class="flex items-center">
                                <div>
                                    <img class="inline-block h-9 w-9 rounded-full"
                                         src="https://images.unsplash.com/photo-1517365830460-955ce3ccd263?ixlib=rb-=eyJhcHBfaWQiOjEyMDd9&amp;auto=format&amp;fit=facearea&amp;facepad=8&amp;w=256&amp;h=256&amp;q=80"
                                         alt="">
                                </div>
                                <div class="ml-3">
                                    <p class="text-sm font-medium text-gray-700 group-hover:text-gray-900">Whitney
                                        Francis</p>
                                    <p class="text-xs font-medium text-gray-500 group-hover:text-gray-700">View
                                        profile</p>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <div class="flex flex-col min-w-0 flex-1 overflow-hidden">
            <div class="lg:hidden">
                <div class="flex items-center justify-between bg-gray-50 border-b border-gray-200 px-4 py-1.5">
                    <div>
                        <img class="h-8 w-auto" src="https://tailwindui.com/img/logos/workflow-mark-indigo-600.svg"
                             alt="Workflow">
                    </div>
                    <div>
                        <button
                                class="-mr-3 h-12 w-12 inline-flex items-center justify-center rounded-md text-gray-500 hover:text-gray-900"
                                type="button">
                            <span class="sr-only">Open sidebar</span>
                            <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewbox="0 0 24 24"
                                 stroke="currentColor" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                      d="M4 6h16M4 12h16M4 18h16">
                                </path>
                            </svg>
                        </button>
                    </div>
                </div>
            </div>
            <div class="flex-1 relative z-0 flex overflow-hidden">
                <main class="flex-1 relative z-0 overflow-y-auto focus:outline-none" tabindex="0">
                    <div class="absolute inset-0 py-6 px-4 sm:px-6 lg:px-8">

                        <section class="relative pb-5 border-b border-gray-200 space-y-4 sm:pb-0">
                            <div class="space-y-3 md:flex md:items-center md:justify-between md:space-y-0">
                                <h3 class="text-lg leading-6 font-medium text-gray-900">Candidates</h3>
                                <div class="flex space-x-3 md:absolute md:top-3 md:right-0">
                    <span class="shadow-sm rounded-md">
                      <button
                              class="inline-flex items-center px-4 py-2 border border-gray-300 text-sm leading-5 font-medium rounded-md text-gray-700 bg-white hover:text-gray-500 focus:outline-none focus:shadow-outline-blue focus:border-blue-300 active:text-gray-800 active:bg-gray-50 transition duration-150 ease-in-out"
                              type="button">Share</button>
                    </span>
                                    <span class="shadow-sm rounded-md">
                      <button
                              class="inline-flex items-center px-4 py-2 border border-transparent text-sm leading-5 font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-500 focus:outline-none focus:shadow-outline-indigo focus:border-indigo-700 active:bg-indigo-700 transition duration-150 ease-in-out"
                              type="button">Create</button>
                    </span>
                                </div>
                            </div>
                            <div>
                                <div class="sm:hidden">
                                    <select
                                            class="form-select block w-full pl-3 pr-10 py-2 text-base leading-6 border-gray-300 focus:outline-none focus:shadow-outline-blue focus:border-blue-300 sm:text-sm sm:leading-5 transition ease-in-out duration-150"
                                            aria-label="Selected tab">
                                        <option>Applied</option>
                                        <option>Phone Screening</option>
                                        <option selected>Interview</option>
                                        <option>Offer</option>
                                        <option>Hired</option>
                                    </select>
                                </div>
                                <div class="hidden sm:block">
                                    <nav class="-mb-px flex space-x-8"><a
                                                class="whitespace-no-wrap pb-4 px-1 border-b-2 border-transparent font-medium text-sm leading-5 text-gray-500 hover:text-gray-700 hover:border-gray-300 focus:outline-none focus:text-gray-700 focus:border-gray-300"
                                                href="#">Applied</a><a
                                                class="whitespace-no-wrap pb-4 px-1 border-b-2 border-transparent font-medium text-sm leading-5 text-gray-500 hover:text-gray-700 hover:border-gray-300 focus:outline-none focus:text-gray-700 focus:border-gray-300"
                                                href="#">Phone Screening</a><a
                                                class="whitespace-no-wrap pb-4 px-1 border-b-2 border-indigo-500 font-medium text-sm leading-5 text-indigo-600 focus:outline-none focus:text-indigo-800 focus:border-indigo-700"
                                                href="#" aria-current="page">Interview</a><a
                                                class="whitespace-no-wrap pb-4 px-1 border-b-2 border-transparent font-medium text-sm leading-5 text-gray-500 hover:text-gray-700 hover:border-gray-300 focus:outline-none focus:text-gray-700 focus:border-gray-300"
                                                href="#">Offer</a><a
                                                class="whitespace-no-wrap pb-4 px-1 border-b-2 border-transparent font-medium text-sm leading-5 text-gray-500 hover:text-gray-700 hover:border-gray-300 focus:outline-none focus:text-gray-700 focus:border-gray-300"
                                                href="#">Hired</a></nav>
                                </div>
                            </div>
                        </section>

                        <ul class="mt-5 grid grid-cols-1 gap-6 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4">
                            <li class="col-span-1 flex flex-col text-center bg-white ">
                                <div class="aspect-w-3 aspect-h-4">
                                    <img class="w-full bg-black object-center object-cover"
                                         src="https://images.unsplash.com/photo-1494790108377-be9c29b29330?ixlib=rb-1.2.1&amp;ixid=eyJhcHBfaWQiOjEyMDd9&amp;auto=format&amp;fit=facearea&amp;facepad=4&amp;w=256&amp;h=256&amp;q=60"
                                         alt="">
                                </div>
                                <ul class="flex overflow-hidden space-x-px mt-px">
                                    <?php for($i = 1; $i <= 10; $i++){?>
                                    <li class="">
                                        <div class="aspect-w-1 aspect-h-1 w-12">
                                            <img class="w-full bg-black "
                                                 src="https://images.unsplash.com/photo-1494790108377-be9c29b29330?ixlib=rb-1.2.1&amp;ixid=eyJhcHBfaWQiOjEyMDd9&amp;auto=format&amp;fit=facearea&amp;facepad=4&amp;w=256&amp;h=256&amp;q=60"
                                                 alt="">
                                        </div>
                                    </li>
                                    <?php }?>
                                </ul>
                                {{-- <div class="flex items-start">
                                     <div class="flex-shrink-0 inline-flex rounded-full border-2 border-white">
                                         <div class="aspect-w-1 aspect-h-1 w-8 ">
                                             <img class="w-full bg-black  rounded-full "
                                                  src="https://images.unsplash.com/photo-1494790108377-be9c29b29330?ixlib=rb-1.2.1&amp;ixid=eyJhcHBfaWQiOjEyMDd9&amp;auto=format&amp;fit=facearea&amp;facepad=4&amp;w=256&amp;h=256&amp;q=60"
                                                  alt="">
                                         </div>
                                     </div>
                                     <div class="ml-2">
                                         <b class="text-base font-semibold text-black">Judith Black</b>
                                     </div>
                                 </div>--}}
                                <div class="flex justify-between">
                                    <figure class="flex items-center mt-3">
                                        <div class="w-8 flex-shrink-0 ">
                                            <div class="aspect-w-1 aspect-h-1 bg-gray-300 rounded-full overflow-hidden">
                                                <img alt="" src="https://picsum.photos/300"
                                                     class="w-full object-center object-cover"/>
                                            </div>
                                        </div>
                                        <figcaption class="ml-2 font-semibold">Tien Nguyen</figcaption>
                                    </figure>

                                </div>

                            </li>
                            <li class="col-span-1 flex flex-col text-center bg-white rounded-lg shadow">
                                <div class="flex-1 flex flex-col p-8">
                                    <img class="w-32 h-32 flex-shrink-0 mx-auto bg-black rounded-full"
                                         src="https://images.unsplash.com/photo-1494790108377-be9c29b29330?ixlib=rb-1.2.1&amp;ixid=eyJhcHBfaWQiOjEyMDd9&amp;auto=format&amp;fit=facearea&amp;facepad=4&amp;w=256&amp;h=256&amp;q=60"
                                         alt="">
                                    <h3 class="mt-6 text-gray-900 text-sm leading-5 font-medium">Jane Cooper</h3>
                                    <dl class="mt-1 flex-grow flex flex-col justify-between">
                                        <dt class="sr-only">Title</dt>
                                        <dd class="text-gray-500 text-sm leading-5">Paradigm Representative</dd>
                                        <dt class="sr-only">Role</dt>
                                        <dd class="mt-3">
                        <span
                                class="px-2 py-1 text-teal-800 text-xs leading-4 font-medium bg-teal-100 rounded-full">Admin</span>
                                        </dd>
                                    </dl>
                                </div>
                                <div class="border-t border-gray-200">
                                    <div class="-mt-px flex">
                                        <div class="w-0 flex-1 flex border-r border-gray-200">
                                            <a class="relative -mr-px w-0 flex-1 inline-flex items-center justify-center py-4 text-sm leading-5 text-gray-700 font-medium border border-transparent rounded-bl-lg hover:text-gray-500 focus:outline-none focus:shadow-outline-blue focus:border-blue-300 focus:z-10 transition ease-in-out duration-150"
                                               href="#">
                                                <svg class="w-5 h-5 text-gray-400" viewbox="0 0 20 20"
                                                     fill="currentColor">
                                                    <path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z"></path>
                                                    <path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z"></path>
                                                </svg>
                                                <span class="ml-3">Email</span>
                                            </a>
                                        </div>
                                        <div class="-ml-px w-0 flex-1 flex">
                                            <a class="relative w-0 flex-1 inline-flex items-center justify-center py-4 text-sm leading-5 text-gray-700 font-medium border border-transparent rounded-br-lg hover:text-gray-500 focus:outline-none focus:shadow-outline-blue focus:border-blue-300 focus:z-10 transition ease-in-out duration-150"
                                               href="#">
                                                <svg class="w-5 h-5 text-gray-400" viewbox="0 0 20 20"
                                                     fill="currentColor">
                                                    <path
                                                            d="M2 3a1 1 0 011-1h2.153a1 1 0 01.986.836l.74 4.435a1 1 0 01-.54 1.06l-1.548.773a11.037 11.037 0 006.105 6.105l.774-1.548a1 1 0 011.059-.54l4.435.74a1 1 0 01.836.986V17a1 1 0 01-1 1h-2C7.82 18 2 12.18 2 5V3z">
                                                    </path>
                                                </svg>
                                                <span class="ml-3">Call</span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </li>


                        </ul>
                    </div>
                </main>
                <aside class="hidden relative xl:flex xl:flex-col flex-shrink-0 w-96 border-l border-gray-200">

                    <div class="flex-1 h-0 overflow-y-auto">
                        <header class="space-y-1 py-6 px-4 bg-indigo-700 sm:px-6">
                            <div class="flex items-center justify-between space-x-3">
                                <h2 class="text-lg leading-7 font-medium text-white">New Project</h2>
                                <div class="h-7 flex items-center">
                                    <button class="text-indigo-200 hover:text-white transition ease-in-out duration-150"
                                            aria-label="Close panel">
                                        <svg class="h-6 w-6" fill="none" viewbox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                  d="M6 18L18 6M6 6l12 12">
                                            </path>
                                        </svg>
                                    </button>
                                </div>
                            </div>
                            <div>
                                <p class="text-sm leading-5 text-indigo-300">Get started by filling in the information
                                    below to create your new project.</p>
                            </div>
                        </header>
                        <div class="flex-1 flex flex-col justify-between">
                            <div class="px-4 divide-y divide-gray-200 sm:px-6">
                                <div class="space-y-6 pt-6 pb-5">
                                    <div class="space-y-1">
                                        <label class="block text-sm font-medium leading-5 text-gray-900"
                                               for="project_name">Project
                                            name</label>
                                        <div class="mt-1">
                                            <input
                                                    class="block w-full shadow-sm sm:text-sm focus:ring-indigo-500 focus:border-indigo-500 border-gray-300 rounded-md"
                                                    id="project_name" type="text" name="project_name">
                                        </div>
                                    </div>
                                    <div class="space-y-1">
                                        <label class="block text-sm font-medium leading-5 text-gray-900"
                                               for="description">Description</label>
                                        <div class="mt-1"><textarea
                                                    class="block w-full shadow-sm sm:text-sm focus:ring-indigo-500 focus:border-indigo-500 border-gray-300 rounded-md"
                                                    id="description" name="description" rows="4"></textarea></div>
                                    </div>
                                    <div class="space-y-2">
                                        <h3 class="text-sm font-medium leading-5 text-gray-900">Team Members</h3>
                                        <div>
                                            <div class="flex space-x-2">
                                                <a href="#">
                                                    <img class="inline-block h-8 w-8 rounded-full"
                                                         src="https://images.unsplash.com/photo-1491528323818-fdd1faba62cc?ixlib=rb-1.2.1&amp;ixid=eyJhcHBfaWQiOjEyMDd9&amp;auto=format&amp;fit=facearea&amp;facepad=2&amp;w=256&amp;h=256&amp;q=80"
                                                         alt="Tom Warner">
                                                </a>
                                                <a href="#">
                                                    <img class="inline-block h-8 w-8 rounded-full"
                                                         src="https://images.unsplash.com/photo-1550525811-e5869dd03032?ixlib=rb-1.2.1&amp;auto=format&amp;fit=facearea&amp;facepad=2&amp;w=256&amp;h=256&amp;q=80"
                                                         alt="Sally Preston">
                                                </a>
                                                <a href="#">
                                                    <img class="inline-block h-8 w-8 rounded-full"
                                                         src="https://images.unsplash.com/photo-1500648767791-00dcc994a43e?ixlib=rb-1.2.1&amp;ixid=eyJhcHBfaWQiOjEyMDd9&amp;auto=format&amp;fit=facearea&amp;facepad=2.25&amp;w=256&amp;h=256&amp;q=80"
                                                         alt="Dave Gusman">
                                                </a>
                                                <a href="#">
                                                    <img class="inline-block h-8 w-8 rounded-full"
                                                         src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&amp;ixid=eyJhcHBfaWQiOjEyMDd9&amp;auto=format&amp;fit=facearea&amp;facepad=2&amp;w=256&amp;h=256&amp;q=80"
                                                         alt="Tom Cook">
                                                </a>
                                                <a href="#">
                                                    <img class="inline-block h-8 w-8 rounded-full"
                                                         src="https://images.unsplash.com/photo-1586297098710-0382a496c814?ixlib=rb-1.2.1&amp;ixid=eyJhcHBfaWQiOjEyMDd9&amp;auto=format&amp;fit=facearea&amp;facepad=2.5&amp;w=256&amp;h=256&amp;q=80"
                                                         alt="Brandon Rogers">
                                                </a>
                                                <button
                                                        class="inline-flex h-8 w-8 items-center justify-center rounded-full border-2 border-dashed border-gray-200 text-gray-400 hover:text-gray-500 transition ease-in-out duration-150"
                                                        type="button" aria-label="Add team member">
                                                    <svg class="h-5 w-5" viewbox="0 0 20 20" fill="currentColor">
                                                        <path fill-rule="evenodd"
                                                              d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z"
                                                              clip-rule="evenodd"></path>
                                                    </svg>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                    <fieldset class="space-y-2">
                                        <legend class="text-sm leading-5 font-medium text-gray-900">Privacy</legend>
                                        <div class="space-y-5">
                                            <div class="relative flex items-start">
                                                <div class="absolute flex items-center h-5">
                                                    <input class="form-radio h-4 w-4 text-indigo-600 transition duration-150 ease-in-out"
                                                           id="privacy_public"
                                                           aria-describedby="privacy_public_description" type="radio"
                                                           name="privacy">
                                                </div>
                                                <div class="pl-7 text-sm leading-5">
                                                    <label class="font-medium text-gray-900" for="privacy_public">Public
                                                        access</label>
                                                    <p class="text-gray-500" id="privacy_public_description">Everyone
                                                        with the link
                                                        will see this project.</p>
                                                </div>
                                            </div>
                                            <div>
                                                <div class="relative flex items-start">
                                                    <div class="absolute flex items-center h-5">
                                                        <input class="form-radio h-4 w-4 text-indigo-600 transition duration-150 ease-in-out"
                                                               id="privacy_private-to-project"
                                                               aria-describedby="privacy_private-to-project_description"
                                                               type="radio" name="privacy">
                                                    </div>
                                                    <div class="pl-7 text-sm leading-5">
                                                        <label class="font-medium text-gray-900"
                                                               for="privacy_private-to-project">Private to
                                                            project members</label>
                                                        <p class="text-gray-500"
                                                           id="privacy_private-to-project_description">Only
                                                            members of this project would be able to access.</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div>
                                                <div class="relative flex items-start">
                                                    <div class="absolute flex items-center h-5">
                                                        <input class="form-radio h-4 w-4 text-indigo-600 transition duration-150 ease-in-out"
                                                               id="privacy_private"
                                                               aria-describedby="privacy_private-to-project_description"
                                                               type="radio" name="privacy">
                                                    </div>
                                                    <div class="pl-7 text-sm leading-5">
                                                        <label class="font-medium text-gray-900" for="privacy_private">Private
                                                            to
                                                            you</label>
                                                        <p class="text-gray-500" id="privacy_private_description">You
                                                            are the only one
                                                            able to access this project.</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </fieldset>
                                </div>
                                <div class="space-y-4 pt-4 pb-6">
                                    <div class="flex text-sm leading-5">
                                        <a class="group space-x-2 inline-flex items-center font-medium text-indigo-600 hover:text-indigo-500 transition ease-in-out duration-150"
                                           href="#">
                                            <svg
                                                    class="h-5 w-5 text-indigo-500 group-hover:text-indigo-400 transition ease-in-out duration-150"
                                                    viewbox="0 0 20 20" fill="currentColor">
                                                <path fill-rule="evenodd"
                                                      d="M12.586 4.586a2 2 0 112.828 2.828l-3 3a2 2 0 01-2.828 0 1 1 0 00-1.414 1.414 4 4 0 005.656 0l3-3a4 4 0 00-5.656-5.656l-1.5 1.5a1 1 0 101.414 1.414l1.5-1.5zm-5 5a2 2 0 012.828 0 1 1 0 101.414-1.414 4 4 0 00-5.656 0l-3 3a4 4 0 105.656 5.656l1.5-1.5a1 1 0 10-1.414-1.414l-1.5 1.5a2 2 0 11-2.828-2.828l3-3z"
                                                      clip-rule="evenodd"></path>
                                            </svg>
                                            <span>Copy link</span>
                                        </a>
                                    </div>
                                    <div class="flex text-sm leading-5">
                                        <a class="group space-x-2 inline-flex items-center text-gray-500 hover:text-gray-900 transition ease-in-out duration-150"
                                           href="#">
                                            <svg class="h-5 w-5 text-gray-400 group-hover:text-gray-500 transition ease-in-out duration-150"
                                                 viewbox="0 0 20 20" fill="currentColor">
                                                <path fill-rule="evenodd"
                                                      d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-8-3a1 1 0 00-.867.5 1 1 0 11-1.731-1A3 3 0 0113 8a3.001 3.001 0 01-2 2.83V11a1 1 0 11-2 0v-1a1 1 0 011-1 1 1 0 100-2zm0 8a1 1 0 100-2 1 1 0 000 2z"
                                                      clip-rule="evenodd"></path>
                                            </svg>
                                            <span>Learn more about sharing</span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="flex-shrink-0 px-4 py-4 space-x-4 flex justify-end">
              <span class="inline-flex rounded-md shadow-sm">
                <button
                        class="py-2 px-4 border border-gray-300 rounded-md text-sm leading-5 font-medium text-gray-700 hover:text-gray-500 focus:outline-none focus:border-blue-300 focus:shadow-outline-blue active:bg-gray-50 active:text-gray-800 transition duration-150 ease-in-out"
                        type="button">Cancel</button>
              </span>
                        <span class="inline-flex rounded-md shadow-sm">
                <button
                        class="inline-flex justify-center py-2 px-4 border border-transparent text-sm leading-5 font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-500 focus:outline-none focus:border-indigo-700 focus:shadow-outline-indigo active:bg-indigo-700 transition duration-150 ease-in-out"
                        type="submit">Save</button>
              </span>
                    </div>

                </aside>
            </div>
        </div>

    </div>
</div>
</body>

</html>
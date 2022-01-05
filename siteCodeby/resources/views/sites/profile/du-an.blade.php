@extends($config->layout.'/master')

@section('main')
    <main class="flex-1 relative z-0 overflow-y-auto focus:outline-none xl:order-last">
        <!-- Breadcrumb -->
        {{-- <nav class="flex items-start px-4 py-3 sm:px-6 lg:px-8 xl:hidden" aria-label="Breadcrumb">
             <a href="#" class="inline-flex items-center space-x-3 text-sm font-medium text-gray-900">
                 <!-- Heroicon name: solid/chevron-left -->
                 <svg class="-ml-2 h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                     <path fill-rule="evenodd" d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z" clip-rule="evenodd" />
                 </svg>
                 <span>Directory</span>
             </a>
         </nav>--}}

        <article>
        @include($config->view.'/components/profile-header')

        <!-- grid -->
            <div class="grid grid-cols-12 gap-4 ">
                <div class="col-span-3 space-y-8 p-3 sticky top-0">
                    <div>
                        <h2 class="text-sm font-medium text-gray-500">Tags</h2>
                        <ul role="list" class="mt-2 leading-8">
                            <?php for($i = 1; $i <= 2; $i++){?>
                            <li class="inline">
                                <a href="#"
                                   class="relative inline-flex items-center rounded-full border border-gray-300 px-3 py-0.5">
                                    <div class="absolute flex-shrink-0 flex items-center justify-center">
                                        <span class="h-1.5 w-1.5 rounded-full bg-rose-500" aria-hidden="true"></span>
                                    </div>
                                    <div class="ml-3.5 text-sm font-medium text-gray-900">Bug</div>
                                </a>
                                <!-- space -->
                            </li>
                            <li class="inline">
                                <a href="#"
                                   class="relative inline-flex items-center rounded-full border border-gray-300 px-3 py-0.5">
                                    <div class="absolute flex-shrink-0 flex items-center justify-center">
                                        <span class="h-1.5 w-1.5 rounded-full bg-indigo-500" aria-hidden="true"></span>
                                    </div>
                                    <div class="ml-3.5 text-sm font-medium text-gray-900">Accessibility</div>
                                </a>
                                <!-- space -->
                            </li>
                            <?php }?>
                        </ul>
                    </div>
                    <!-- This example requires Tailwind CSS v2.0+ -->
                    <div>
                        <ul role="list" class="divide-y divide-gray-200">
                            <li class="py-4">
                                <div class="flex space-x-3">
                                    <img class="h-6 w-6 rounded-full" src="https://images.unsplash.com/photo-1517841905240-472988babdf9?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=3&w=256&h=256&q=80" alt="">
                                    <div class="flex-1 space-y-1">
                                        <div class="flex items-center justify-between">
                                            <h3 class="text-sm font-medium">Lindsay Walton</h3>
                                            <p class="text-sm text-gray-500">1h</p>
                                        </div>
                                        <p class="text-sm text-gray-500">Deployed Workcation (2d89f0c8 in master) to production</p>
                                    </div>
                                </div>
                            </li>

                            <!-- More items... -->
                        </ul>
                    </div>

                </div>

                <div class="col-span-9 space-y-6 py-4 px-2">
                    <?php for($i = 1; $i <= 10; $i++){?>
                    <section aria-labelledby="applicant-information-title">
                        <div class="bg-white shadow sm:rounded">
                            <div class="px-4 py-5 sm:px-6 space-y-2">
                                <h2 id="applicant-information-title"
                                    class="text-lg leading-6 font-medium text-gray-900">
                                    <?php for($i = 1; $i <= 10; $i++){?>
                                    Applicant Information
                                    <?php }?>

                                </h2>
                                <ul class="flex space-x-4 text-gray-400">
                                    <li class="">
                                        <div class="flex items-center space-x-2">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 " fill="none"
                                                 viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                      d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"/>
                                            </svg>
                                            <span class=" text-sm ">4 người tham gia</span>
                                        </div>
                                    </li>
                                    <li class="">
                                        <div class="flex items-center space-x-2">
                                            <svg class="h-5 w-5 " x-description="Heroicon name: solid/chat-alt"
                                                 xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                                 fill="currentColor" aria-hidden="true">
                                                <path fill-rule="evenodd"
                                                      d="M18 5v8a2 2 0 01-2 2h-5l-5 4v-4H4a2 2 0 01-2-2V5a2 2 0 012-2h12a2 2 0 012 2zM7 8H5v2h2V8zm2 0h2v2H9V8zm6 0h-2v2h2V8z"
                                                      clip-rule="evenodd"></path>
                                            </svg>
                                            <span class="text-sm ">4 bình luận</span>
                                        </div>
                                    </li>
                                    <li class="">
                                        <div class="flex items-center space-x-2">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 " fill="none"
                                                 viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                      d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                            </svg>
                                            <span class=" text-sm ">4 giờ trước</span>
                                        </div>
                                    </li>
                                </ul>
                                <p class=" max-w-2xl text-sm text-gray-900">
                                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. A earum excepturi illo
                                    impedit magnam nobis optio repellat sequi soluta temporibus vel, voluptatem
                                    voluptates! Aperiam at enim ipsam molestias provident, quaerat?
                                </p>

                                <!-- grid -->
                                <div class="grid grid-cols-12 gap-4">
                                    <div class="col-span-12">
                                        <img class="rounded" src="{{$config->static}}/assets/images/3.png" alt="">
                                    </div>
                                    <div class="col-span-6"></div>
                                </div>
                            </div>
                            <div class="border-t border-gray-200 px-4 py-5 sm:px-6">
                                <dl class="grid grid-cols-1 gap-x-4 gap-y-8 sm:grid-cols-2">
                                    {{--<div class="sm:col-span-1">
                                        <dt class="text-sm font-medium text-gray-500">
                                            Application for
                                        </dt>
                                        <dd class="mt-1 text-sm text-gray-900">
                                            Backend Developer
                                        </dd>
                                    </div>
                                    <div class="sm:col-span-1">
                                        <dt class="text-sm font-medium text-gray-500">
                                            Email address
                                        </dt>
                                        <dd class="mt-1 text-sm text-gray-900">
                                            ricardocooper@example.com
                                        </dd>
                                    </div>
                                    <div class="sm:col-span-1">
                                        <dt class="text-sm font-medium text-gray-500">
                                            Salary expectation
                                        </dt>
                                        <dd class="mt-1 text-sm text-gray-900">
                                            $120,000
                                        </dd>
                                    </div>
                                    <div class="sm:col-span-1">
                                        <dt class="text-sm font-medium text-gray-500">
                                            Phone
                                        </dt>
                                        <dd class="mt-1 text-sm text-gray-900">
                                            +1 555-555-5555
                                        </dd>
                                    </div>
                                    <div class="sm:col-span-2">
                                        <dt class="text-sm font-medium text-gray-500">
                                            About
                                        </dt>
                                        <dd class="mt-1 text-sm text-gray-900">
                                            Fugiat ipsum ipsum deserunt culpa aute sint do nostrud anim incididunt
                                            cillum culpa consequat. Excepteur qui ipsum aliquip consequat sint. Sit id
                                            mollit nulla mollit nostrud in ea officia proident. Irure nostrud pariatur
                                            mollit ad adipisicing reprehenderit deserunt qui eu.
                                        </dd>
                                    </div>--}}
                                    <div class="sm:col-span-2">
                                        <dt class="text-sm font-medium text-gray-500">
                                            Bài viết liên quan
                                        </dt>
                                        <dd class="mt-1 text-sm text-gray-900">
                                            <ul role="list"
                                                class="border border-gray-200 rounded-md divide-y divide-gray-200">

                                                <li class="pl-3 pr-4 py-3 flex items-center justify-between text-sm">
                                                    <div class="w-0 flex-1 flex items-center">
                                                        <svg class="flex-shrink-0 h-5 w-5 text-gray-400"
                                                             x-description="Heroicon name: solid/paper-clip"
                                                             xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                                             fill="currentColor" aria-hidden="true">
                                                            <path fill-rule="evenodd"
                                                                  d="M8 4a3 3 0 00-3 3v4a5 5 0 0010 0V7a1 1 0 112 0v4a7 7 0 11-14 0V7a5 5 0 0110 0v4a3 3 0 11-6 0V7a1 1 0 012 0v4a1 1 0 102 0V7a3 3 0 00-3-3z"
                                                                  clip-rule="evenodd"></path>
                                                        </svg>
                                                        <span class="ml-2 flex-1 w-0 truncate">
                                resume_front_end_developer.pdf
                              </span>
                                                    </div>
                                                    <div class="ml-4 flex-shrink-0">
                                                        <a href="#"
                                                           class="font-medium text-blue-600 hover:text-blue-500">
                                                            Download
                                                        </a>
                                                    </div>
                                                </li>

                                                <li class="pl-3 pr-4 py-3 flex items-center justify-between text-sm">
                                                    <div class="w-0 flex-1 flex items-center">
                                                        <svg class="flex-shrink-0 h-5 w-5 text-gray-400"
                                                             x-description="Heroicon name: solid/paper-clip"
                                                             xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                                             fill="currentColor" aria-hidden="true">
                                                            <path fill-rule="evenodd"
                                                                  d="M8 4a3 3 0 00-3 3v4a5 5 0 0010 0V7a1 1 0 112 0v4a7 7 0 11-14 0V7a5 5 0 0110 0v4a3 3 0 11-6 0V7a1 1 0 012 0v4a1 1 0 102 0V7a3 3 0 00-3-3z"
                                                                  clip-rule="evenodd"></path>
                                                        </svg>
                                                        <span class="ml-2 flex-1 w-0 truncate">
                                coverletter_front_end_developer.pdf
                              </span>
                                                    </div>
                                                    <div class="ml-4 flex-shrink-0">
                                                        <a href="#"
                                                           class="font-medium text-blue-600 hover:text-blue-500">
                                                            Download
                                                        </a>
                                                    </div>
                                                </li>

                                            </ul>
                                        </dd>
                                    </div>
                                </dl>
                            </div>
                            <div>
                                <a href="#"
                                   class="block bg-gray-50 text-sm font-medium text-gray-500 text-center px-4 py-4 hover:text-gray-700 sm:rounded-b">Read
                                    full application</a>
                            </div>
                        </div>
                    </section>
                    <?php }?>

                </div>

            </div>
        </article>
    </main>
@endsection
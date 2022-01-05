<!-- Profile header -->
<div>
    <div>
        <img class="h-32 w-full object-cover lg:h-48"
             src="https://images.unsplash.com/photo-1444628838545-ac4016a5418a?ixid=MXwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=1950&q=80"
             alt="">
    </div>
    <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="-mt-12 sm:-mt-16 sm:flex sm:items-end sm:space-x-5">
            <div class="flex">
                <img class="h-24 w-24 rounded-full ring-4 ring-white sm:h-32 sm:w-32"
                     src="{{$config->static}}/assets/images/1.png"
                     alt="">
            </div>
            <div class="mt-6 sm:flex-1 sm:min-w-0 sm:flex sm:items-center sm:justify-end sm:space-x-6 sm:pb-1">
                <div class="sm:hidden 2xl:block mt-6 min-w-0 flex-1">
                    <h1 class="text-2xl font-bold text-gray-900 truncate">
                        Tien Nguyen
                    </h1>
                </div>
                <div class="mt-6 flex flex-col justify-stretch space-y-3 sm:flex-row sm:space-y-0 sm:space-x-4">
                    <button type="button"
                            class="inline-flex justify-center px-4 py-2 border border-gray-300 shadow-sm text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-pink-500">
                        <!-- Heroicon name: solid/mail -->
                        <svg class="-ml-1 mr-2 h-5 w-5 text-gray-400"
                             xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                             fill="currentColor" aria-hidden="true">
                            <path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z"/>
                            <path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z"/>
                        </svg>
                        <span>Message</span>
                    </button>
                    <button type="button"
                            class="inline-flex justify-center px-4 py-2 border border-gray-300 shadow-sm text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-pink-500">
                        <!-- Heroicon name: solid/phone -->
                        <svg class="-ml-1 mr-2 h-5 w-5 text-gray-400"
                             xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                             fill="currentColor" aria-hidden="true">
                            <path d="M2 3a1 1 0 011-1h2.153a1 1 0 01.986.836l.74 4.435a1 1 0 01-.54 1.06l-1.548.773a11.037 11.037 0 006.105 6.105l.774-1.548a1 1 0 011.059-.54l4.435.74a1 1 0 01.836.986V17a1 1 0 01-1 1h-2C7.82 18 2 12.18 2 5V3z"/>
                        </svg>
                        <span>Call</span>
                    </button>
                </div>
            </div>
        </div>
        <div class="hidden sm:block 2xl:hidden mt-6 min-w-0 flex-1">
            <h1 class="text-2xl font-bold text-gray-900 truncate">
                Tien Nguyen
            </h1>
        </div>
    </div>
</div>

<!-- Tabs -->
<div class="mt-6 sm:mt-2 2xl:mt-5">
    <div class="border-b border-gray-200">
        <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">
            {{--<nav class="-mb-px flex space-x-8" aria-label="Tabs">
                <!-- Current: "border-pink-500 text-gray-900", Default: "border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300" -->
                <a href="{{$config->base_url}}/"
                   class="border-pink-500 text-gray-900 whitespace-nowrap py-4 px-1 border-b-2 font-medium text-sm"
                   aria-current="page">
                    Thông tin
                </a>

                <a href="{{$config->base_url}}/du-an"
                   class="border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300 whitespace-nowrap py-4 px-1 border-b-2 font-medium text-sm">
                    Dự án
                </a>

                <a href="#"
                   class="border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300 whitespace-nowrap py-4 px-1 border-b-2 font-medium text-sm">
                    Recognition
                </a>
            </nav>--}}
            @php
                function isCurrent($link){
                    $link = rtrim($link, "/");
                    $link = preg_replace("#\/#mis", "\\/", $link);
                    $currentURL = Request::url();
                    if(preg_match("#$link$#mis", $currentURL)){
                        return true;
                    }
                }
                $tabs = [
                    ['link'=> '/',
                    'name'=>'Thông tin',
                    'count'=>0
                    ],
                    ['link'=> '/du-an',
                    'name'=>'Dự án',
                    'count'=>10
                    ],
                    [
                    'link'=> '/',
                    'name'=>'Bài viết',
                    'count'=>0
                    ],
                ]
            @endphp
            <nav class="-mb-px flex space-x-8" aria-label="Tabs">
                @foreach($tabs as $key => $item)
                    @php
                        $link = $config->base_url.$item['link'];
                    @endphp
                    <a href="{{$link}}"
                       class="{{!isCurrent($link)? 'border-transparent text-gray-500':'border-purple-500 text-purple-600'}} whitespace-nowrap py-4 px-1 border-b-2 font-medium text-sm"
                    >
                        {{$item['name']}}
                        @if(@$item['count'])
                            <span class="bg-purple-100 text-purple-600 hidden ml-2 py-0.5 px-2.5 rounded-full text-xs font-medium md:inline-block">{{$item['count']}}</span>
                        @endif
                    </a>

                @endforeach


            </nav>
        </div>
    </div>
</div>

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
                <div class="relative max-w-md mx-auto py-12 px-4 space-y-6 sm:max-w-3xl sm:py-16 sm:px-6 lg:max-w-none lg:px-0 lg:py-6 lg:col-start-4 lg:col-span-6">
                    <h2 class="text-3xl font-extrabold text-white" id="join-heading">{{$home2['name']}}</h2>
                    <ul class="text-white space-y-3" x-data="{selected:null}">
                        @foreach($homeSub2 as $key => $item)
                            <li class="space-y-3">
                                <button type="button"
                                        class="text-left w-full inline-flex items-center px-4 py-2 border border-gray-300 shadow-sm text-base rounded-md text-white bg-transparent focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                                        @click="selected !== {{$key}} ? selected = {{$key}} : selected = null">
                                    <svg x-show="selected!={{$key}}" class="-ml-1 mr-2 h-5 w-5"
                                         xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                         fill="currentColor">
                                        <path fill-rule="evenodd"
                                              d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z"
                                              clip-rule="evenodd"/>
                                    </svg>
                                    <svg x-show="selected=={{$key}}" class="-ml-1 mr-2 h-5 w-5"
                                         xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                         fill="currentColor">
                                        <path fill-rule="evenodd"
                                              d="M3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z"
                                              clip-rule="evenodd"/>
                                    </svg>
                                    {{$item['name']}}
                                </button>
                                <p
                                        class="overflow-hidden max-h-0 transition-all duration-700"
                                        x-ref="container{{$key}}"
                                        x-bind:style="selected == {{$key}} ? 'max-height: ' + $refs.container{{$key}}.scrollHeight + 'px' : ''"
                                >{{$item['content']}}</p>
                            </li>
                        @endforeach
                    </ul>
                    <a class="block w-full py-3 px-5 text-center bg-white border border-transparent rounded-md shadow-md text-base font-medium text-indigo-700 hover:bg-gray-50 sm:inline-block sm:w-auto"
                       href="{{$config->base_url}}{{@$home2['more']['button']['link']}}">{{@$home2['more']['button']['name']}}</a>
                </div>
            </div>
        </div>
    </div>
</section>
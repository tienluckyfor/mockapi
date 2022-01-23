@php
    use App\Services\BaseService;

@endphp
<a href="{{$config->base_url}}/web-mau?{{BaseService::url($item['title'])}}&id={{$item['id']}}"
   class="relative block bg-white rounded-lg overflow-hidden p-1 hover:shadow-lg"
   x-data="{ show: false }" @mouseover="show = true" @mouseleave="show = false"
>
    <div class="w-full aspect-w-1 aspect-h-1 rounded-lg overflow-hidden sm:aspect-w-2 sm:aspect-h-3 relative">
        <div x-show="show"
             x-transition:enter="transition ease-out duration-200"
             x-transition:enter-start="opacity-0 -translate-y-1"
             x-transition:enter-end="opacity-100 translate-y-0"
             x-transition:leave="transition ease-in duration-150"
             x-transition:leave-start="opacity-100 translate-y-0"
             x-transition:leave-end="opacity-0 -translate-y-1"
             class="absolute inset-0 bg-black/50 z-10 ">
            <div class="absolute absolute-x absolute-y space-y-3 text-center">
                <button type="button"
                        class="uppercase inline-flex items-center w-36 justify-center py-2 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-blue-400 hover:bg-blue-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                    <svg xmlns="http://www.w3.org/2000/svg" class="-ml-1 mr-2 h-5 w-5"
                         fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round"
                              stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                        <path stroke-linecap="round" stroke-linejoin="round"
                              stroke-width="2"
                              d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                    </svg>
                    Xem thử
                </button>
                <button type="button"
                        class="uppercase inline-flex items-center w-36 justify-center py-2 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-yellow-500 hover:bg-yellow-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                    <svg xmlns="http://www.w3.org/2000/svg" class="-ml-1 mr-2 h-5 w-5"
                         fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M12 4v16m8-8H4"/>
                    </svg>
                    Xem chi tiết
                </button>
            </div>
        </div>

        <img src="{{$media->set($item['image'])->first()}}"
             alt="{{$item['title']}}"
             class="w-full h-full object-center object-cover"/>
    </div>
    <div class="my-3 text-center ">
        <h3 class="text-gray-900 text-base text-lg ">
            {{$item['title']}}
        </h3>
        @include($config->view.'/components/price', ['item'=>$item])
    </div>
</a>
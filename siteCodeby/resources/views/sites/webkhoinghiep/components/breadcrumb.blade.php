<nav class="flex mt-4" aria-label="Breadcrumb">
    <ol role="list" class="flex items-center space-x-4">
        <li>
            <div>
                <a href="{{$config->base_url}}/" class="text-gray-400 hover:text-gray-500">
                    <!-- Heroicon name: solid/home -->
                    <svg class="flex-shrink-0 h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                        <path d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z" />
                    </svg>
                    <span class="sr-only">Home</span>
                </a>
            </div>
        </li>
        <li>
            <div class="flex items-center">
                <svg class="flex-shrink-0 h-5 w-5 text-gray-300" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20" aria-hidden="true">
                    <path d="M5.555 17.776l8-16 .894.448-8 16-.894-.448z" />
                </svg>
                @if(isset($chitiet['tag']))
                    @foreach($chitiet['tag'] as $key => $item)
                        <a href="{{$config->base_url}}/web/?n={{$item}}"
                           class="ml-4 text-sm font-medium text-gray-500 hover:text-gray-700">{{$item}}</a>
                    @endforeach
                @endif
                @if(isset($links))
                        <a href="{{$config->base_url}}/{{$links[0]}}"
                           class="ml-4 text-sm font-medium text-gray-500 hover:text-gray-700">{{$links[1]}}</a>
                @endif
            </div>
        </li>
    </ol>
</nav>
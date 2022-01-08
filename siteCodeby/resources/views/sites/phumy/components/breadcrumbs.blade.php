@php
    if(empty($breadcrumbs))
        return;
@endphp
{{-- san-pham-1 --}}
<section class="mt-5 ">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-3">
        <!-- This example requires Tailwind CSS v2.0+ -->
        <nav class="flex" aria-label="Breadcrumb">
            <ol role="list" class="flex items-center space-x-4">
                @foreach($breadcrumbs as $key => $item)
                <li>
                    <div class="flex items-center">
                        @if($key)
                            <svg class="flex-shrink-0 h-5 w-5 text-gray-300" xmlns="http://www.w3.org/2000/svg"
                                 fill="currentColor" viewBox="0 0 20 20" aria-hidden="true">
                                <path d="M5.555 17.776l8-16 .894.448-8 16-.894-.448z"/>
                            </svg>
                        @endif
                        <a href="{{$config->base_url}}{{$item[0]}}"
                           class="{{$key ? 'ml-4': ''}} text-sm font-medium text-gray-500 hover:text-gray-700">{{$item[1]}}</a>
                    </div>
                </li>
                @endforeach

                {{--<li>
                    <div class="flex items-center">
                        <a href="{{$config->base_url}}/"
                           class="text-sm font-medium text-gray-500 hover:text-gray-700">Trang chủ</a>
                    </div>
                </li>
                <li>
                    <div class="flex items-center">
                        <svg class="flex-shrink-0 h-5 w-5 text-gray-300" xmlns="http://www.w3.org/2000/svg"
                             fill="currentColor" viewBox="0 0 20 20" aria-hidden="true">
                            <path d="M5.555 17.776l8-16 .894.448-8 16-.894-.448z"/>
                        </svg>
                        <a href="{{$config->base_url}}/san-pham"
                           class="ml-4 text-sm font-medium text-gray-500 hover:text-gray-700"
                           aria-current="page">Sản phẩm</a>
                    </div>
                </li>--}}
            </ol>
        </nav>
    </div>
</section>

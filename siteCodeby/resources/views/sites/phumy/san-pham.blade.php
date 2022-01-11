@extends($config->layout.'/sanpham')

@php
    $sanpham = $http->get('/san-pham')->data();
@endphp
@section('list')
    <ul x-ref="list" class="space-y-4 relative" x-data="{x: 0, y: 0}"
        @scroll.window="x=0">

        <section
                x-effect="console.log('x, y': {x, y})"
                class="z-20 fixed"
                 x-show="x"
                 @click.away="x=0"
                :style="'left:'+x+'px; top:'+y+'px'"
        >
            @include($config->view.'/components/contact')
        </section>
    @foreach($sanpham as $key => $item)
        <li class=" py-2">
            <a href="{{$config->base_url}}/chi-tiet?id={{$item['id']}}" class="flex ">
                <div class="hidden lg:block flex-shrink-0">
                    <div class="aspect-w-1 aspect-h-1 w-24 lg:w-[252px]">
                        <img src="{{$media->set($item['images'])->first()}}"
                             alt="{{$item['title']}}"
                             class=" object-center object-cover ">
                    </div>
                </div>

                <div class=" flex-1 flex flex-col ml-0 lg:ml-2">
                    <div class="space-y-2 border border-black p-3">
                        <h4 class="font-semibold truncate-2y lg:w-[25rem] ">
                            {{$item['title']}}
                        </h4>

                        <img src="{{$media->set($item['images'])->first()}}"
                             alt="Front side of mint cotton t-shirt with wavey lines pattern."
                             class="block lg:hidden object-center object-cover ">

                        <ul class="flex space-x-3 text-gray-600">
                            <li class="font-semibold">{{$item['price']}}</li>
                            <li class="font-semibold">{{$item['square']}}</li>
                            <li class="hidden lg:block">{{$item['address']}}</li>
                        </ul>
                        <p class="block lg:hidden">{{$item['address']}}</p>
                        <p class="truncate-3y">{{ strip_tags($item['description']) }}</p>
                        <div class="text-center relative" >
                            <button
                                    @click="x=$event.clientX; y=$event.clientY;  $event.preventDefault();  $event.stopPropagation()"

                                    class="rounded-lg bg-yellow-500 hover:bg-red-600 text-white py-2 px-4 "
                            >
                                Liên hệ ngay
                            </button>
                        </div>
                        <div class="mt-4 flex-1 flex items-end justify-between">
                            <p class="flex items-center text-sm text-gray-700 space-x-2">
                                <span class="">
                                            {{\Carbon\Carbon::parse($item['createdAt'])->format('h:i d/m/Y')}}
                                        </span>
                            </p>
                            <div class="ml-4">

                                <button
                                        x-show="!$store.favorites.items[{{$item['id']}}]"
                                        x-effect="console.log('1', !$store.favorites.items[{{$item['id']}}])"
                                        @click="$store.favorites.add(sanphamObj[{{$item['id']}}]); $event.preventDefault()"
                                        class="rounded-lg border border-black py-1 px-4 ">
                                    Lưu <span class="hidden lg:inline">thông tin thửa đất</span>
                                </button>
                                <button
                                        x-show="$store.favorites.items[{{$item['id']}}]"
                                        x-effect="console.log('2', $store.favorites.items[{{$item['id']}}])"
                                        @click="$store.favorites.add(sanphamObj[{{$item['id']}}]); $event.preventDefault()"
                                        class="rounded-lg border border-transparent py-1 px-4 text-white bg-[#F22424] ">
                                    Đã Lưu</span>
                                </button>

                            </div>
                        </div>
                    </div>
                </div>
            </a>
        </li>
    @endforeach
    </ul>
@endsection
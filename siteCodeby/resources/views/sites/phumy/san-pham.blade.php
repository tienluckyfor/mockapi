@extends($config->layout.'/master')

@section('main')
    @php
        $sanpham = $http->get('/san-pham')->data();
    @endphp
    <main class="">
        {{-- san-pham-1 --}}
        @include($config->view.'/components/breadcrumbs', ['breadcrumbs'=>[['/', 'Trang chủ'], ['/san-pham', 'Sản phẩm']]])

        {{-- san-pham-2 --}}
        <section class="my-3 ">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-3">
                <ul class="flex space-x-6">
                    <li class="">
                        <a href="{{$config->base_url}}/ky-gui" class="text-base font-medium text-black relative group">
                            Ký gửi
                            <div class="block border-b-2 border-black absolute inset-0 -mb-2"></div>
                        </a>
                    </li>
                    <li class="">
                        <label class="text-base font-light text-gray-500 relative group">
                            <span class="">Sắp sếp: </span>
                            <select name="" class="py-0 rounded">
                                <option value="">Tăng dần</option>
                                <option value="">Giảm dần</option>
                            </select>
                        </label>
                    </li>
                </ul>
            </div>
        </section>

        {{-- san-pham-3 --}}
        <section class="my-3 ">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-3">
                <ul role="list" class="space-y-4">
                    @foreach($sanpham as $key => $item)
                        <li class=" py-2">
                            <a href="{{$config->base_url}}/chi-tiet?id={{$item['id']}}" class="flex ">
                                <div class="hidden lg:block flex-shrink-0">
                                    <div class="aspect-w-1 aspect-h-1 w-24 lg:w-[252px]">
                                    <img src="{{$media->set($item['images'])->first()}}"
                                         alt="Front side of mint cotton t-shirt with wavey lines pattern."
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
                                             class=" object-center object-cover ">

                                        <ul class="flex space-x-3 text-gray-600">
                                            <li class="font-semibold">{{$item['price']}}</li>
                                            <li class="font-semibold">{{$item['square']}}</li>
                                            <li class="hidden lg:block">{{$item['address']}}</li>
                                        </ul>
                                        <p class="block lg:hidden">{{$item['address']}}</p>
                                        <p class="truncate-3y">{{ strip_tags($item['description']) }}</p>
                                        <div class="text-center">
                                            <button href="tel:{{$item['phone']}}"
                                                    class="rounded-lg bg-yellow-500 hover:bg-red-600 text-white py-2 px-4 "
                                                    type="submit">
                                                Liên hệ ngay
                                            </button>
                                        </div>
                                        <div class="mt-4 flex-1 flex items-end justify-between">
                                            <p class="flex items-center text-sm text-gray-700 space-x-2">

                                                {{--<svg class="flex-shrink-0 h-5 w-5 text-green-500"
                                                     x-description="Heroicon name: solid/check"
                                                     xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                                                     aria-hidden="true">
                                                    <path fill-rule="evenodd"
                                                          d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                                          clip-rule="evenodd"></path>
                                                </svg>--}}
                                                {{--                                        <span>In stock</span>--}}
                                                <span class="">
                                            {{\Carbon\Carbon::parse($item['createdAt'])->format('h:i d/m/Y')}}
                                        </span>
                                            </p>
                                            <div class="ml-4">
                                                <button href="tel:{{$item['phone']}}"
                                                        class="rounded-lg border border-black py-1 px-4 ">
                                                    Lưu <span class="hidden lg:inline">thông tin thửa đất</span>
                                                </button>
                                            </div>
                                        </div>
                                    </div>


                                </div>
                            </a>

                        </li>
                    @endforeach
                </ul>
            </div>
        </section>
    </main>

@endsection
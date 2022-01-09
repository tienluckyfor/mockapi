<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    {{-- <link href="http://site-codeby.test/css/app.css" rel="stylesheet"> --}}
    <link href="{{ asset('css-phumy/app.css') }}" rel="stylesheet">
    <script src="//unpkg.com/alpinejs" defer></script>
</head>
<style>
    .bg-gray {
        background: #144C4B;
    }

    .btn-gradient {
        background: linear-gradient(90deg, #BF953F 0%, #FCF6BA 22.4%, #FBF5B7 44.27%, #B38728 60.42%, #FBF5B7 78.13%);
    }
</style>
<body>
<!-- This example requires Tailwind CSS v2.0+ -->
<header class="relative bg-gray " x-data="{ showMobileMenu: false }">
    <div class="absolute inset-0 shadow z-30 pointer-events-none" aria-hidden="true"></div>
    <div class="relative z-20 ">
        <div class="max-w-7xl h-20 mx-auto flex justify-between items-center px-4 sm:px-6 lg:px-8 md:space-x-10">
            <div>
                <a href="{{$config->base_url}}/" class="flex flex-shrink-0">
                    <span class="sr-only">Workflow</span>
                    <img class="h-12 w-auto " src="{{$media->set($con['logo'])->first()}}" alt="">
                    {{--                    <img class="h-8 w-auto sm:h-10" src="https://tailwindui.com/img/logos/workflow-mark-indigo-600.svg" alt="">--}}
                </a>
            </div>
            <div class="-mr-2 -my-2 md:hidden">
                <button type="button" @click="showMobileMenu = ! showMobileMenu"
                        class=" rounded-md p-2 inline-flex items-center justify-center text-white hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-indigo-500"
                        aria-expanded="false">
                    <span class="sr-only">Open menu</span>
                    <!-- Heroicon name: outline/menu -->
                    <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                         stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M4 6h16M4 12h16M4 18h16"/>
                    </svg>
                </button>
            </div>
            <div class="hidden md:flex">
                <nav class="flex space-x-8 items-center">
                    @php
                        $menu = $http->get('/menu')->data();
                        $menuSub = $http->get('/menu-sub')->data();
                    @endphp
                    @foreach($menu as $key => $item)
                        @php
                            $menuSub1 = collect($menuSub)->filter(function ($item1) use ($item){
                               return in_array($item['name'], $item1['category']);
                            })->toArray();
                        @endphp

                        <a href="{{$config->base_url}}{{$item['link']}}"
                           class="text-base font-medium text-white relative group">
                            {{$item['name']}}
                            <div class="group-hover:block hidden border-b-4 border-white absolute inset-0 -mb-3"></div>
                        </a>
                        {{--                        @endif--}}
                    @endforeach
                    <a href="tel:0935 68 79 85" class="btn-gradient h-9 px-3 rounded-lg flex items-center ">
                        <span class="">LIÊN HỆ: 0935 68 79 85</span>
                    </a>
                </nav>
            </div>
        </div>
    </div>
    <!--
      Mobile menu
    -->
    <div x-show="showMobileMenu" @click.away="showMobileMenu = false"
         class="absolute z-30 top-0 inset-x-0 p-2 transition transform origin-top-right md:hidden">
        <div class="rounded-lg shadow-lg ring-1 ring-black ring-opacity-5 bg-gray divide-y-2 divide-gray-50">
            <div class="pt-5 pb-6 px-5 sm:pb-8">
                <div class="flex items-center justify-between">
                    <div>
                        <img class="h-8 w-auto" src="{{$media->set($con['logo'])->first()}}"
                             alt="Workflow">
                    </div>
                    <div class="-mr-2">
                        <button type="button" @click="showMobileMenu = ! showMobileMenu"
                                class="rounded-md p-2 inline-flex items-center justify-center text-white hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-indigo-500">
                            <span class="sr-only">Close menu</span>
                            <!-- Heroicon name: outline/x -->
                            <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                 stroke="currentColor" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                      d="M6 18L18 6M6 6l12 12"/>
                            </svg>
                        </button>
                    </div>
                </div>
                <div class="mt-6 sm:mt-8">
                    <nav>
                        <div class="grid gap-7 sm:grid-cols-2 sm:gap-y-8 sm:gap-x-4">
                        @foreach($menu as $key => $item)
                            @php
                                $menuSub1 = collect($menuSub)->filter(function ($item1) use ($item){
                                   return in_array($item['name'], $item1['category']);
                                })->toArray();
                            @endphp
                            @if($menuSub1)
                                <!-- This example requires Tailwind CSS v2.0+ -->
                                    <div class="relative" x-data="{ show: false }">
                                        <!-- Item active: "text-gray-900", Item inactive: "text-gray-500" -->
                                        <button type="button" @click="show = ! show"
                                                x-bind:class="show ? 'text-gray-900' : ''"
                                                class="text-gray-500 group bg-white rounded-md inline-flex items-center text-base font-medium hover:text-gray-900 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                                                aria-expanded="false">
                                            <span>{{$item['name']}}</span>
                                            <svg x-bind:class="show ? 'text-gray-600' : ''"
                                                 class="text-gray-400 ml-2 h-5 w-5 group-hover:text-gray-500"
                                                 xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                                 fill="currentColor" aria-hidden="true">
                                                <path fill-rule="evenodd"
                                                      d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                                      clip-rule="evenodd"/>
                                            </svg>
                                        </button>

                                        <div x-show="show" @click.away="show = false"
                                             x-transition:enter="transition ease-out duration-200"
                                             x-transition:enter-start="opacity-0 -translate-y-1"
                                             x-transition:enter-end="opacity-100 translate-y-0"
                                             x-transition:leave="transition ease-in duration-150"
                                             x-transition:leave-start="opacity-100 translate-y-0"
                                             x-transition:leave-end="opacity-0 -translate-y-1"
                                             class=" absolute z-10 left-1/2 transform -translate-x-1/2 mt-3 px-2 w-screen max-w-xs sm:px-0">
                                            <div class="rounded-lg shadow-lg ring-1 ring-black ring-opacity-5 overflow-hidden">
                                                <div class="relative grid gap-6 bg-white px-5 py-6 sm:gap-8 sm:p-8 lg:grid-cols-2 space-y-6">
                                                    @foreach($menuSub1 as $key1 => $item1)
                                                        <a href="{{$config->base_url}}{{$item1['link']}}"
                                                           class="-m-3 p-3 flex  items-start rounded-lg hover:bg-gray-50 transition ease-in-out duration-150">
                                                            <div class="flex-shrink-0 flex items-center justify-center h-10 w-10 rounded-md bg-indigo-500 text-white sm:h-12 sm:w-12">
                                                                <img class="h-6 w-6"
                                                                     src="{{$media->set($item1['image'])->first()}}"/>
                                                            </div>
                                                            <div class="ml-4">
                                                                <p class="text-base font-medium text-gray-900">
                                                                    {{$item1['name']}}
                                                                </p>
                                                                <p class="mt-1 text-sm text-gray-500">
                                                                    {{$item1['content']}}
                                                                </p>
                                                                <p class="mt-2 text-sm font-medium text-indigo-600 lg:mt-4">
                                                                    Xem thêm
                                                                    <span aria-hidden="true">&rarr;</span>
                                                                </p>
                                                            </div>
                                                        </a>
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @else
                                    <a href="{{$config->base_url}}{{$item['link']}}"
                                       class="-m-3 flex items-center p-3 rounded-lg hover:bg-gray-900">
                                        <div class="text-base font-medium text-white">
                                            {{$item['name']}}
                                        </div>
                                    </a>
                                @endif
                            @endforeach

                            <a href="tel:0935 68 79 85" class="btn-gradient h-9 px-3 rounded-lg flex items-center w-56">
                                <span class="">LIÊN HỆ: 0935 68 79 85</span>
                            </a>

                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</header>

@yield('main')

<footer class="bg-gray">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 ">
        <!-- grid -->
        <div class="grid grid-cols-12 gap-y-8 lg:gap-3 py-6">
            <div class="col-span-12 lg:col-span-4 space-y-6 ">
                <img class="" src="{{$config->static}}/assets/images/PHUMYcopy.png" alt="">
                <p class="text-white text-xl text-center">Cổng thông tin cập nhật dự án Khu đô thị Phú Mỹ - Quảng
                    Ngãi</p>
            </div>
            <div class="col-span-12 lg:col-span-4 text-center">
                <form action="" class="space-y-3">
                    <h4 class="text-white text-xl">NHẬN THÔNG TIN DỰ ÁN</h4>
                    @php
                        $fields = [
                            [
                                'name' => "ho-ten",
                                'hint' => "*Họ và tên"
                            ],
                            [
                                'name' => "email",
                                'type' => "email",
                                'hint' => "Email"
                            ],
                            [
                                'name' => "sdt",
                                'type' => "tel",
                                'hint' => "*Số điện thoại"
                            ]
                        ];
                    @endphp
                    @foreach($fields as $key => $item)
                        <label class="block w-2/3 mx-auto">
                            <input type="{{$item['type']??'text'}}"
                                   name="{{$item['name']}}"
                                   placeholder="{{$item['hint']}}"
                                   class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 ">
                        </label>
                    @endforeach

                    <button class="btn-gradient h-9 px-3 flex-shrink-0" type="submit">
                        Đăng ký ngay
                    </button>
                </form>
            </div>
            <div class="col-span-12 lg:col-span-4 text-white space-y-3">
                <h4 class="text-white text-xl">THÔNG TIN LIÊN HỆ</h4>
                <p class="">PHÒNG KINH DOANH</p>
                <p class="">Hotline: 0935 68 79 85 - 0708 08 22 98</p>
                <p class="">Địa chỉ: Khu đô thị Phú Mỹ, Phường Nghĩa Chánh,
                    Tp Quảng Ngãi</p>
            </div>
        </div>
    </div>
    <hr class="">
    <p class="text-center text-white py-4 text-lg lg:text-xl">
        Copyright © khudothiphumy. 2022.
    </p>
</footer>
</body>

</html>
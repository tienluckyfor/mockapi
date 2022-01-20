@php
    use Cknow\Money\Money;
    use App\Services\BaseService;
@endphp
        <!doctype html>
<html lang="en" class="h-full">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Webkhoinghiep</title>
    {{--    <link rel="stylesheet" href="http://site-codeby.test/css-webkhoinghiep/app.css">--}}
    <link href="{{ asset('css-webkhoinghiep/app.css') }}" rel="stylesheet">

    <script src="//unpkg.com/alpinejs" defer></script>
</head>
<body class="h-full">
@php
    $menu = $http->get('/menu')->data();
    $theloai = $http->get('/the-loai')->data();
    $sanpham = $http->get('/san-pham')->data();
@endphp
<div class="min-h-full">
    <nav x-data="{ showMobileMenu: false }" class="bg-white border-b border-gray-200">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16">
                <div class="flex">
                    <div class="flex-shrink-0 flex items-center">
                        <img class="block lg:hidden h-8 w-auto"
                             src="https://tailwindui.com/img/logos/workflow-mark-indigo-600.svg" alt="Workflow">
                        <img class="hidden lg:block h-8 w-auto"
                             src="https://tailwindui.com/img/logos/workflow-logo-indigo-600-mark-gray-800-text.svg"
                             alt="Workflow">
                    </div>
                    <div class="hidden sm:-my-px sm:ml-6 sm:flex sm:space-x-8 items-center">
                        <!-- Current: "border-indigo-500 text-gray-900", Default: "border-transparent text-gray-500 hover:border-gray-300 hover:text-gray-700" -->
                    @foreach($menu as $key => $item)
                        @if($item['name']=='Kho giao diện')
                            <!-- This example requires Tailwind CSS v2.0+ -->
                                <div class="relative" x-data="{ show: false }" @mouseleave="show = false">
                                    <!-- Item active: "text-gray-900", Item inactive: "text-gray-500" -->
                                    <button @mouseover="show = true" type="button"
                                            class="text-gray-500 group bg-white rounded-md inline-flex items-center text-sm font-medium hover:text-gray-900 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                                            aria-expanded="false">
                                        <span>{{$item['name']}}</span>
                                        <!--
                                          Heroicon name: solid/chevron-down

                                          Item active: "text-gray-600", Item inactive: "text-gray-400"
                                        -->
                                        <svg class="text-gray-400 ml-2 h-5 w-5 group-hover:text-gray-500"
                                             xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                                             aria-hidden="true">
                                            <path fill-rule="evenodd"
                                                  d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                                  clip-rule="evenodd"/>
                                        </svg>
                                    </button>

                                    <!--
                                      Flyout menu, show/hide based on flyout menu state.

                                      Entering: "transition ease-out duration-200"
                                        From: "opacity-0 translate-y-1"
                                        To: "opacity-100 translate-y-0"
                                      Leaving: "transition ease-in duration-150"
                                        From: "opacity-100 translate-y-0"
                                        To: "opacity-0 translate-y-1"
                                    -->
                                    <div x-show="show"
                                         x-transition:enter="transition ease-out duration-200"
                                         x-transition:enter-start="opacity-0 -translate-y-1"
                                         x-transition:enter-end="opacity-100 translate-y-0"
                                         x-transition:leave="transition ease-in duration-150"
                                         x-transition:leave-start="opacity-100 translate-y-0"
                                         x-transition:leave-end="opacity-0 -translate-y-1"
                                         class="absolute z-10 left-1/2 transform -translate-x-1/2 pt-3 px-2 w-screen max-w-xs sm:px-0">
                                        <div class="rounded-lg shadow-lg ring-1 ring-black ring-opacity-5 overflow-hidden">
                                            <div class="relative grid gap-6 bg-white px-5 py-6 sm:p-4">
                                                @foreach($theloai as $key1 => $item1)
                                                    <a href="{{$config->base_url}}{{$item['link']}}?id={{$item1['id']}}"
                                                       class="-m-2 p-2 block rounded-md hover:bg-gray-50 transition ease-in-out duration-150">
                                                        <p class="text-sm text-gray-500">
                                                            {{$item1['name']}}
                                                        </p>
                                                    </a>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @else
                                <a href="{{$config->base_url}}{{$item['link']}}"
                                   class="border-transparent text-gray-500 hover:border-gray-300 hover:text-gray-700 inline-flex items-center px-1 pt-1 border-b-2 text-sm font-medium"
                                   aria-current="page">
                                    {{$item['name']}}
                                </a>
                            @endif
                        @endforeach
                        {{--<a href="#"
                           class="border-indigo-500 text-gray-900 inline-flex items-center px-1 pt-1 border-b-2 text-sm font-medium"
                           aria-current="page">
                            Trang chủ
                        </a>
                        <a href="#"
                           class="border-transparent text-gray-500 hover:border-gray-300 hover:text-gray-700 inline-flex items-center px-1 pt-1 border-b-2 text-sm font-medium">
                            Thiết kế theo yêu cầu
                        </a>
                        <a href="#"
                           class="border-transparent text-gray-500 hover:border-gray-300 hover:text-gray-700 inline-flex items-center px-1 pt-1 border-b-2 text-sm font-medium">
                            Thanh toán
                        </a>--}}
                    </div>
                </div>
                <div class="hidden sm:ml-6 sm:flex sm:items-center space-x-3">
                    <button type="button"
                            class="inline-flex items-center px-4 py-2 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                        Giỏ hàng
                        <!-- Heroicon name: solid/mail -->
                        <svg xmlns="http://www.w3.org/2000/svg" class="ml-2 -mr-1 h-5 w-5" fill="none"
                             viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"/>
                        </svg>
                    </button>
                    <!-- This example requires Tailwind CSS v2.0+ -->
                    <span class="relative z-0 inline-flex shadow-sm rounded-md">
                      <button type="button"
                              class="relative inline-flex items-center px-4 py-2 rounded-l-md border border-gray-300 bg-white text-sm font-medium text-gray-700 hover:bg-gray-50 focus:z-10 focus:outline-none focus:ring-1 focus:ring-indigo-500 focus:border-indigo-500">
                        Đăng nhập
                      </button>
                      <button type="button"
                              class="-ml-px relative inline-flex items-center px-4 py-2 rounded-r-md border border-gray-300 bg-white text-sm font-medium text-gray-700 hover:bg-gray-50 focus:z-10 focus:outline-none focus:ring-1 focus:ring-indigo-500 focus:border-indigo-500">
                        Đăng ký
                      </button>
                    </span>
                </div>
                <div class="-mr-2 flex items-center sm:hidden">
                    <!-- Mobile menu button -->
                    <button type="button" @click="showMobileMenu = ! showMobileMenu"
                            class="bg-white inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                            aria-controls="mobile-menu" aria-expanded="false">
                        <span class="sr-only">Open main menu</span>
                        <!--
                          Heroicon name: outline/menu

                          Menu open: "hidden", Menu closed: "block"
                        -->
                        <svg class="block h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                             stroke="currentColor" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M4 6h16M4 12h16M4 18h16"/>
                        </svg>
                        <!--
                          Heroicon name: outline/x

                          Menu open: "block", Menu closed: "hidden"
                        -->
                        <svg class="hidden h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                             stroke="currentColor" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M6 18L18 6M6 6l12 12"/>
                        </svg>
                    </button>
                </div>
            </div>
        </div>

        <!-- Mobile menu, show/hide based on menu state. -->
        <div x-show="showMobileMenu" @click.away="showMobileMenu = false" class="sm:hidden" id="mobile-menu">
            <div class="pt-2 pb-3 space-y-1">
                <!-- Current: "bg-indigo-50 border-indigo-500 text-indigo-700", Default: "border-transparent text-gray-600 hover:bg-gray-50 hover:border-gray-300 hover:text-gray-800" -->
                @foreach($menu as $key => $item)
                    <a href="{{$config->base_url}}{{$item['link']}}"
                       class="border-transparent text-gray-600 hover:bg-gray-50 hover:border-gray-300 hover:text-gray-800 block pl-3 pr-4 py-2 border-l-4 text-base font-medium"
                       aria-current="page">
                        {{$item['name']}}
                    </a>
                    @if($item['name']=='Kho giao diện')
                        <ul class="ml-8 space-y-3 text-gray-500">
                            @foreach($theloai as $key1 => $item1)
                                <li class="">
                                    <a href="{{$config->base_url}}{{$item['link']}}?id={{$item1['id']}}"
                                       class="block">{{$item1['name']}}</a>
                                </li>
                            @endforeach
                        </ul>
                    @endif
                @endforeach
            </div>
            <div class="pb-3 border-t border-gray-200">
                <div class="mt-3 space-y-1">
                    <a href="#"
                       class="block px-4 py-2 text-base font-medium text-gray-500 hover:text-gray-800 hover:bg-gray-100">
                        Giỏ hàng
                    </a>
                    <a href="#"
                       class="block px-4 py-2 text-base font-medium text-gray-500 hover:text-gray-800 hover:bg-gray-100">
                        Đăng nhập
                    </a>
                    <a href="#"
                       class="block px-4 py-2 text-base font-medium text-gray-500 hover:text-gray-800 hover:bg-gray-100">
                        Đăng ký
                    </a>
                </div>
            </div>
        </div>
    </nav>

    <main class="space-y-10 mt-px">
        <section class="bg-indigo-400 py-4 ">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <h1 class="text-2xl leading-tight text-white font-thin">
                    BẠN CẦN MUA THEME WORDPRESS GIÁ RẺ – ĐÃ VIỆT HÓA – CHUẨN SEO? HÃY ĐẾN VỚI CHÚNG TÔI
                </h1>
            </div>
        </section>
        <section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            @php
                $tienich = $http->get('/tien-ich')->data();
            @endphp
            <div class="grid grid-cols-1 gap-4 sm:grid-cols-3">
                @foreach($tienich as $key => $item)
                    <div class="relative rounded-lg border border-gray-300 bg-white p-2 shadow-sm flex space-x-3 hover:border-gray-400 focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-indigo-500">
                        <div class="flex-shrink-0">
                            <img class="h-10 w-10 rounded-full" src="{{$media->set($item['image'])->first()}}"
                                 alt="">
                        </div>
                        <div class="flex-1 min-w-0">
                            <a href="#" class="focus:outline-none">
                                <span class="absolute inset-0" aria-hidden="true"></span>
                                <p class=" font-medium text-gray-900">
                                    {{$item['name']}}
                                </p>
                                <p class="text-sm text-gray-500 ">
                                    {{$item['description']}}
                                </p>
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        </section>


        <section class="bg-indigo-400 py-4 ">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <h3 class="text-xl leading-tight text-white ">
                    MẪU THEME WORDPRESS VIỆT HÓA NHIỀU NGÀNH NGHỀ
                </h3>
            </div>
        </section>

        <section class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="mt-5 -mx-px border-l border-gray-200 grid grid-cols-3 sm:mx-0 md:grid-cols-3 lg:grid-cols-6 border-t ">
                @foreach($theloai as $key => $item)
                    <div class="group relative p-4 border-r border-b border-gray-200 ">
                        <div class="w-12 mx-auto">
                            <div class=" rounded-lg overflow-hidden bg-gray-200 aspect-w-1 aspect-h-1 group-hover:opacity-75">
                                <img src="{{$media->set($item['image'])->first()}}"
                                     alt="TODO" class="w-full h-full object-center object-cover">
                            </div>
                        </div>
                        <div class="pt-4 text-center">
                            <h3 class="text-sm font-medium text-gray-900">
                                <a href="#">
                                    <span aria-hidden="true" class="absolute inset-0"></span>
                                    {{$item['name']}}
                                </a>
                            </h3>
                        </div>
                    </div>
                @endforeach
            </div>
        </section>

        <div aria-labelledby="filter-heading" class="bg-gray-200 py-5">
            <!-- Filters -->
            <section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <h2 id="filter-heading" class="sr-only">Product filters</h2>
                <div class="flex items-center justify-between">
                    @include($config->view.'/components/dropdown', [
        'list'=>['Phù hợp nhất', 'Giá từ thấp tới cao', 'Giá từ cao xuống thấp'],
        'label'=>'Sắp xếp theo:'
        ])
                    <div class=" sm:flex sm:items-baseline sm:space-x-8">
                        @include($config->view.'/components/dropdown', [
            'list'=> collect($theloai)->pluck('name')->toArray(),
            'label'=>'Thể loại:',
            'isRight'=>true
            ])
                    </div>
                </div>
            </section>
            <!-- Product grid -->
            <section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mt-5">
                <div aria-labelledby="products-heading">
                    <h2 id="products-heading" class="sr-only">Products</h2>
                    <div class="grid grid-cols-1 gap-y-6 sm:grid-cols-2 gap-x-6 lg:grid-cols-4 xl:gap-x-4">
                        @foreach($sanpham as $key => $item)
                            <a href="{{$config->base_url}}/mau-web?{{BaseService::url($item['title'])}}&id={{$item['id']}}"
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
                                                <svg xmlns="http://www.w3.org/2000/svg" class="-ml-1 mr-2 h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
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
                                    <p class="space-x-2">
                                        @if(empty($item['price']) || empty($item['sale-price']))
                                            <span class="font-bold text-red-500">
                                                @if(empty($item['price']))
                                                    @money($item['sale-price'])
                                                @else
                                                    @money($item['price'])
                                                @endif
                                            </span>
                                        @else
                                            <span class="line-through text-red-300">{{Money::min(Money::VND($item['price']), Money::VND($item['sale-price']))}}</span>
                                            <span class="font-bold text-red-500">{{Money::max(Money::VND($item['price']), Money::VND($item['sale-price']))}}</span>
                                        @endif
                                    </p>
                                </div>
                            </a>
                        @endforeach
                    </div>
                </div>
            </section>
        </div>

    </main>
</div>

</body>
</html>
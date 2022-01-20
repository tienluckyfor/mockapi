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
<footer class="">
    <!-- This example requires Tailwind CSS v2.0+ -->
    <!--
      Make sure you add some bottom padding to pages that include a sticky banner like this to prevent
      your content from being obscured when the user scrolls to the bottom of the page.
    -->
    <section class="">
        <div class="bg-indigo-600">
            <div class="max-w-7xl mx-auto py-3 px-3 sm:px-6 lg:px-8">
                <div class="flex items-center justify-between flex-wrap">
                    <div class="flex-1 flex items-center">
                        <p class=" text-white truncate">
                            <span class="text-2xl font-bold">
                              ĐĂNG KÝ TƯ VẤN MIỄN PHÍ
                            </span>
                            <span class="block">Hãy để lại thông tin, chúng tôi sẽ liên hệ lại sau ít phút !</span>
                        </p>
                    </div>
                    <div class="order-3 mt-2 flex-shrink-0 w-full sm:order-2 sm:mt-0 sm:w-auto">
                        <a href="#" class="flex items-center justify-center px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-indigo-600 bg-white hover:bg-indigo-50">
                            ĐĂNG KÝ NGAY
                        </a>
                    </div>
                    {{--<div class="order-2 flex-shrink-0 sm:order-3 sm:ml-3">
                        <button type="button" class="-mr-1 flex p-2 rounded-md hover:bg-indigo-500 focus:outline-none focus:ring-2 focus:ring-white sm:-mr-2">
                            <span class="sr-only">Dismiss</span>
                            <!-- Heroicon name: outline/x -->
                            <svg class="h-6 w-6 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </button>
                    </div>--}}
                </div>
            </div>
        </div>
    </section>
    <!-- This example requires Tailwind CSS v2.0+ -->
    <section class="bg-gray-800">
        <div class="max-w-7xl mx-auto py-12 px-4 overflow-hidden sm:px-6 lg:px-8">
            <nav class="-mx-5 -my-2 flex flex-wrap justify-center" aria-label="Footer">
                @foreach($menu as $key => $item)

                    <div class="px-5 py-2">
                        <a href="{{$config->base_url}}{{$item['link']}}" class="text-base text-white hover:text-gray-500">
                            {{$item['name']}}
                        </a>
                    </div>
                @endforeach
            </nav>
            <div class="mt-8 flex justify-center space-x-6">
                <a href="#" class="text-gray-400 hover:text-gray-500">
                    <span class="sr-only">Facebook</span>
                    <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                        <path fill-rule="evenodd" d="M22 12c0-5.523-4.477-10-10-10S2 6.477 2 12c0 4.991 3.657 9.128 8.438 9.878v-6.987h-2.54V12h2.54V9.797c0-2.506 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.771-1.63 1.562V12h2.773l-.443 2.89h-2.33v6.988C18.343 21.128 22 16.991 22 12z" clip-rule="evenodd" />
                    </svg>
                </a>

                <a href="#" class="text-gray-400 hover:text-gray-500">
                    <span class="sr-only">Instagram</span>
                    <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                        <path fill-rule="evenodd" d="M12.315 2c2.43 0 2.784.013 3.808.06 1.064.049 1.791.218 2.427.465a4.902 4.902 0 011.772 1.153 4.902 4.902 0 011.153 1.772c.247.636.416 1.363.465 2.427.048 1.067.06 1.407.06 4.123v.08c0 2.643-.012 2.987-.06 4.043-.049 1.064-.218 1.791-.465 2.427a4.902 4.902 0 01-1.153 1.772 4.902 4.902 0 01-1.772 1.153c-.636.247-1.363.416-2.427.465-1.067.048-1.407.06-4.123.06h-.08c-2.643 0-2.987-.012-4.043-.06-1.064-.049-1.791-.218-2.427-.465a4.902 4.902 0 01-1.772-1.153 4.902 4.902 0 01-1.153-1.772c-.247-.636-.416-1.363-.465-2.427-.047-1.024-.06-1.379-.06-3.808v-.63c0-2.43.013-2.784.06-3.808.049-1.064.218-1.791.465-2.427a4.902 4.902 0 011.153-1.772A4.902 4.902 0 015.45 2.525c.636-.247 1.363-.416 2.427-.465C8.901 2.013 9.256 2 11.685 2h.63zm-.081 1.802h-.468c-2.456 0-2.784.011-3.807.058-.975.045-1.504.207-1.857.344-.467.182-.8.398-1.15.748-.35.35-.566.683-.748 1.15-.137.353-.3.882-.344 1.857-.047 1.023-.058 1.351-.058 3.807v.468c0 2.456.011 2.784.058 3.807.045.975.207 1.504.344 1.857.182.466.399.8.748 1.15.35.35.683.566 1.15.748.353.137.882.3 1.857.344 1.054.048 1.37.058 4.041.058h.08c2.597 0 2.917-.01 3.96-.058.976-.045 1.505-.207 1.858-.344.466-.182.8-.398 1.15-.748.35-.35.566-.683.748-1.15.137-.353.3-.882.344-1.857.048-1.055.058-1.37.058-4.041v-.08c0-2.597-.01-2.917-.058-3.96-.045-.976-.207-1.505-.344-1.858a3.097 3.097 0 00-.748-1.15 3.098 3.098 0 00-1.15-.748c-.353-.137-.882-.3-1.857-.344-1.023-.047-1.351-.058-3.807-.058zM12 6.865a5.135 5.135 0 110 10.27 5.135 5.135 0 010-10.27zm0 1.802a3.333 3.333 0 100 6.666 3.333 3.333 0 000-6.666zm5.338-3.205a1.2 1.2 0 110 2.4 1.2 1.2 0 010-2.4z" clip-rule="evenodd" />
                    </svg>
                </a>

                <a href="#" class="text-gray-400 hover:text-gray-500">
                    <span class="sr-only">Twitter</span>
                    <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                        <path d="M8.29 20.251c7.547 0 11.675-6.253 11.675-11.675 0-.178 0-.355-.012-.53A8.348 8.348 0 0022 5.92a8.19 8.19 0 01-2.357.646 4.118 4.118 0 001.804-2.27 8.224 8.224 0 01-2.605.996 4.107 4.107 0 00-6.993 3.743 11.65 11.65 0 01-8.457-4.287 4.106 4.106 0 001.27 5.477A4.072 4.072 0 012.8 9.713v.052a4.105 4.105 0 003.292 4.022 4.095 4.095 0 01-1.853.07 4.108 4.108 0 003.834 2.85A8.233 8.233 0 012 18.407a11.616 11.616 0 006.29 1.84" />
                    </svg>
                </a>

                <a href="#" class="text-gray-400 hover:text-gray-500">
                    <span class="sr-only">GitHub</span>
                    <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                        <path fill-rule="evenodd" d="M12 2C6.477 2 2 6.484 2 12.017c0 4.425 2.865 8.18 6.839 9.504.5.092.682-.217.682-.483 0-.237-.008-.868-.013-1.703-2.782.605-3.369-1.343-3.369-1.343-.454-1.158-1.11-1.466-1.11-1.466-.908-.62.069-.608.069-.608 1.003.07 1.531 1.032 1.531 1.032.892 1.53 2.341 1.088 2.91.832.092-.647.35-1.088.636-1.338-2.22-.253-4.555-1.113-4.555-4.951 0-1.093.39-1.988 1.029-2.688-.103-.253-.446-1.272.098-2.65 0 0 .84-.27 2.75 1.026A9.564 9.564 0 0112 6.844c.85.004 1.705.115 2.504.337 1.909-1.296 2.747-1.027 2.747-1.027.546 1.379.202 2.398.1 2.651.64.7 1.028 1.595 1.028 2.688 0 3.848-2.339 4.695-4.566 4.943.359.309.678.92.678 1.855 0 1.338-.012 2.419-.012 2.747 0 .268.18.58.688.482A10.019 10.019 0 0022 12.017C22 6.484 17.522 2 12 2z" clip-rule="evenodd" />
                    </svg>
                </a>

                <a href="#" class="text-gray-400 hover:text-gray-500">
                    <span class="sr-only">Dribbble</span>
                    <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                        <path fill-rule="evenodd" d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10c5.51 0 10-4.48 10-10S17.51 2 12 2zm6.605 4.61a8.502 8.502 0 011.93 5.314c-.281-.054-3.101-.629-5.943-.271-.065-.141-.12-.293-.184-.445a25.416 25.416 0 00-.564-1.236c3.145-1.28 4.577-3.124 4.761-3.362zM12 3.475c2.17 0 4.154.813 5.662 2.148-.152.216-1.443 1.941-4.48 3.08-1.399-2.57-2.95-4.675-3.189-5A8.687 8.687 0 0112 3.475zm-3.633.803a53.896 53.896 0 013.167 4.935c-3.992 1.063-7.517 1.04-7.896 1.04a8.581 8.581 0 014.729-5.975zM3.453 12.01v-.26c.37.01 4.512.065 8.775-1.215.25.477.477.965.694 1.453-.109.033-.228.065-.336.098-4.404 1.42-6.747 5.303-6.942 5.629a8.522 8.522 0 01-2.19-5.705zM12 20.547a8.482 8.482 0 01-5.239-1.8c.152-.315 1.888-3.656 6.703-5.337.022-.01.033-.01.054-.022a35.318 35.318 0 011.823 6.475 8.4 8.4 0 01-3.341.684zm4.761-1.465c-.086-.52-.542-3.015-1.659-6.084 2.679-.423 5.022.271 5.314.369a8.468 8.468 0 01-3.655 5.715z" clip-rule="evenodd" />
                    </svg>
                </a>
            </div>
            <p class="mt-8 text-center text-base text-gray-400">
                &copy; 2020 Workflow, Inc. All rights reserved.
            </p>
        </div>
    </section>

</footer>
</body>
</html>
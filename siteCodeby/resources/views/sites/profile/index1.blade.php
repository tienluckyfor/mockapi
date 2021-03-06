<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <script src="//unpkg.com/alpinejs" defer></script>
</head>

<body>
<section class="w-screen max-w-screen-lg mx-auto px-4">
    <header class="border p-0 pt-3 lg:p-3">
        <div class="grid grid-cols-12 gap-5">
            <div class="col-span-12 lg:col-span-2">
                <div class="mx-auto w-1/2 lg:w-full rounded-full overflow-hidden p-1 border-2 border-indigo-700">
                    <div class="pb-1x1 relative rounded-full overflow-hidden bg-gray-300">
                        <img
                                alt=""
                                src="{{$config->static}}/assets/images/1.png"
                                class="absolute h-full w-full object-cover"
                        />
                    </div>
                </div>
            </div>
            <div class="col-span-12 lg:col-span-8">
                <ul class="space-y-3">
                    <li class="text-center">
                        <h2 class="text-3xl font-extrabold text-gray-900 ">Tien Nguyen</h2>
                    </li>
                    <li class="text-gray-600 space-x-3 text-center block lg:hidden">
                        <?php for($i = 1; $i <= 3; $i++){?>
                        <button type="button"
                                class="inline-flex items-center p-2 border border-transparent rounded-md shadow-sm text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                 fill="currentColor" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                      d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/>
                            </svg>
                        </button>
                        <?php }?>

                    </li>
                    <li class="text-gray-600">
                        <p class="flex space-x-3">
                            <svg xmlns="http://www.w3.org/2000/svg" class="flex-shrink-0 h-5 w-5 text-gray-500"
                                 fill="none"
                                 viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                      d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                            </svg>
                            <span>
                                Thi???t k??? web, thi???t k??? h??? th???ng
                                Thi???t k??? web, thi???t k??? h??? th???ng
                                Thi???t k??? web, thi???t k??? h??? th???ng
                                Thi???t k??? web, thi???t k??? h??? th???ng
                                Thi???t k??? web, thi???t k??? h??? th???ng
                            </span>
                        </p>
                    </li>
                    <li>
                        <p class="flex space-x-3">
                            <svg xmlns="http://www.w3.org/2000/svg" class="flex-shrink-0 h-5 w-5 text-teal-500"
                                 fill="none"
                                 viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                      d="M17.657 18.657A8 8 0 016.343 7.343S7 9 9 10c0-2 .5-5 2.986-7C14 5 16.09 5.777 17.656 7.343A7.975 7.975 0 0120 13a7.975 7.975 0 01-2.343 5.657z"/>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                      d="M9.879 16.121A3 3 0 1012.015 11L11 14H9c0 .768.293 1.536.879 2.121z"/>
                            </svg>
                            <span>
                                L?? ng?????i c?? ni???m ??am m?? ch??y b???ng v???i l???p tr??nh, ?????c bi???t l?? l???p tr??nh website.<br/>
                                T??i l?? ng?????i ki??n c?????ng v?? t??i c?? k??? n??ng ph??n t??ch tuy???t v???i ????? gi???i quy???t c??c v???n ????? trong qu?? tr??nh l??m vi???c.<br/>
                                B??n c???nh ????, t??i ???? tham gia v??o c??c d??? ??n l???n v???i vai tr?? l?? nh?? ph??t tri???n full-stack y??u c???u ph??n t??ch h??? th???ng v?? t???i ??u h??a trang web ????? t???i nhanh h??n nh??ng ??t t??i nguy??n h??n.<br/>
                            </span>
                        </p>
                    </li>
                </ul>
            </div>
            <div class="col-span-2 space-y-3 hidden lg:block ">
                <?php for($i = 1; $i <= 2; $i++){?>
                {{--<button type="button"
                        class="w-full  py-2 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                <span class="inline-flex items-center ">
                    <svg class="mr-2 -ml-1 h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                         fill="currentColor" aria-hidden="true">
                        <path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z"/>
                        <path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z"/>
                    </svg>
                    G???i ??i???n
                </span>
                </button>--}}
                <a href="#"
                   class="inline-flex items-center justify-center px-5 py-2 border border-transparent text-base font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                    <svg class="flex-shrink-0 -ml-1 mr-3 h-5 w-5 text-white" fill="none" viewBox="0 0 24 24"
                         stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/>
                    </svg>
                    <span class="truncate">
                    G???i ??i???n
                    </span>
                </a>
                <?php }?>
            </div>
        </div>
    </header>
    <main class="border p-0 pt-3 lg:p-3">
        <h3 class="text-xl font-bold">#d??? ??n</h3>

        <!-- grid -->
        <div class="grid grid-cols-12 gap-4">
            <div class="col-span-11">
                <ul role="list" class="grid grid-cols-4 gap-3  ">
                    <?php for($i = 1; $i <= 8; $i++){?>
                    <li class="relative">
                        <a href="#" class="hover:opacity-75 block">
                            <div class=" block w-full aspect-w-10 aspect-h-7 rounded-md bg-gray-100 focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-offset-gray-100 focus-within:ring-indigo-500 overflow-hidden">
                                <img src="https://images.unsplash.com/photo-1582053433976-25c00369fc93?ixid=MXwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=512&q=80"
                                     alt="" class="object-cover pointer-events-none ">
                                <button type="button" class="absolute inset-0 focus:outline-none">
                                    <span class="sr-only">View details for IMG_4985.HEIC</span>
                                </button>
                            </div>
                            <p class="mt-2 block text-sm font-medium text-gray-900 truncate pointer-events-none">
                                IMG_4985.HEIC</p>
                            <p class="block text-sm font-medium text-gray-500 pointer-events-none">3.9 MB</p>
                        </a>
                    </li>
                    <?php }?>
                </ul>
            </div>
            <div class="col-span-2">

            </div>
        </div>

    </main>
</section>
</body>

</html>
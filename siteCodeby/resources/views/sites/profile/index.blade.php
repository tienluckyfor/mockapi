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
    <header class="shadow-lg rounded-lg p-3">
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
            <div class="col-span-8">
                <ul class="space-y-3">
                    <li>
                        <h2 class="text-3xl font-extrabold text-gray-900 ">Tien Nguyen</h2>
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
                                Thiết kế web, thiết kế hệ thống
                                Thiết kế web, thiết kế hệ thống
                                Thiết kế web, thiết kế hệ thống
                                Thiết kế web, thiết kế hệ thống
                                Thiết kế web, thiết kế hệ thống
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
                                Là người có niềm đam mê cháy bỏng với lập trình, đặc biệt là lập trình website.<br/>
                                Tôi là người kiên cường và tôi có kỹ năng phân tích tuyệt vời để giải quyết các vấn đề trong quá trình làm việc.<br/>
                                Bên cạnh đó, tôi đã tham gia vào các dự án lớn với vai trò là nhà phát triển full-stack yêu cầu phân tích hệ thống và tối ưu hóa trang web để tải nhanh hơn nhưng ít tài nguyên hơn.<br/>
                            </span>
                        </p>
                    </li>
                </ul>
            </div>
            <div class="col-span-2 space-y-3">
                <?php for($i = 1; $i <= 2; $i++){?>
                <button type="button"
                        class="w-full  py-2 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                <span class="inline-flex items-center ">
                    <svg class="mr-2 -ml-1 h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                         fill="currentColor" aria-hidden="true">
                        <path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z"/>
                        <path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z"/>
                    </svg>
                    Gọi điện
                </span>
                </button>
                <?php }?>
            </div>
        </div>
    </header>

</section>
</body>

</html>
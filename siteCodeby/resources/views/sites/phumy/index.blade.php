@extends($config->layout.'/master')
<style>
    .text-yellow-400 {
        text-shadow: 1px 1px #000;
    }
</style>
@section('main')
    @php
        $sliders = $http->get('/sliders')->data();
        $slidersHome1 = collect($sliders)->filter(function ($item1){
           return in_array('home-1', $item1['position']);
        })
        ->values()
        ->toArray();
        $slidersMHome1 = collect($sliders)->filter(function ($item1){
           return in_array('m-home-1', $item1['position']);
        })
        ->values()
        ->toArray();
        $slidersHome2 = collect($sliders)->filter(function ($item1){
           return in_array('home-2', $item1['position']);
        })
        ->values()
        ->toArray();
        $slidersHome3 = collect($sliders)->filter(function ($item1){
           return in_array('home-3', $item1['position']);
        })
        ->values()
        ->toArray();
        $slidersHome4 = collect($sliders)->filter(function ($item1){
           return in_array('home-4', $item1['position']);
        })
        ->values()
        ->toArray();
    @endphp
    <main class="">

        {{-- home-1 --}}
        <section class="hidden lg:block">
            @include($config->view.'/components/slider', ['sliders'=>$slidersHome1, 'height'=>'620px'])
        </section>

        <section class="block lg:hidden">
            @include($config->view.'/components/slider', ['sliders'=>$slidersMHome1, 'height'=>'320px'])
        </section>

        {{-- home-2 --}}
        <section class="bg-gray">
        @php
            $fields = [
                [
                    'name' => "ho-ten",
                    'hint' => "*Họ và tên",
                    "message"=>"*Họ và tên không được để trống"
                ],
                [
                    'name' => "email",
                    'type' => "email",
                    'hint' => "Email"
                ],
                [
                    'name' => "sdt",
                    'type' => "tel",
                    'hint' => "*Số điện thoại",
                    "message"=>"*Số điện thoại không được để trống"
                ]
            ];
            $errors = [];
            foreach($fields as $key => $item){
                $val = request()->query($item['name']);
                if(request()->has('showModal') && isset($item['message']) && empty($val))
                    $errors[$item['name']] = $item['message'];
            }
        @endphp
        @if(request()->has('showModal') && empty($errors))
            <!-- This example requires Tailwind CSS v2.0+ -->
                <div class="fixed z-10 inset-0 overflow-y-auto" aria-labelledby="modal-title" role="dialog"
                     aria-modal="true">
                    <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
                        <!--
                          Background overlay, show/hide based on modal state.

                          Entering: "ease-out duration-300"
                            From: "opacity-0"
                            To: "opacity-100"
                          Leaving: "ease-in duration-200"
                            From: "opacity-100"
                            To: "opacity-0"
                        -->
                        <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity"
                             aria-hidden="true"></div>

                        <!-- This element is to trick the browser into centering the modal contents. -->
                        <span class="hidden sm:inline-block sm:align-middle sm:h-screen"
                              aria-hidden="true">&#8203;</span>

                        <!--
                          Modal panel, show/hide based on modal state.

                          Entering: "ease-out duration-300"
                            From: "opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                            To: "opacity-100 translate-y-0 sm:scale-100"
                          Leaving: "ease-in duration-200"
                            From: "opacity-100 translate-y-0 sm:scale-100"
                            To: "opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                        -->
                        <div class="inline-block align-bottom bg-white rounded-lg px-4 pt-5 pb-4 text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-sm sm:w-full sm:p-6">
                            <div>
                                <div class="mx-auto flex items-center justify-center h-12 w-12 rounded-full bg-green-100">
                                    <!-- Heroicon name: outline/check -->
                                    <svg class="h-6 w-6 text-green-600" xmlns="http://www.w3.org/2000/svg" fill="none"
                                         viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                              d="M5 13l4 4L19 7"/>
                                    </svg>
                                </div>
                                <div class="mt-3 text-center sm:mt-5">
                                    <p class="">
                                        Đăng ký thành công!<br/>
                                        Cảm ơn bạn đã gửi đăng ký.<br/>
                                        Chúng tôi sẽ liên hệ trong thời gian sớm nhất!
                                    </p>
                                    {{-- <h3 class="text-lg leading-6 font-medium text-gray-900" id="modal-title">
                                         Payment successful
                                     </h3>
                                     <div class="mt-2">
                                         <p class="text-sm text-gray-500">
                                             Lorem ipsum dolor sit amet consectetur adipisicing elit. Consequatur amet labore.
                                         </p>
                                     </div>--}}
                                </div>
                            </div>
                            {{--<div class="mt-5 sm:mt-6">
                                <button type="button" class="inline-flex justify-center w-full rounded-md border border-transparent shadow-sm px-4 py-2 bg-indigo-600 text-base font-medium text-white hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:text-sm">
                                    Go back to dashboard
                                </button>
                            </div>--}}
                        </div>
                    </div>
                </div>
        @endif
        <!-- grid -->
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 ">
                <form class="m-0 h-auto lg:h-28 block lg:flex items-center justify-between space-y-3 lg:space-x-3 py-3 lg:py-0">
                    <p class="flex-shrink-0  text-center lg:text-left text-2xl lg:text-lg">
                        <span class="text-white font-semibold">Nhận báo giá</span>
                    </p>

                    @foreach($fields as $key => $item)
                        <label class="block w-full relative">
                            <input type="{{$item['type']??'text'}}"
                                   name="{{$item['name']}}"
                                   placeholder="{{$item['hint']}}"
                                   autofocus="{{request()->has('showModal')}}"
                                   class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 ">
                            @isset($errors[$item['name']])
                                <p class="text-red-500 absolute bottom-0 -mb-6 text-sm">{{$errors[$item['name']]}}</p>
                            @endif
                        </label>
                    @endforeach
                    <div class="text-center flex-shrink-0">
                        <button class="btn-gradient h-9 px-3" type="submit">
                            Đăng ký ngay
                        </button>
                    </div>
                    <input type="hidden" name="showModal">
                </form>
            </div>
        </section>

        <script src="https://unpkg.com/gsap/dist/gsap.min.js"></script>
        <script src="https://unpkg.com/scrollxp/dist/scrollxp.min.js"></script>

        {{-- home-3 --}}
        <section class="bg-gray" data-scene data-scene-duration="20%" >
            <!-- grid -->
            <div class="max-w-7xl mx-auto px-0 lg:px-8">
                <div class="max-w-7xl block lg:flex justify-between ">
                    <?php for($i = 0; $i <= 2; $i++){?>
                    @switch($i)
                        @case(0)
                            <img data-animate data-animate-from-x="-200" data-animate-to-x="0" data-animate-from-alpha="0" data-animate-to-alpha="1"
                                 class="w-full lg:w-[35%] h-auto lg:h-full object-center object-fill"
                                 src="{{$media->set($slidersHome2[$i]['image'])->first()}}" alt="">
                        @break
                        @case(1)
                            <img data-animate data-animate-from-y="200" data-animate-to-y="0" data-animate-from-alpha="0" data-animate-to-alpha="1"
                                 class="w-full lg:w-[27%] h-auto lg:h-full object-center object-fill"
                                 src="{{$media->set($slidersHome2[$i]['image'])->first()}}" alt="">
                        @break
                        @case(2)
                            <img data-animate data-animate-from-x="200" data-animate-to-x="0" data-animate-from-alpha="0" data-animate-to-alpha="1"
                                 class="w-full lg:w-[38%] h-auto lg:h-full object-center object-fill"
                                 src="{{$media->set($slidersHome2[$i]['image'])->first()}}" alt="">
                        @break
                    @endswitch
                   {{-- <img data-animate data-animate-from-x="0" data-animate-to-x="200"
                         class="w-full {{$w}} h-auto lg:h-full object-center object-fill"
                         src="{{$media->set($slidersHome2[$i]['image'])->first()}}" alt="">--}}
                    <?php }?>
                </div>
            </div>
        </section>

        {{-- home-4 --}}
        <section class="text-center my-10">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 ">
                <h4 class="font-semibold text-3xl text-yellow-400">MỞ BÁN MỚI PHÂN KHU PHÚ GIA RIVERSIDE VIEW
                    SÔNG</h4>
                <div class="text-xl space-y-1 mt-3">
                    <p class="">Hạ tầng hoàn thiện 100%, thanh toán linh hoạt - ngân hàng hỗ trợ đến 70%</p>
                    <p class="">Giá chỉ từ 11 triệu/m2 - giá gốc từ công ty chiết khấu cao</p>
                </div>
            </div>
        </section>

        <script>
            new ScrollXP({
                container: document.body,
            });
        </script>
        {{-- home-5 --}}
        <section class="text-center my-10">
            <div class="max-w-7xl mx-auto px-0 lg:px-8 ">
                <ul class="block lg:flex items-center space-y-3 lg:space-x-3">
                    <li class="w-full lg:w-6/12">
                        <div class="aspect-w-4 aspect-h-3">
                            <img src="{{$media->set($slidersHome3[0]['image'])->first()}}"
                                 class="w-full h-full object-center object-cover lg:w-full lg:h-full"/>
                        </div>
                    </li>
                    <li class="hidden lg:block lg:w-6/12">
                        @php
                            array_shift($slidersHome3);
                        @endphp
                        @include($config->view.'/components/slider', ['sliders'  => $slidersHome3, 'height'=>'455px'])
                    </li>
                    <li class="block lg:hidden lg:w-6/12">
                        @php
                            array_shift($slidersHome3);
                        @endphp
                        @include($config->view.'/components/slider', ['sliders'  => $slidersHome3, 'height'=>'255px'])
                    </li>
                </ul>
            </div>
        </section>

        {{-- home-6 --}}
        <section id="tong-quan" class="my-10 bg-fixed bg-center relative py-4 lg:py-0"
                 style="background-image: url({{$media->set($slidersHome4[0]['image'])->first()}})">
            @php
                $arr = [
                    [
                        'title'=>'Tổng diện tích 123 hecta',
                    ],
                    [
                        'title'=>'Vị trí: Mặt tiền Lý Thường Kiệt - Nghĩa Chánh - TP. Quảng Ngãi.',
                    ],
                    [
                        'title'=>'Quy hoạch xanh - sạch - đẹp.',
                    ],
                    [
                        'title'=>'Đường 12m-13.5m-17.5m-24m-50m',
                    ],
                    [
                        'title'=>'Diện tích 100m2-125m2-150m2 gồm: Shophouse - Nhà phố - Biệt thự - Đất nền - Nhà ở xã hội.',
                    ],
                    [
                        'title'=>'Điện âm nước sạch',
                    ],
                    [
                        'title'=>'Công viên cây xanh',
                    ],
                    [
                        'title'=>'Công trình công cộng',
                    ],
                    [
                        'title'=>'Quy mô dân số 12.000 người',
                    ],
                    [
                        'title'=>'Chủ đầu tư : Tổng công ty đầu tư phát triển nhà ở và đô thị HUD (Thuộc Bộ Xây Dựng)',
                    ],
                    [
                        'title'=>'Đơn vị phân phối độc quyền: Công ty TNHH Bất Động Sản Incomreal',
                    ],
                    ];
            @endphp
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <ul class="block lg:flex items-center space-y-3 lg:space-x-5">
                    <li class="w-full lg:w-[507px] bg-black bg-opacity-50 p-4 block my-0 lg:my-10">
                        <h4 class="text-yellow-400 text-2xl font-bold">TỔNG QUAN DỰ ÁN</h4>
                        <ul class="text-white space-y-2 mt-4">
                            @foreach($arr as $key => $item)
                                <li class="">
                                    {{$item['title']}}
                                </li>
                            @endforeach
                        </ul>
                    </li>
                    <li class="hidden lg:block lg:w-7/12">
                        @php
                            array_shift($slidersHome4);
                        @endphp
                        @include($config->view.'/components/slider', ['sliders'  => $slidersHome4, 'height'=>'450px'])
                    </li>
                    <li class="block lg:hidden lg:w-7/12">
                        @php
                            array_shift($slidersHome4);
                        @endphp
                        @include($config->view.'/components/slider', ['sliders'  => $slidersHome4, 'height'=>'250px'])
                    </li>
                </ul>
            </div>
        </section>


        {{-- home-5 --}}
        <section class="text-center my-10">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-3">
                <h4 class="font-semibold text-3xl text-yellow-400">VIDEO CẬP NHẬT DỰ ÁN PHÚ MỸ QUẢNG NGÃI</h4>
                <div class="aspect-w-16 aspect-h-9 ">
                    <iframe
                            class="rounded"
                            width="560" height="315" src="https://www.youtube-nocookie.com/embed/x3vWtqqQAaM?controls=0"
                            title="YouTube video player" frameborder="0"
                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                            allowfullscreen></iframe>
                </div>
            </div>
        </section>

        {{-- home-5 --}}
        <section id="vi-tri" class="text-center my-10">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-3">
                <h4 class="font-semibold text-3xl text-yellow-400">VỊ TRÍ KHU ĐÔ THỊ PHÚ MỸ</h4>
                <div class="aspect-w-16 aspect-h-9 ">
                    <img src="{{$config->static}}/assets/images/BandoQUangNgai.png" alt="">

                </div>
            </div>
        </section>

        {{-- home-5 --}}
        <section id="dau-tu" class="text-center my-10">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-3">
                <h4 class="font-semibold text-3xl text-yellow-400">05 LÝ DO NÊN ĐẦU TƯ TẠI KHU ĐÔ THỊ PHÚ MỸ QUẢNG
                    NGÃI</h4>
            </div>
        </section>

        {{-- home-5 --}}
        <section class="my-10 ">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-3">
                <h4 class="font-semibold text-2xl text-yellow-400">1. ĐẦU TƯ THÔNG MINH</h4>
                <!-- grid -->
                <div class="grid grid-cols-12 gap-4">
                    <div class="col-span-12 lg:col-span-7 ">
                        Đầu tư thông minh tức là bạn đầu tư vào một nơi cực
                        kỳ an toàn tuy nhiên mang lại lợi nhuận cao.<br/>
                        Khu đô thị Phú Mỹ Quảng Ngãi là một điểm đến phù
                        hợp cho việc đầu tư thông minh cả trong ngắn và dài hạng.<br/>
                        Về an toàn 100% đất nền tại khu đô thị Phú Mỹ Quảng Ngãi đã có sổ đỏ từng lô với pháp lý rõ ràng
                        và được bảo hộ bới chủ đầu tư là công ty Đầu tư phát triển nhà và đô thị HUD trực thuộc bộ xây
                        dựng cực kỳ minh bạch và rõ ràng, dự án còn được đảm bảo từ phía nhiều ngân hàng lớn như
                        Vietcombank , TP bank …. hỗ trợ cho vay đến 70% giá trị đất cho bạn thấy sự minh bạch và an toàn
                        tuyệt đối khi đầu tư tại khu đô thị Phú Mỹ Quảng Ngãi.<br/>
                        Về Lợi nhuận cao: chủ trương của UBND Tỉnh Quảng Ngãi rất rõ ràng là phát triển thành phố Quảng
                        Ngãi theo hướng biển, điều này giúp cho Khu đô thị Phú Mỹ trở thành trung tâm lớn của thành phố
                        Quảng Ngãi. Để bổ sung cho Nghị quyết này rất nhiều quyết định xung quanh đã được ký như: 580 tỷ
                        đồng xây dựng công viên thiên bút, 300 tỷ đồng xây dựng trung tâm hội nghị và triển lãm tỉnh
                        Quảng Ngãi…<br/>
                        Ngoài ra khu đô thị Phú Mỹ Quảng Ngãi sở hữu quỹ đất vàng ven sông bầu giang ngay tại trung tâm
                        thành phố Quảng Ngãi với việc đầu tư cơ sở hạ tầng chất lượng trong đó nổi bật là nhà ở xã hội
                        đầu tiên tại Quảng Ngãi , công viên nước quy mô đến 10ha (lớn nhất Quảng Ngãi), tuyến đường
                        chính 50m cùng nhiều công viên cây xanh… giúp cho cơ hội sinh lời tại nơi đây là cực kỳ to lớn.
                    </div>
                    <div class="col-span-12 lg:col-span-5 ">
                        <img class="" src="{{$config->static}}/assets/images/Chinh sach.png" alt="">
                    </div>
                </div>
            </div>
        </section>

        {{-- home-5 --}}
        <section class="my-10 ">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-3">
                <h4 class="font-semibold text-2xl text-yellow-400">2. GIÁ ĐẤT</h4>
                <div class="">Việc đầu tư bất động sản nói chung và đầu tư bất động sản ở Quảng Ngãi
                    nói riêng thì việc vị thế mua rất quan trọng, thời điểm hiện tại khách hàng đầu tư tại khu đô thị
                    Phú Mỹ Quảng Ngãi sẽ được mua với giá gốc từ công ty cùng với chiết khấu cao & được hỗ trợ rất nhiều
                    từ phía chủ dự án.<br/>
                    Tính đến thời điểm tháng 1/2022, giá được công ty đưa ra rất phù hợp để thị trường Bất động sản ở
                    Quảng Ngãi có thể hấp thụ và sinh lời trong ngắn hạn.<br/>
                    Bởi lẻ, so với thị trường của khu vực xung
                    quanh giá đất ở đây (kể cả các vị trí view công viên) chỉ bằng mua đất Quảng Ngãi trong các hẻm
                    đường lớn như Quang Trung và Lê Lợi chật chội và không nhiều tiện ích.
                </div>
            </div>
        </section>

        {{-- home-5 --}}
        <section class="my-10 ">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-3">
                <h4 class="font-semibold text-2xl text-yellow-400">3. NHÀ Ở XÃ HỘI ĐẦU TIÊN TẠI TRUNG TÂM TP QUẢNG
                    NGÃI</h4>
                <ul class="block lg:flex">
                    <li class="w-full lg:w-8/12">
                        <div class="aspect-w-16 aspect-h-9 lg:aspect-none">
                            <img class="" src="{{$config->static}}/assets/images/1.png" alt="">
                        </div>
                    </li>
                    <li class="w-full lg:w-4/12 bg-gray-700 text-white px-5 py-4">
                        Chủ trương xây dựng nhà ở xã hội đầu tiên trên địa bàng tỉnh Quảng Ngãi là quyết định từ phía
                        chủ đầu tư là công ty đầu tư phát triển nhà và đô thị HUD và được sự đồng thuận lớn từ UBND tỉnh
                        Quảng Ngãi.<br/>
                        Việc xây dựng nhà ở xã hội trong khuân viên khu đô thị phú mỹ quảng ngãi càng khẳng
                        định chủ trương thành phố hướng biển của UBND Tỉnh Quảng Ngãi, đây là cơ hội tuyệt vời giúp cho
                        khu đô thị phú mỹ nhanh chóng trở thành trung tâm thành phố trong tương lai gần.<br/>
                        Dự kiến, trong đầu năm 2022 chủ đầu sẽ triển khai xây dựng nhà ở xã hội nay cùng với đẩy mạnh
                        đầu tư cơ sở hạ tầng, công viên cũng như các hạng mục khác nhằm phục vụ và đạt được sự hài lòng
                        lớn nhất từ các cư dân của khu đô thị Phú Mỹ.
                    </li>
                </ul>
            </div>
        </section>

        {{-- home-5 --}}
        <section id="tien-ich" class="my-10 ">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-3">
                <h4 class="font-semibold text-2xl text-yellow-400">4. TIỆN ÍCH
                </h4>
                <ul class="bg-gray space-y-6">
                    <li class="block lg:flex">
                        <div class="w-full lg:w-4/12 text-white px-5 py-4">
                            <h5 class="text-yellow-400 text-xl text-semibold ">Tiện ích ngoại khu</h5>
                            <p class="">Nằm trong lòng thành phố ngay cửa ngõ phí nam vào thành phố Quảng Ngãi, khu đô
                                thị Phú Mỹ Quảng Ngãi ở vị trí tuận lợi với nhiều tiện ích xung quanh như Siêu thị Go,
                                bệnh viện Phúc Hưng, bến xe Quảng Ngãi, trường đại học, Vincom….
                            </p>
                        </div>
                        <div class="w-full lg:w-8/12">
                            <div class="aspect-w-16 aspect-h-9 lg:aspect-none">
                                <img class="" src="{{$config->static}}/assets/images/4.png" alt="">
                            </div>
                        </div>
                    </li>
                    <li class="block lg:flex">
                        <div class="hidden lg:block lg:w-8/12">
                            <div class="aspect-w-16 aspect-h-9 lg:aspect-none">
                                <img class="" src="{{$config->static}}/assets/images/4.png" alt="">
                            </div>
                        </div>
                        <div class="w-full lg:w-4/12 text-white px-5 py-4">
                            <h5 class="text-yellow-400 text-xl text-semibold ">Tiện ích nội khu</h5>
                            <p class="">
                                Với không gian dự án cực lớn cùng vị trí đắc địa bao bọc bởi sông Bàu Giang, là nền tảng
                                để xây dựng nên những tiện ích nội khu tuyệt vời trong tương lai như trường mầm non,
                                trường tiểu học, các công viên tiểu cảnh ở các cụm dân cư thuộc dự án và các tiện ích
                                thể thao giải trí như sân bóng đá, sân tennis, sân tập golf, câu cá thư giãn.<br/>
                                Trong đó tuyến phố trung tâm với con lươn được xây dựng trở thành tuyến công viên cây
                                xanh trải dài từ cổng khu đô thị đến vòng xoay trung tâm kết hợp với công trình công
                                viên hồ nước lên đến 10ha sẽ là điểm nhấn đặc biệt khi nói đến khu đô thị Phú Mỹ Quảng
                                Ngãi.<br/>
                                Một mảng xanh thiên nhiên hiền hòa giữa cây cỏ, mặt nước và bầu trời đầy thơ mộng,
                                dịu mát.
                            </p>
                        </div>

                        <div class="block lg:hidden">
                            <div class="aspect-w-16 aspect-h-9 lg:aspect-none">
                                <img class="" src="{{$config->static}}/assets/images/4.png" alt="">
                            </div>
                        </div>
                    </li>
                    <li class="block lg:flex pb-6">
                        <div class="w-full lg:w-4/12 text-white px-5 py-4">
                            <h5 class="text-yellow-400 text-xl text-semibold ">Công viên nước 10ha lớn nhất Tp Quảng
                                Ngãi
                            </h5>
                            <p class="">Ở khu đô thị Phú Mỹ Quảng Ngãi không thể nhắc đến công viên nước siêu lớn với
                                tổng diện tích lên đến 10ha tạo điểm nhấn là công viên nước có diện tích lớn nhất, được
                                đầu tư nhiều nhất từ trước đến nay tại thành phố Quảng Ngãi.<br/>
                                Đây là sẽ là điểm tham quan
                                hấp dẫn hàng đầu của cư dân tỉnh Quảng Ngãi nói riêng và khách vảng lai đến với Quảng
                                Ngãi nói chung khi hoàn thiện, công viên nước trung tâm này là biểu tượng một sự tự hào
                                của dự án Phú Mỹ Quảng Ngãi tạo nên một không gian xanh với mật độ cây xanh cao, không
                                gian thoáng mát mang đến cuộc sống thoải mái cho cư dân nơi đây.
                            </p>
                        </div>
                        <div class="w-full lg:w-8/12">
                            <div class="aspect-w-16 aspect-h-9 lg:aspect-none">
                                <img class="" src="{{$config->static}}/assets/images/BDS5.png" alt="">
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </section>

        {{-- home-5 --}}
        <section class="my-10 ">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-3">
                <h4 class="font-semibold text-2xl text-yellow-400">5. THÔNG TIN QUY HOẠCH
                </h4>

                <!-- grid -->
                <div class="grid grid-cols-12 gap-3">
                    <div class="col-span-12 lg:col-span-7 space-y-2">
                        <b>- 580 tỷ đồng xây dựng công viên thiên bút 2021-2025</b>
                        <p class="">
                            Ngày 24.12.2021, lãnh đạo UBND TP.Quảng Ngãi xác nhận, UBND tỉnh Quảng Ngãi có công văn gửi
                            đơn
                            vị và Sở Xây dựng, Sở KH-ĐT, Sở Tài chính về việc đồng ý lập đồ án quy hoạch chi tiết tỷ lệ
                            1/500 khu vực công viên Thiên Bút, TP.Quảng Ngãi.<br/>
                            Công văn của UBND Tỉnh Quảng Ngãi do ông Đặng
                            Văn Minh chủ tịch UBND Tỉnh Quảng Ngãi ký.<br/>
                            Với sự chú trọng đầu tư cơ sở hạ tầng của tỉnh nhằm phát triển cảnh quan khu vực xung quanh
                            núi
                            Thiên Bút và mở rộng thành phố về phía biển là thời cơ cho sự phát triển mạnh mẽ của bds
                            Quảng
                            Ngãi ở nơi đây. Khu đô thị Phú Mỹ Quảng Ngãi may mắn có vị trí đắc địa và mang tiềm năng đầu
                            tư
                            phát triển cực kỳ to lớn.
                        </p>
                        <img class="" src="{{$config->static}}/assets/images/thienbut.png" alt="">
                    </div>
                    <div class="col-span-12 lg:col-span-5 ">
                        <img class="shadow-lg" src="{{$config->static}}/assets/images/hopdongthienbut.png" alt="">
                    </div>
                    <div class="col-span-12 lg:col-span-6 space-y-2">
                        <b>- 300 tỷ xây dựng Trung Tâm Hội Nghị và Triển Lãm</b>
                        <p class="">Theo văn bản số 1750/SXD-QHKT được sở Xây dựng quảng ngãi gửi UBND tỉnh quảng ngãi
                            về việc quy hoạch phân khu đô thị trung tâm thành phố quảng ngãi để thực hiện dự án Trung
                            tâm hội nghị và triển lãm tỉnh Quảng Ngãi 2021-2026.<br/>
                            Vị trí xây dựng thuộc phường Nghĩa Chánh , TP Quảng Ngãi, tỉnh Quảng Ngãi. Dự án gồm 2 khu:
                            khu dất 1 tổng diện tích khoảng 25.170m2 đầu tư xây dựng khối trung tâm hội nghị và triển
                            lãm; khu đất 2 tổng diện tích khoảng 24.700m2 đầu tư xây dựng cây xanh, cảnh quan và bãi đỗ
                            xe.
                        </p>
                    </div>
                    <div class="col-span-12 lg:col-span-6 ">
                        <img class="" src="{{$config->static}}/assets/images/10.png" alt="">
                    </div>
                    <div class="col-span-12">
                        <ul class="flex justify-center space-x-3">
                            <?php for($i = 1; $i <= 3; $i++){?>
                            <li class="">
                                <div class="w-24 lg:w-56 aspect-w-1 aspect-h-1 shadow">
                                    <img class="w-full h-full object-center object-cover"
                                         src="{{$config->static}}/assets/images/hopdongthienbut.png" alt="">
                                </div>
                            </li>
                            <?php }?>
                        </ul>
                    </div>
                    <div class="col-span-12 pt-3 space-y-3">
                        <b class="">
                            Với những con đường hiện hữu, việc kết nối TP hướng biển vẫn còn chật chội. Trong tương lai
                            tỉnh có mở thêm những đường lớn nối về phía biển?
                        </b>
                        <p class="">
                            Với định hướng chiến lược là phát triển TP Quảng Ngãi về phía đông, hướng biển thì ngoài
                            những trục đường chính theo hướng đông – tây đã được đầu tư xây dựng hoàn chỉnh (Trường Sa,
                            Hoàng Sa), UBND tỉnh sẽ tiếp tục đầu tư, nâng cấp các trục đông – tây hiện hữu (quốc lộ 24B,
                            đường Quảng Ngãi – Thu Xà), đồng thời đã quy hoạch và dự kiến sẽ triển khai đầu tư xây dựng
                            nhiều trục đông – tây mới như: Tịnh Phong – Bình Châu, quốc lộ 1 – Tịnh Hòa – cảng Sa Kỳ,
                            núi Thiên Bút – Nghĩa Phú – Nghĩa An. Các trục đường này sẽ hình thành nên một hệ thống liên
                            hoàn, tạo sự kết nối mạnh mẽ giữa trung tâm TP hiện hữu với khu vực ven biển.
                        </p>
                    </div>
                    <div class="col-span-12 lg:col-span-9 space-y-3 pt-3">
                        <b class="">
                            Một vấn đề được nhiều người quan tâm, nhất là giới đầu tư khi TP Quảng Ngãi bị “ách” bởi
                            đường
                            tránh đông, là rào cản cho sự phát triển đô thị. Vì vậy Quảng Ngãi đã có giải pháp đường
                            tránh
                            thay thế?
                        </b>
                        <p class="">
                            Công văn số 6572/UBND-TH gửi Văn phòng Chính phủ tổng hợp báo cáo Chính phủ, Thủ tướng Chính
                            phủ
                            về việc đề xuất xem xét giải quyết một số kiến nghị được ông Đặng Văn Minh chủ tịch ủy ban
                            nhân
                            dân tỉnh Quảng Ngãi ký với nội dung quan trọng là tuyến đường tránh tây của Quảng Ngãi đã
                            được
                            thông qua và sớm bắt đầu thực hiện.
                            Với đường tránh mới thay thế, tuyến đường tránh hiện hữu sẽ trở thành đường nội đô, là điểm
                            tiếp
                            nối giữa đô thị cũ hiện hữu và đô thị mới dần hình thành tại khu phía đông. Trong đó khu đô
                            thị
                            Phú Mỹ Quảng Ngãi là trung tâm phía đông theo mong muốn của Tỉnh.
                            => Chúng ta nhìn nhận cơ hội đầu tư bất động sản rất lớn tại dự án Khu đô thị Phú Mỹ Quảng
                            Ngãi
                            cả về thiên thời địa lợi và nhân hòa , đây chính là nơi đáng đầu tư nhất trong các dự án bất
                            động sản Quảng Ngãi tại thời điểm hiện tại . Ngoài ra đây cũng là một nơi an cư lý tưởng đối
                            với
                            khách hàng có nhu cầu sinh sống với khu đô thị mới văn minh tiên tiến bên cạnh còn có dòng
                            sông
                            bầu giang giúp cho không khí trong lành mát mẻ.
                        </p>
                    </div>
                    <div class="col-span-12 lg:col-span-3">
                        <div class="aspect-w-1 aspect-h-1 w-full shadow">
                            <img class="w-full h-full object-center object-cover"
                                 src="{{$config->static}}/assets/images/hopdongthienbut.png" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>

@endsection
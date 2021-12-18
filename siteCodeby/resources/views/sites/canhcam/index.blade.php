@extends($config->layout.'/master')

@section('main')
    <link rel="stylesheet" type="text/css" href="{{$config->static}}/bundles/site.min.css?v=1.0.1"/>
    <link href="{{$config->static}}/theme/css/home.min.css" rel="stylesheet" type="text/css"/>
    @include($config->view.'/components/css-custom')

    <main>
        <section class="canhcam-banner-1">
            <div class="swiper-container">
                <div class="swiper-wrapper">
                    @php
                        $homeSlider = $http->get('/sliders', ['search'=>'position,home'])->data();
                        $homeSlider = \Illuminate\Support\Arr::first($homeSlider);
                        $files = $media->set($homeSlider['images'])->files();
                    @endphp
                    @foreach($files as $key => $item)
                        <div class="swiper-slide">
                            <img class="swiper-lazy"
                                 src="{{$item}}"/>
                            <div class="swiper-lazy-preloader"></div>
                        </div>
                    @endforeach
                </div>
                <div class="swiper-pagination"></div>
            </div>
        </section>
<pre>## post home-1</pre>
        @php
            $homePost1 = $http->get('/posts', ['search'=>'position,home-1'])->data();
            $homePost1 = \Illuminate\Support\Arr::first($homePost1);
        @endphp
        <section class="canhcam-home-1">
            <div class="container">
                <div class="intro-text">
                    <div class="intro-header">
                        {!! $homePost1['title'] !!}
                    </div>
                    <div class="line-title">
                        {!! $homePost1['sub_title'] !!}</div>
                    <div class="content">
                        {!! $homePost1['description'] !!}
                    </div>
                </div>
            </div>
        </section>
        <pre>## post home-2</pre>

        @php
            $homePost2 = $http->get('/posts', ['search'=>'position,home-2'])->data();
            $homePost2 = \Illuminate\Support\Arr::first($homePost2);
        @endphp
        <section class="canhcam-home-3">
            <div class="container">
                <div class="desc-text" data-aos="zoom-in" data-aos-duration="1000">
                    {!! $homePost2['title'] !!}
                    {!! $homePost2['sub_title'] !!}
                </div>
                <pre>## sub_post home-2</pre>

                <div class="row feature-list">
                    @php
                        $subPosts2 = $http->get('/sub_posts', ['search'=>'post,home-2'])->data();
                    @endphp
                    @foreach($subPosts2 as $key => $item)
                        <div class="col-sm-6 col-lg-4 feature-item" data-aos="zoom-in" data-aos-duration="1000">
                            <figure>
                                <img class="lazyload" data-src="{{$media->set($item['image'])->first()}}"
                                     alt="{{$item['name']}}"/>
                                <figcaption>
                                    <h3><a href="{{$config->base_url.@$item['link']}}">{{$item['name']}}</a></h3>
                                    <p>{{$item['description']}}</p>
                                </figcaption>
                            </figure>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
        <pre>## post home-3</pre>

        @php
            $homePost3 = $http->get('/posts', ['search'=>'position,home-3'])->data();
            $homePost3 = \Illuminate\Support\Arr::first($homePost3);
        @endphp
        <section class="duan-noibat">
            <div class="container">
                <div class="row no-gutters">
                    <div class="col-lg-5 content-center">
                        <div class="content">
                            {!! $homePost3['title'] !!}
                            {!! $homePost3['sub_title'] !!}
                            <div class="swiper-navigation">
                                <div class="swiper-left swiper-button-disabled" tabindex="0" role="button"
                                     aria-label="Previous slide" aria-disabled="true"><img
                                            src="{{$config->static}}/assets/img/swiper-left.png" alt=""/></div>

                                <div class="swiper-right" tabindex="0" role="button" aria-label="Next slide"
                                     aria-disabled="false"><img src="{{$config->static}}/assets/img/swiper-right.png"
                                                                alt=""/></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-7 swiper-right">
                        <pre>## sub_post home-3</pre>

                        <div class="swiper-container">
                            <div class="swiper-wrapper">
                                @php
                                    $subPosts3 = $http->get('/sub_posts', ['search'=>'post,home-3'])->data();
                                @endphp
                                @foreach($subPosts3 as $key => $item)
                                    <div class="swiper-slide">
                                        <a class="img" href="{{$config->base_url.@$item['link']}}"
                                           title="{{$item['name']}}">
                                            <img class="lazyload"
                                                 src="{{$config->static}}/assets/img/deafault-image_220x220.jpg"
                                                 data-src="{{$media->set($item['image'])->first()}}"
                                                 alt="{{$item['name']}}">
                                            <p class="name">{{$item['name']}}</p>
                                        </a>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
        </section>

        @php
            $homePost4 = $http->get('/posts', ['search'=>'position,home-4'])->data();
            $homePost4 = \Illuminate\Support\Arr::first($homePost4);
        @endphp
        <section class="canhcam-home-4">
            <div class="container">
                <div class="desc-text" data-aos="zoom-in" data-aos-duration="1000">
                    {{--<span style="font-size: 18pt;">CÔNG TY THIẾT KẾ WEBSITE</span>
                    <h2>CHO HƠN 2000 KHÁCH HÀNG TRONG 14 NĂM</h2>
                    <p>Chúng tôi tự hào được đồng hành cùng với sự phát triển lớn mạnh của hơn 2000 doanh nghiệp trong
                        và ngoài nước đến từ nhiều ngành nghề với quy mô lớn nhỏ khác nhau.</p>--}}
                    {!! $homePost4['title'] !!}
                </div>
                <div class="row brand-list">

                    @php
                        $subPosts4 = $http->get('/sub_posts', ['search'=>'post,home-4'])->data();
                    @endphp
                    @foreach($subPosts4 as $key => $item)
                        <div class="col-6 col-sm-4 col-md-3 col-lg-2" data-aos="zoom-in" data-aos-duration="1000"
                             data-aos-delay="500">
                            <a class="brand-item" href="{{@$item['link']}}" title="" target="_blank"
                               rel="noopener nofollow">
                                <img class="lazyload" src="{{$media->set($item['image'])->first()}}"
                                     alt="{{@$item['name']}}"/>
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>

        <section class="canhcam-home-5">
            <div class="container">
                <div class="desc-text">
                    <h2>ẤN TƯỢNG VỀ CÁNH CAM</h2>
                </div>
                <div class="row">
                    <div class="col-12 testimonial-list">
                        <div class="swiper-container swiper-container-horizontal">
                            <div class="swiper-wrapper">
                                <div class="swiper-slide swiper-slide-active" style="width: 690px; margin-right: 30px;">
                                    <div class="content">
                                        <p>
                                            “Sau khi hợp tác với Cánh Cam, PVOIL đã có một website vận hành rất tốt,
                                            chúng tôi hoàn toàn hài lòng về dịch vụ của <strong>Công ty thiết kế website
                                                Cánh Cam</strong> trong quá trình triển
                                            khai cũng như dịch vụ hỗ trợ sau khi website vận hành chính thức. ”
                                        </p>
                                    </div>
                                    <div class="info">
                                        <h3>
                                            Ông Phạm Mạnh Cường
                                        </h3>
                                    </div>
                                </div>
                                <div class="swiper-slide swiper-slide-next" style="width: 690px; margin-right: 30px;">
                                    <div class="content">
                                        <p>
                                            “Hiện nay khách hàng gửi email về để hỏi thăm về sản phẩm Vĩnh Tường ngày
                                            một nhiều, cho thấy trang web mới thực sự hấp dẫn người xem và hiệu quả hơn
                                            cho việc tương tác với khách hàng. Cảm ơn
                                            Cánh Cam nhé.”
                                        </p>
                                    </div>
                                    <div class="info">
                                        <h3>
                                            Bà Ngô Thị Phụng
                                        </h3>
                                    </div>
                                </div>
                                <div class="swiper-slide" style="width: 690px; margin-right: 30px;">
                                    <div class="content">
                                        <p>
                                            Cánh Cam đã vượt quá sự mong đợi của chúng tôi trong việc cung cấp các dịch
                                            vụ: thiết kế logo, thiết kế website, tài liệu quảng cáo và bộ office-kit.
                                            Tiohhian mong muốn tiếp tục mối quan hệ
                                            công việc với Công ty thiết kế website Cánh Cam.
                                        </p>
                                    </div>
                                    <div class="info">
                                        <h3>
                                            Wallenburg Dirk
                                        </h3>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-pagination swiper-pagination-clickable swiper-pagination-bullets">
                                <span class="swiper-pagination-bullet swiper-pagination-bullet-active" tabindex="0"
                                      role="button" aria-label="Go to slide 1"></span>
                                <span class="swiper-pagination-bullet" tabindex="0" role="button"
                                      aria-label="Go to slide 2"></span><span class="swiper-pagination-bullet"
                                                                              tabindex="0" role="button"
                                                                              aria-label="Go to slide 3"></span>
                            </div>
                            <span class="swiper-notification" aria-live="assertive" aria-atomic="true"></span>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="feedback-img">
                            <img alt="Công ty thiết kế website" class="lazyload" src="/assets/img/deafault-image.jpg"
                                 data-src="{{$config->static}}/assets/media/home/antuong.jpg"/>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="canhcam-home-6">
            <div class="container">
                <div class="row" data-aos="flip-up" data-aos-delay="500">
                    <div class="col-lg-10">
                        <div class="line-title">Bạn cần một thương hiệu mới</div>
                        <div class="content">
                            <p>
                                Ai cũng có thể tạo ra bộ nhận diện thương hiệu đẹp… Nhưng liệu có bao nhiêu thương hiệu
                                được hoạch định bài bản để có thể nhận ra giữa các đối thủ trên tạp chí, ấn phẩm, trên
                                trang web, internet, ứng dụng
                                điện thoại thông minh, trên truyền hình hoặc trên kệ hàng… theo cách xuyên suốt và nhất
                                quán.
                            </p>
                        </div>
                    </div>
                    <div class="col-lg-2">
                        <div id="ackIframe">&nbsp;</div>
                        <div class="btn-wrap"><a href="https://www.canhcam.vn/thiet-ke-website" target="_blank">KHÁM PHÁ
                                THÊM</a></div>
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection
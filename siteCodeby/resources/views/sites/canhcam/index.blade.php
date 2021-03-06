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
            $home1 = $http->get('/home', ['search'=>'position,home-1'])->data();
            $home1 = \Illuminate\Support\Arr::first($home1);
        @endphp
        <section class="canhcam-home-1">
            <div class="container">
                <div class="intro-text">
                    <div class="intro-header">
                        {!! $home1['title'] !!}
                    </div>
                    <div class="line-title">
                        {!! $home1['sub_title'] !!}</div>
                    <div class="content">
                        {!! $home1['description'] !!}
                    </div>
                </div>
            </div>
        </section>
        <pre>## post home-2</pre>

        @php
            $home2 = $http->get('/home', ['search'=>'position,home-2'])->data();
            $home2 = \Illuminate\Support\Arr::first($home2);
        @endphp
        <section class="canhcam-home-3">
            <div class="container">
                <div class="desc-text" data-aos="zoom-in" data-aos-duration="1000">
                    {!! $home2['title'] !!}
                    {!! $home2['sub_title'] !!}
                </div>
                <pre>## sub_post home-2</pre>

                <div class="row feature-list">
                    @php
                        $homeSub2 = $http->get('/home-sub', ['search'=>'post,home-2'])->data();
                    @endphp
                    @foreach($homeSub2 as $key => $item)
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
            $home3 = $http->get('/home', ['search'=>'position,home-3'])->data();
            $home3 = \Illuminate\Support\Arr::first($home3);
        @endphp
        <section class="duan-noibat">
            <div class="container">
                <div class="row no-gutters">
                    <div class="col-lg-5 content-center">
                        <div class="content">
                            {!! $home3['title'] !!}
                            {!! $home3['sub_title'] !!}
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
                                    $homeSub3 = $http->get('/home-sub', ['search'=>'post,home-3'])->data();
                                @endphp
                                @foreach($homeSub3 as $key => $item)
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
            $home4 = $http->get('/home', ['search'=>'position,home-4'])->data();
            $home4 = \Illuminate\Support\Arr::first($home4);
        @endphp
        <section class="canhcam-home-4">
            <pre>## post home-4</pre>

            <div class="container">
                <div class="desc-text" data-aos="zoom-in" data-aos-duration="1000">
                    {{--<span style="font-size: 18pt;">C??NG TY THI???T K??? WEBSITE</span>
                    <h2>CHO H??N 2000 KH??CH H??NG TRONG 14 N??M</h2>
                    <p>Ch??ng t??i t??? h??o ???????c ?????ng h??nh c??ng v???i s??? ph??t tri???n l???n m???nh c???a h??n 2000 doanh nghi???p trong
                        v?? ngo??i n?????c ?????n t??? nhi???u ng??nh ngh??? v???i quy m?? l???n nh??? kh??c nhau.</p>--}}
                    {!! $home4['title'] !!}
                </div>
                <pre>## sub_post home-4</pre>

                <div class="row brand-list">
                    @php
                        $homeSub4 = $http->get('/home-sub', ['search'=>'post,home-4'])->data();
                    @endphp
                    @foreach($homeSub4 as $key => $item)
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
        <pre>## post home-5</pre>
        @php
            $home5 = $http->get('/home', ['search'=>'position,home-5'])->data();
            $home5 = \Illuminate\Support\Arr::first($home5);
        @endphp

        <section class="canhcam-home-5">
            <div class="container">
                <div class="desc-text">
                    {!! $home5['title'] !!}
                </div>
                <pre>## sub_post home-5</pre>

                <div class="row">
                    <div class="col-12 testimonial-list">
                        <div class="swiper-container">
                            <div class="swiper-wrapper">
                                @php
                                    $homeSub5 = $http->get('/home-sub', ['search'=>'post,home-5'])->data();
                                @endphp
                                @foreach($homeSub5 as $key => $item)
                                    <div class="swiper-slide">
                                        <div class="content">
                                            <p>{!! $item['description'] !!}</p>
                                        </div>
                                        <div class="info">
                                            <h3>{!! $item['name'] !!}</h3>
                                        </div>
                                    </div>
                                @endforeach
{{--
                                <div class="swiper-slide">
                                    <div class="content">
                                        <p>
                                            ???Hi???n nay kh??ch h??ng g???i email v??? ????? h???i th??m v??? s???n ph???m V??nh T?????ng ng??y
                                            m???t nhi???u, cho th???y trang web m???i th???c s??? h???p d???n ng?????i xem v?? hi???u qu??? h??n
                                            cho vi???c t????ng t??c v???i kh??ch h??ng. C???m ??n C??nh Cam
                                            nh??.???
                                        </p>
                                    </div>
                                    <div class="info">
                                        <h3>
                                            B?? Ng?? Th??? Ph???ng
                                        </h3>
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="content">
                                        <p>
                                            C??nh Cam ???? v?????t qu?? s??? mong ?????i c???a ch??ng t??i trong vi???c cung c???p c??c d???ch
                                            v???: thi???t k??? logo, thi???t k??? website, t??i li???u qu???ng c??o v?? b??? office-kit.
                                            Tiohhian mong mu???n ti???p t???c m???i quan h??? c??ng vi???c v???i
                                            C??ng ty thi???t k??? website C??nh Cam.
                                        </p>
                                    </div>
                                    <div class="info">
                                        <h3>
                                            Wallenburg Dirk
                                        </h3>
                                    </div>
                                </div>--}}
                            </div>
                            <div class="swiper-pagination"></div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="feedback-img">
                            {!! $home5['sub_title'] !!}
                            {{--                            <img alt="C??ng ty thi???t k??? website" class="lazyload" src="/assets/img/deafault-image.jpg" data-src="/assets/media/home/antuong.jpg" />--}}
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <pre>## post home-6</pre>
        @php
            $home6 = $http->get('/home', ['search'=>'position,home-6'])->data();
            $home6 = \Illuminate\Support\Arr::first($home6);
        @endphp
        <section class="canhcam-home-6">
            <div class="container">
                <div class="row" data-aos="flip-up" data-aos-delay="500">
                    <div class="col-lg-10">
                        <div class="line-title">{!! $home6['title'] !!}</div>
                        <div class="content">
                            {!! $home6['description'] !!}
                        </div>
                    </div>
                    <div class="col-lg-2">
                        <div id="ackIframe">&nbsp;</div>
                        <div class="btn-wrap"><a href="{{$config->base_url.strip_tags(@$home6['sub_title'])}}" target="_blank">KH??M PH??
                                TH??M</a></div>
                    </div>
                </div>
            </div>
        </section>
    </main>
    <script async="" defer="" src="{{$config->static}}/theme/js/home.min.js"></script>
@endsection
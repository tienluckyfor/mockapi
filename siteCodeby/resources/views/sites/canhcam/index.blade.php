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

        <section class="duan-noibat">
            <div class="container">
                <div class="row no-gutters">
                    <div class="col-lg-5 content-center">
                        <div class="content">
                            <h3>Website vừa <strong>golive </strong>trong tháng</h3>
                            <p>Bộ sưu tập những website mới nhất được Cánh Cam Thiết kế và đưa vào vận hành chính thức.
                                Hãy <a href="/lien-lac">liên hệ </a>với chúng tôi để được tư vấn làm website tốt nhất.
                            </p>
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
                        <div class="swiper-container swiper-container-horizontal swiper-container-multirow">
                            <div class="swiper-wrapper" style="width: 1145px; transform: translate3d(0px, 0px, 0px);">
                                <div class="swiper-slide swiper-slide-active" data-swiper-column="0" data-swiper-row="0"
                                     style="order: 0; width: 221px; margin-right: 8px;">
                                    <a class="img" href="/lam-website-masteri-toa-sang-tren-thi-truong-bat-dong-san"
                                       title="MASTERI tỏa sáng trên thị trường Bất động sản ">
                                        <img class="lazyload" src="/assets/img/deafault-image_220x220.jpg"
                                             data-src="{{$config->static}}/assets/images/thumbs/6150cc401f442a14555775b4.jpeg"
                                             alt="MASTERI tỏa sáng trên thị trường Bất động sản "/>
                                        <p class="name">MASTERI tỏa sáng trên thị trường Bất động sản</p>
                                    </a>
                                </div>
                                <div class="swiper-slide swiper-slide-next" data-swiper-column="0" data-swiper-row="1"
                                     style="-webkit-box-ordinal-group: 5; order: 5; margin-top: 8px; width: 221px; margin-right: 8px;">
                                    <a class="img"
                                       href="/dat-xanh-group-xay-dung-niem-tin-bat-dau-tu-xay-dung-ngoi-nha-cua-ban"
                                       title="ĐẤT XANH GROUP - XÂY DỰNG NIỀM TIN BẮT ĐẦU TỪ XÂY DỰNG NGÔI NHÀ CỦA BẠN">
                                        <img class="lazyload" src="/assets/img/deafault-image_220x220.jpg"
                                             data-src="{{$config->static}}/assets/images/thumbs/6150cc401f442a14555775e4.jpeg"
                                             alt="ĐẤT XANH GROUP - XÂY DỰNG NIỀM TIN BẮT ĐẦU TỪ XÂY DỰNG NGÔI NHÀ CỦA BẠN"/>
                                        <p class="name">ĐẤT XANH GROUP - XÂY DỰNG NIỀM TIN BẮT ĐẦU TỪ XÂY DỰNG NGÔI NHÀ
                                            CỦA BẠN</p>
                                    </a>
                                </div>
                                <div class="swiper-slide" data-swiper-column="1" data-swiper-row="0"
                                     style="-webkit-box-ordinal-group: 1; order: 1; width: 221px; margin-right: 8px;">
                                    <a class="img" href="/cbre-viet-nam-lam-website-dich-vu-khu-dan-cu-hien-dai"
                                       title="CBRE Việt Nam - Làm website dịch vụ khu dân cư hiện đại">
                                        <img class="lazyload" src="/assets/img/deafault-image_220x220.jpg"
                                             data-src="{{$config->static}}/assets/images/thumbs/6150cc401f442a145557761b.jpeg"
                                             alt="CBRE Việt Nam - Làm website dịch vụ khu dân cư hiện đại"/>
                                        <p class="name">CBRE Việt Nam - Làm website dịch vụ khu dân cư hiện đại</p>
                                    </a>
                                </div>
                                <div class="swiper-slide" data-swiper-column="1" data-swiper-row="1"
                                     style="-webkit-box-ordinal-group: 6; order: 6; margin-top: 8px; width: 221px; margin-right: 8px;">
                                    <a class="img" href="/it-park-thung-lung-silicon-da-nang"
                                       title="IT PARK - THUNG LŨNG SILICON ĐÀ NẴNG">
                                        <img class="lazyload" src="/assets/img/deafault-image_220x220.jpg"
                                             data-src="{{$config->static}}/assets/images/thumbs/6150cc461f442a145557796d.jpeg"
                                             alt="IT PARK - THUNG LŨNG SILICON ĐÀ NẴNG"/>
                                        <p class="name">IT PARK - THUNG LŨNG SILICON ĐÀ NẴNG</p>
                                    </a>
                                </div>
                                <div class="swiper-slide" data-swiper-column="2" data-swiper-row="0"
                                     style="-webkit-box-ordinal-group: 2; order: 2; width: 221px; margin-right: 8px;">
                                    <a class="img" href="/benh-vien-da-khoa-twg-healthcare"
                                       title="BỆNH VIỆN ĐA KHOA TWG HEALTHCARE">
                                        <img class="lazyload" src="/assets/img/deafault-image_220x220.jpg"
                                             data-src="{{$config->static}}/assets/images/thumbs/6150cc461f442a1455577979.jpeg"
                                             alt="BỆNH VIỆN ĐA KHOA TWG HEALTHCARE"/>
                                        <p class="name">BỆNH VIỆN ĐA KHOA TWG HEALTHCARE</p>
                                    </a>
                                </div>
                                <div class="swiper-slide" data-swiper-column="2" data-swiper-row="1"
                                     style="-webkit-box-ordinal-group: 7; order: 7; margin-top: 8px; width: 221px; margin-right: 8px;">
                                    <a class="img"
                                       href="/sunshine-equipment-giai-phap-thiet-bi-nha-bep-danh-cho-chuyen-gia"
                                       title="Sunshine Equipment - Giải pháp thiết bị nhà bếp dành cho chuyên gia ">
                                        <img class="lazyload" src="/assets/img/deafault-image_220x220.jpg"
                                             data-src="{{$config->static}}/assets/images/thumbs/6150cc461f442a1455577987.jpeg"
                                             alt="Sunshine Equipment - Giải pháp thiết bị nhà bếp dành cho chuyên gia "/>
                                        <p class="name">Sunshine Equipment - Giải pháp thiết bị nhà bếp dành cho chuyên
                                            gia</p>
                                    </a>
                                </div>
                                <div class="swiper-slide" data-swiper-column="3" data-swiper-row="0"
                                     style="-webkit-box-ordinal-group: 3; order: 3; width: 221px; margin-right: 8px;">
                                    <a class="img" href="/kfc-viet-nam-lam-website-tuyen-dung-cho-rieng-minh"
                                       title="KFC Việt Nam làm website tuyển dụng cho riêng mình">
                                        <img class="lazyload" src="/assets/img/deafault-image_220x220.jpg"
                                             data-src="{{$config->static}}/assets/images/thumbs/6150cc461f442a1455577993.jpeg"
                                             alt="KFC Việt Nam làm website tuyển dụng cho riêng mình"/>
                                        <p class="name">KFC Việt Nam làm website tuyển dụng cho riêng mình</p>
                                    </a>
                                </div>
                                <div class="swiper-slide" data-swiper-column="3" data-swiper-row="1"
                                     style="-webkit-box-ordinal-group: 8; order: 8; margin-top: 8px; width: 221px; margin-right: 8px;">
                                    <a class="img"
                                       href="/honda-viet-nam-power-products-cong-nghe-dinh-cao-cung-nhau-phat-trien"
                                       title="HONDA VIỆT NAM POWER PRODUCTS - CÔNG NGHỆ ĐỈNH CAO CÙNG NHAU PHÁT TRIỂN">
                                        <img class="lazyload" src="/assets/img/deafault-image_220x220.jpg"
                                             data-src="{{$config->static}}/assets/images/thumbs/6150cc471f442a14555779a1.jpeg"
                                             alt="HONDA VIỆT NAM POWER PRODUCTS - CÔNG NGHỆ ĐỈNH CAO CÙNG NHAU PHÁT TRIỂN"/>
                                        <p class="name">HONDA VIỆT NAM POWER PRODUCTS - CÔNG NGHỆ ĐỈNH CAO CÙNG NHAU
                                            PHÁT TRIỂN</p>
                                    </a>
                                </div>
                                <div class="swiper-slide" data-swiper-column="4" data-swiper-row="0"
                                     style="-webkit-box-ordinal-group: 4; order: 4; width: 221px; margin-right: 8px;">
                                    <a class="img" href="/watami-viet-nam"
                                       title="WATAMI VIỆT NAM - NHÀ HÀNG NHẬT, ĐẲNG CẤP CHO TẤT CẢ">
                                        <img class="lazyload" src="/assets/img/deafault-image_220x220.jpg"
                                             data-src="{{$config->static}}/assets/images/thumbs/6150cc471f442a14555779b9.jpeg"
                                             alt="WATAMI VIỆT NAM - NHÀ HÀNG NHẬT, ĐẲNG CẤP CHO TẤT CẢ"/>
                                        <p class="name">WATAMI VIỆT NAM - NHÀ HÀNG NHẬT, ĐẲNG CẤP CHO TẤT CẢ</p>
                                    </a>
                                </div>
                                <div class="swiper-slide" data-swiper-column="4" data-swiper-row="1"
                                     style="-webkit-box-ordinal-group: 9; order: 9; margin-top: 8px; width: 221px; margin-right: 8px;">
                                    <a class="img" href="/toshiba" title="TOSHIBA">
                                        <img class="lazyload" src="/assets/img/deafault-image_220x220.jpg"
                                             data-src="{{$config->static}}/assets/images/thumbs/6150cc481f442a1455577a8f.jpeg"
                                             alt="TOSHIBA"/>
                                        <p class="name">TOSHIBA</p>
                                    </a>
                                </div>
                            </div>
                            <span class="swiper-notification" aria-live="assertive" aria-atomic="true"></span>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="canhcam-home-4">
            <div class="container">
                <div class="desc-text" data-aos="zoom-in" data-aos-duration="1000">
                    <span style="font-size: 18pt;">CÔNG TY THIẾT KẾ WEBSITE</span>
                    <h2>CHO HƠN 2000 KHÁCH HÀNG TRONG 14 NĂM</h2>
                    <p>Chúng tôi tự hào được đồng hành cùng với sự phát triển lớn mạnh của hơn 2000 doanh nghiệp trong
                        và ngoài nước đến từ nhiều ngành nghề với quy mô lớn nhỏ khác nhau.</p>
                </div>
                <div class="row brand-list">
                    <div class="col-6 col-sm-4 col-md-3 col-lg-2" data-aos="zoom-in" data-aos-duration="1000"
                         data-aos-delay="500">
                        <a class="brand-item" href="http://www.vinasuntaxi.com/" title="" target="_blank"
                           rel="noopener nofollow"> <img class="lazyload" src="{{$config->static}}/assets/Banner/11.jpg"
                                                         alt="vinasuntaxi"/> </a>
                    </div>
                    <div class="col-6 col-sm-4 col-md-3 col-lg-2" data-aos="zoom-in" data-aos-duration="1000"
                         data-aos-delay="500">
                        <a class="brand-item" href="http://inspiring-asia.com/" title="" target="_blank"
                           rel="noopener nofollow"> <img class="lazyload" src="{{$config->static}}/assets/Banner/2.jpg"
                                                         alt="inspiring-asia"/> </a>
                    </div>
                    <div class="col-6 col-sm-4 col-md-3 col-lg-2" data-aos="zoom-in" data-aos-duration="1000"
                         data-aos-delay="500">
                        <a class="brand-item" href="http://www.adparch.com/" title="" target="_blank"
                           rel="noopener nofollow"> <img class="lazyload" src="{{$config->static}}/assets/Banner/3.jpg"
                                                         alt="adparch"/>
                        </a>
                    </div>
                    <div class="col-6 col-sm-4 col-md-3 col-lg-2" data-aos="zoom-in" data-aos-duration="1000"
                         data-aos-delay="500">
                        <a class="brand-item" href="http://www.vstar.edu.vn/" title="" target="_blank"
                           rel="noopener nofollow"> <img class="lazyload" src="{{$config->static}}/assets/Banner/4.jpg"
                                                         alt="vstar"/>
                        </a>
                    </div>
                    <div class="col-6 col-sm-4 col-md-3 col-lg-2" data-aos="zoom-in" data-aos-duration="1000"
                         data-aos-delay="500">
                        <a class="brand-item" href="http://www.toshiba.com.vn/" title="" target="_blank"
                           rel="noopener nofollow"> <img class="lazyload" src="{{$config->static}}/assets/Banner/5.jpg"
                                                         alt="toshiba"/>
                        </a>
                    </div>
                    <div class="col-6 col-sm-4 col-md-3 col-lg-2" data-aos="zoom-in" data-aos-duration="1000"
                         data-aos-delay="500">
                        <a class="brand-item" href="http://www.tondonga.com.vn/" title="" target="_blank"
                           rel="noopener nofollow"> <img class="lazyload" src="{{$config->static}}/assets/Banner/6.jpg"
                                                         alt="tondonga"/>
                        </a>
                    </div>
                    <div class="col-6 col-sm-4 col-md-3 col-lg-2" data-aos="zoom-in" data-aos-duration="1000"
                         data-aos-delay="500">
                        <a class="brand-item" href="http://www.kidofoods.vn/" title="" target="_blank"
                           rel="noopener nofollow"> <img class="lazyload" src="{{$config->static}}/assets/Banner/7.jpg"
                                                         alt="kidofoods"/> </a>
                    </div>
                    <div class="col-6 col-sm-4 col-md-3 col-lg-2" data-aos="zoom-in" data-aos-duration="1000"
                         data-aos-delay="500">
                        <a class="brand-item" href="http://www.hondapp.com.vn/" title="" target="_blank"
                           rel="noopener nofollow"> <img class="lazyload" src="{{$config->static}}/assets/Banner/8.jpg"
                                                         alt="hondapp"/>
                        </a>
                    </div>
                    <div class="col-6 col-sm-4 col-md-3 col-lg-2" data-aos="zoom-in" data-aos-duration="1000"
                         data-aos-delay="500">
                        <a class="brand-item" href="http://www.pandanusresort.com/" title="" target="_blank"
                           rel="noopener nofollow"> <img class="lazyload" src="{{$config->static}}/assets/Banner/9.jpg"
                                                         alt="pandanusresort"/> </a>
                    </div>
                    <div class="col-6 col-sm-4 col-md-3 col-lg-2" data-aos="zoom-in" data-aos-duration="1000"
                         data-aos-delay="500">
                        <a class="brand-item" href="http://www.hontamresort.vn/" title="" target="_blank"
                           rel="noopener nofollow"> <img class="lazyload" src="{{$config->static}}/assets/Banner/10.jpg"
                                                         alt="hontamresort"/> </a>
                    </div>
                    <div class="col-6 col-sm-4 col-md-3 col-lg-2" data-aos="zoom-in" data-aos-duration="1000"
                         data-aos-delay="500">
                        <a class="brand-item" href="http://www.novaland.com.vn/" title="" target="_blank"
                           rel="noopener nofollow"> <img class="lazyload"
                                                         src="{{$config->static}}/assets/Banner/111.jpg"
                                                         alt="novaland"/> </a>
                    </div>
                    <div class="col-6 col-sm-4 col-md-3 col-lg-2" data-aos="zoom-in" data-aos-duration="1000"
                         data-aos-delay="500">
                        <a class="brand-item" href="http://www.tettrungthu.vn/" title="" target="_blank"
                           rel="noopener nofollow"> <img class="lazyload" src="{{$config->static}}/assets/Banner/12.jpg"
                                                         alt="tettrungthu"/> </a>
                    </div>
                    <div class="col-6 col-sm-4 col-md-3 col-lg-2" data-aos="zoom-in" data-aos-duration="1000"
                         data-aos-delay="500">
                        <a class="brand-item" href="http://www.sacombank.com.vn/Pages/default.aspx" title=""
                           target="_blank" rel="noopener nofollow"> <img class="lazyload"
                                                                         src="{{$config->static}}/assets/Banner/13.jpg"
                                                                         alt="sacombank"/> </a>
                    </div>
                    <div class="col-6 col-sm-4 col-md-3 col-lg-2" data-aos="zoom-in" data-aos-duration="1000"
                         data-aos-delay="500">
                        <a class="brand-item" href="http://www.datxanh.vn/" title="" target="_blank"
                           rel="noopener nofollow"> <img class="lazyload" src="{{$config->static}}/assets/Banner/14.jpg"
                                                         alt="datxanh"/>
                        </a>
                    </div>
                    <div class="col-6 col-sm-4 col-md-3 col-lg-2" data-aos="zoom-in" data-aos-duration="1000"
                         data-aos-delay="500">
                        <a class="brand-item" href="http://www.manulife.com.vn/" title="" target="_blank"
                           rel="noopener nofollow"> <img class="lazyload" src="{{$config->static}}/assets/Banner/15.jpg"
                                                         alt="manulife"/> </a>
                    </div>
                    <div class="col-6 col-sm-4 col-md-3 col-lg-2" data-aos="zoom-in" data-aos-duration="1000"
                         data-aos-delay="500">
                        <a class="brand-item" href="http://www.hiephoidoanhnghiep.vn/" title="" target="_blank"
                           rel="noopener nofollow"> <img class="lazyload" src="{{$config->static}}/assets/Banner/16.jpg"
                                                         alt="hiephoidoanhnghiep"/> </a>
                    </div>
                    <div class="col-6 col-sm-4 col-md-3 col-lg-2" data-aos="zoom-in" data-aos-duration="1000"
                         data-aos-delay="500">
                        <a class="brand-item" href="http://www.dai-ichi-life.com.vn/" title="" target="_blank"
                           rel="noopener nofollow"> <img class="lazyload" src="{{$config->static}}/assets/Banner/17.jpg"
                                                         alt="dai ichi life"/> </a>
                    </div>
                    <div class="col-6 col-sm-4 col-md-3 col-lg-2" data-aos="zoom-in" data-aos-duration="1000"
                         data-aos-delay="500">
                        <a class="brand-item" href="http://www.sacombank-sbr.com.vn/" title="" target="_blank"
                           rel="noopener nofollow"> <img class="lazyload" src="{{$config->static}}/assets/Banner/18.jpg"
                                                         alt="sacombank sbr"/> </a>
                    </div>
                    <div class="col-6 col-sm-4 col-md-3 col-lg-2" data-aos="zoom-in" data-aos-duration="1000"
                         data-aos-delay="500">
                        <a class="brand-item" href="http://www.anphuocgroup.vn/" title="" target="_blank"
                           rel="noopener nofollow"> <img class="lazyload" src="{{$config->static}}/assets/Banner/19.jpg"
                                                         alt="anphuocgroup"/> </a>
                    </div>
                    <div class="col-6 col-sm-4 col-md-3 col-lg-2" data-aos="zoom-in" data-aos-duration="1000"
                         data-aos-delay="500">
                        <a class="brand-item" href="http://www.belasspa.com/" title="" target="_blank"
                           rel="noopener nofollow"> <img class="lazyload" src="{{$config->static}}/assets/Banner/20.jpg"
                                                         alt="belasspa"/> </a>
                    </div>
                    <div class="col-6 col-sm-4 col-md-3 col-lg-2" data-aos="zoom-in" data-aos-duration="1000"
                         data-aos-delay="500">
                        <a class="brand-item" href="http://www.beton6.com/" title="" target="_blank"
                           rel="noopener nofollow"> <img class="lazyload" src="{{$config->static}}/assets/Banner/21.jpg"
                                                         alt="beton6"/>
                        </a>
                    </div>
                    <div class="col-6 col-sm-4 col-md-3 col-lg-2" data-aos="zoom-in" data-aos-duration="1000"
                         data-aos-delay="500">
                        <a class="brand-item" href="http://khudothisala.vn/" title="" target="_blank"
                           rel="noopener nofollow"> <img class="lazyload" src="{{$config->static}}/assets/Banner/22.jpg"
                                                         alt="khudothisala"/> </a>
                    </div>
                    <div class="col-6 col-sm-4 col-md-3 col-lg-2" data-aos="zoom-in" data-aos-duration="1000"
                         data-aos-delay="500">
                        <a class="brand-item" href="http://www.vinhtuong.com/" title="" target="_blank"
                           rel="noopener nofollow"> <img class="lazyload" src="{{$config->static}}/assets/Banner/23.jpg"
                                                         alt="vinhtuong"/> </a>
                    </div>
                    <div class="col-6 col-sm-4 col-md-3 col-lg-2" data-aos="zoom-in" data-aos-duration="1000"
                         data-aos-delay="500">
                        <a class="brand-item" href="http://www.erci.edu.vn/" title="" target="_blank"
                           rel="noopener nofollow"> <img class="lazyload" src="{{$config->static}}/assets/Banner/24.jpg"
                                                         alt="erci"/>
                        </a>
                    </div>
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
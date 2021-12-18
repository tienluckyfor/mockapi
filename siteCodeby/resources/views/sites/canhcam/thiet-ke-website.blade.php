@extends($config->layout.'/master') @section('main')

    <link href="{{$config->static}}/theme/custom/css/global.min.css" rel="stylesheet" type="text/css" />
    <link href="{{$config->static}}/theme/custom/css/core.min.css" rel="stylesheet" type="text/css" />
    <link href="{{$config->static}}/theme/custom/css/main.min.css" rel="stylesheet" type="text/css" />
    @include($config->view.'/components/css-custom')

    {{--<style>
        main{
            margin-top: 0;
            padding-top: 0;
        }
        .service-english-banner .banner-caption-overlay *{
            color:#fff;
        }
    </style>--}}
    <main>
        <section class="service-english-banner">
            <div class="banner-wrap">
                <div class="banner-img">
                    <img class="lazyload srcset lazyloaded" sizes="100vw" src="{{$config->static}}/assets/images/uploaded/banner/thiet-ke-website-top-banner-min-1024.jpg" alt="Giúp web của bạn bán hàng và thu hút khách hàng hiệu quả!" />
                </div>
                <div class="banner-caption-overlay">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="content leading-snug">
                                    <div class="title"><h2>Giúp web của bạn bán hàng và thu hút khách hàng hiệu quả</h2></div>
                                    <div class="desc">
                                        <p>
                                            Dịch vụ thiết kế website Bán Hàng CHUẨN SEO TPHCM<br />
                                            ☎️ 0286 273 0815 ✔️✔️ không chỉ đẹp mắt mà còn mang về nhiều lượt truy cập, nhiều đơn hàng. <br />
                                            Đội ngũ thiết kế web luôn chăm chút từ nội dung, chức năng đến cả cách thức vận hành.
                                        </p>
                                    </div>
                                    <a class="btn btn-icon-right" id="service-first-phone-call" href="tel:028 6273 0815"><span>Gọi cho chúng tôi</span><em class="lnr lnr-arrow-right"></em></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="service-vietnamse-2 section">
            <div class="container">
                <div class="row justify-center no-gutter">
                    <div class="col-lg-12">
                        <h1 class="section-title text-center">Dịch vụ thiết kế website chuyên nghiệp - Cánh Cam</h1>
                        <div class="section-desc text-center leading-snug">
                            <p>
                                Khám phá cách <b>Công ty thiết kế website trọn gói chuẩn seo</b> Cánh Cam giúp khách hàng bán hàng trực tuyến hiệu quả<br />
                                và tạo ấn tượng thương hiệu tốt hơn qua các dự án nổi bật dưới đây.
                            </p>
                        </div>
                        <div class="divider-line"></div>
                    </div>
                </div>
                <div class="list-item">
                    <div class="item">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="img text-center"><img class="lazyload lazyloaded" src="{{$config->static}}/assets/images/uploaded/banner/1.png" alt="" /></div>
                            </div>
                            <div class="col-lg-6">
                                <h4 class="title"><b>Nâng cao uy tín thương hiệu</b></h4>
                                <div class="brief leading-snug">
                                    Xây dựng thương hiệu, nâng cao giá trị uy tín thương hiệu luôn là mục tiêu hàng đầu trong bản kế hoạch marketing của mỗi công ty. Và <b>thiết kế website chuẩn seo</b> chính là một trong những việc đầu tiên sẽ
                                    phải xúc tiến nếu muốn chương trình truyền thông của doanh nghiệp mình đạt hiệu quả cao.
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="img text-center"><img class="lazyload" src="{{$config->static}}/assets/images/uploaded/banner/2.png" alt="" /></div>
                            </div>
                            <div class="col-lg-6">
                                <h4 class="title"><b>Gia tăng hiệu quả kinh doanh</b></h4>
                                <div class="brief leading-snug">
                                    Với <b>thiết kế website bán hàng</b> tuỳ biến, Cánh Cam luôn đảm bảo doanh nghiệp của bạn sẽ không bỏ lỡ bất kì cơ hội nào để có thêm khách hàng và gia tăng doanh thu. Việc đăng sản phẩm mới có thể tiến hành
                                    ở nhiều địa điểm chỉ cần có smartphone, laptop hay tablet. Việc tiếp nhận, xử lí đơn hàng, trả lời phản hồi khách hàng sẽ được thông báo với bạn ngay lập tức để giải quyết kịp thời.
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="img text-center"><img class="lazyload" src="{{$config->static}}/assets/images/uploaded/banner/3.png" alt="" /></div>
                            </div>
                            <div class="col-lg-6">
                                <h4 class="title"><b>Website hoạt động thông minh</b></h4>
                                <div class="brief leading-snug">
                                    Tính thẩm mỹ trong lĩnh vực <b>thiết kế website&nbsp;trọn gói</b> thôi vẫn chưa đủ. Tại Công ty Cánh Cam, tính bảo mật và tốc độ truy cập luôn là mối quan tâm hàng đầu của các developer khi tạo ra một sản
                                    phẩm website. Do đó, chúng tôi định hướng lựa chọn nền tảng web ổn định, thông minh, bảo mật cao và được sử dụng rộng rãi trên toàn cầu. Gia tăng doanh số và xác lập vị thế là những gì bạn có thể nhận được
                                    khi lựa chọn dịch vụ <b>thiết kế web trọn gói</b> chuẩn seo chuyên nghiệp của Cánh Cam.
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        {{--<style>
            .service-english-3 *{
                color: #fff;
            }
        </style>--}}
        <section class="section service-english-3">
            <div class="container">
                <h2 class="section-title text-white text-center">Dịch vụ thiết kế website tại Cánh Cam có gì nổi bật?</h2>
                <div class="list-item">
                    <div class="row row-lg-5 row-sm-2">
                        <div class="w-100">
                            <div class="item">
                                <div class="icon"><img class="lazyload" src="{{$config->static}}/theme/custom/img/service-english/ic-shake-hand.png" /></div>
                                <div class="caption text-center">
                                    <h5 class="title">Tương thích mọi thiết bị</h5>
                                    <div class="brief"><b>Thiết kế web trọn gói chuẩn seo</b>&nbsp;với công nghệ responsive giúp website có thể tự động thích ứng trên mọi thiết bị, phát huy hết sức mạnh của nó. ☎️ 0286 273 0815</div>
                                </div>
                            </div>
                        </div>
                        <div class="w-100">
                            <div class="item">
                                <div class="icon"><img class="lazyload" src="{{$config->static}}/theme/custom/img/service-english/ic-quote.png" /></div>
                                <div class="caption text-center">
                                    <h5 class="title">Quản lý đơn giản</h5>
                                    <div class="brief">Hệ thống quản lý nội dung hiện đại, tiện lợi, đồng thời tối ưu dữ liệu để phù hợp hơn với mọi thiết bị. Giúp dễ dàng cập nhật và quản lý nội dung trên website của bạn.</div>
                                </div>
                            </div>
                        </div>
                        <div class="w-100">
                            <div class="item">
                                <div class="icon"><img class="lazyload" src="{{$config->static}}/theme/custom/img/service-english/ic-lock.png" /></div>
                                <div class="caption text-center">
                                    <h5 class="title">Chi phí hiệu quả</h5>
                                    <div class="brief">
                                        Cho dù nhu cầu thiết kế web trọn gói như thế nào thì động cơ quyết định vẫn là tiết kiệm nhiều chi phí. Nhiều đãi đi kèm giúp hạn chế mức chi phí bỏ ra của doanh nghiệp nhưng vẫn thu về hiệu quả cao nhất.
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="w-100">
                            <div class="item">
                                <div class="icon"><img class="lazyload" src="{{$config->static}}/theme/custom/img/service-english/ic-optimizing.png" /></div>
                                <div class="caption text-center">
                                    <h5 class="title">Tối ưu hoá SEO</h5>
                                    <div class="brief">Bố cục, cấu trúc trang tối ưu, mang lại hiệu quả trong việc SEO trên mọi thiết bị, giúp website có thứ hạng cao trên các công cụ tìm kiếm.</div>
                                </div>
                            </div>
                        </div>
                        <div class="w-100">
                            <div class="item">
                                <div class="icon"><img class="lazyload" src="{{$config->static}}/theme/custom/img/service-english/ic-optimizing.png" src="{{$config->static}}/assets/img/deafault-image_40x40.jpg" /></div>
                                <div class="caption text-center">
                                    <h5 class="title">Nâng cao trải nghiệm</h5>
                                    <div class="brief">Chúng tôi luôn thiết kế những website hướng đến sự thân thiện với người dùng, giúp tối đa hoá tỉ lệ chuyển đổi và gia tăng doanh số cho doanh nghiệp của bạn.</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section style="background-image: url({{$config->static}}/assets/images/uploaded/banner/bg-2-min.jpg);" class="service-english-4 section">
            <div class="container">
                <div class="row justify-center no-gutter">
                    <div class="col-lg-10">
                        <h2 class="section-title text-center">ĐẦY CẢM HỨNG, THÂN THIỆN VÀ ĐÁNG TIN CẬY!</h2>
                        <div class="section-desc text-center leading-snug">
                            <p>
                                Bằng cách tiếp cận sáng tạo được kết hợp công nghệ tiên phong và chất lượng quản lý tiêu chuẩn cao, Cánh Cam sẽ gieo sự tự tin vào trang web để bạn thực sự tỏa sáng khi đạt mục tiêu tăng doanh thu lẫn mức độ nhận
                                biết.
                            </p>
                            <a class="btn btn-icon-right btn-openpopup" href="/lien-lac#contactform"> <span>Báo giá</span><em class="lnr lnr-arrow-right"></em></a>
                        </div>
                    </div>
                </div>
                <div class="step-container">
                    <div class="row">
                        <div class="col-lg-8">
                            <div style="width: 85%;" class="step-circle-wrap">
                                <div class="step-circle">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 326.51 326.51">
                                        <circle cx="167" cy="163" r="150.26" style="fill: #fff;"></circle>
                                        <g id="step-1" class="step-number active">
                                            <path style="fill: #f1f6fa;" class="step-bg" d="M202.71,96.1A58,58,0,0,1,213.58,105a72.2,72.2,0,0,1,11.56,16.21h68.57c-8.83-26.08-23.89-46.94-43-62.06a127.38,127.38,0,0,0-19.35-12.6Z"></path>
                                            <g id="step-one-text" class="step-text" fill="#999">
                                                <path
                                                        d="M226,91h2.18a4.23,4.23,0,0,1,2.16.42,1.49,1.49,0,0,1,.67,1.35,1.65,1.65,0,0,1-.3,1,1.17,1.17,0,0,1-.78.49v0a1.47,1.47,0,0,1,1,.55,2,2,0,0,1-.4,2.57,3,3,0,0,1-1.87.54H226Zm1.48,2.77h.86a1.62,1.62,0,0,0,.88-.19.7.7,0,0,0,.27-.62.6.6,0,0,0-.3-.57,1.81,1.81,0,0,0-.93-.18h-.78Zm0,1.17v1.82h1a1.39,1.39,0,0,0,.9-.23.87.87,0,0,0,.3-.72c0-.58-.42-.87-1.25-.87Z"
                                                ></path>
                                                <path
                                                        d="M238.26,91v.9a.9.9,0,0,0,.52-.49,1.91,1.91,0,0,0,.17-.86h1.44l.07.1a3.47,3.47,0,0,1-.41,1.14,1.93,1.93,0,0,1-.69.64,3.16,3.16,0,0,1-1.1.35v2.74a2.62,2.62,0,0,1-.34,1.36,2.2,2.2,0,0,1-1,.89,3.51,3.51,0,0,1-1.55.31,3,3,0,0,1-2.09-.69,2.44,2.44,0,0,1-.75-1.89V91H234v4.39a1.53,1.53,0,0,0,.34,1.1,1.42,1.42,0,0,0,1.06.35,1.34,1.34,0,0,0,1.06-.37,1.56,1.56,0,0,0,.33-1.09V91Z"
                                                ></path>
                                                <path
                                                        d="M247.58,94.45a3.76,3.76,0,0,1-.86,2.67,3.73,3.73,0,0,1-4.93,0,4.57,4.57,0,0,1,0-5.34,3.24,3.24,0,0,1,2.49-.92,3.14,3.14,0,0,1,2.5,1c.3-.2.45-.63.45-1.31h1.44l.06.1a3.36,3.36,0,0,1-.51,1.33,2,2,0,0,1-.93.72A4.85,4.85,0,0,1,247.58,94.45Zm-5.1,0a2.92,2.92,0,0,0,.45,1.77,1.56,1.56,0,0,0,1.33.59c1.18,0,1.77-.78,1.77-2.36s-.59-2.36-1.76-2.36a1.57,1.57,0,0,0-1.34.6A2.87,2.87,0,0,0,242.48,94.45Zm.81-4v-.13a13.4,13.4,0,0,0,1.12-1.44h1.64v.1c-.17.16-.45.41-.85.74s-.71.57-.94.73Z"
                                                ></path>
                                                <path
                                                        d="M252.29,92.1a1.52,1.52,0,0,0-1.3.63,3,3,0,0,0-.45,1.75c0,1.56.58,2.34,1.75,2.34a5.38,5.38,0,0,0,1.78-.37V97.7a5.09,5.09,0,0,1-1.92.35,2.91,2.91,0,0,1-2.33-.92,3.92,3.92,0,0,1-.81-2.66,4.29,4.29,0,0,1,.4-1.91,2.85,2.85,0,0,1,1.14-1.26,3.35,3.35,0,0,1,1.74-.43,4.7,4.7,0,0,1,2.05.49l-.48,1.2c-.26-.12-.53-.23-.79-.32A2.38,2.38,0,0,0,252.29,92.1Z"
                                                ></path>
                                                <path d="M261.27,98H259.8V93.25l0-.73a4.39,4.39,0,0,1-.51.48l-.8.65-.71-.89L260.06,91h1.21Z"></path>
                                            </g>
                                            <line x1="231.16" y1="46.63" x2="202.71" y2="95.96" style="fill: #231f20; stroke: #231f20; stroke-miterlimit: 10; stroke-width: 1px; opacity: 0.5;"></line>
                                        </g>
                                        <g id="step-2" class="step-number">
                                            <path
                                                    style="fill: #f1f6fa;"
                                                    class="step-bg"
                                                    d="M125.42,98.75a68.75,68.75,0,0,1,25-10.65,77.37,77.37,0,0,1,15.8-1.62c14.39,0,26.45,3.24,36.49,9.62l28.65-49.57a138.41,138.41,0,0,0-65.14-15.77,140.88,140.88,0,0,0-27.42,2.68A132.8,132.8,0,0,0,97,49.42Z"
                                            ></path>
                                            <g id="step-two-text" class="step-text" fill="#999">
                                                <path
                                                        d="M146.19,60.25h2.18a4.23,4.23,0,0,1,2.16.42A1.48,1.48,0,0,1,151.2,62a1.74,1.74,0,0,1-.29,1,1.16,1.16,0,0,1-.79.48v0a1.51,1.51,0,0,1,1,.55,2,2,0,0,1-.39,2.58,3.06,3.06,0,0,1-1.88.53h-2.62ZM147.67,63h.87a1.52,1.52,0,0,0,.87-.19.69.69,0,0,0,.27-.61.62.62,0,0,0-.3-.58,1.83,1.83,0,0,0-.93-.17h-.78Zm0,1.18V66h1a1.38,1.38,0,0,0,.9-.24.83.83,0,0,0,.3-.71c0-.58-.42-.87-1.25-.87Z"
                                                ></path>
                                                <path
                                                        d="M158.46,60.25v.9a.89.89,0,0,0,.53-.48,2.08,2.08,0,0,0,.16-.87h1.44l.07.11a3.32,3.32,0,0,1-.41,1.13,2,2,0,0,1-.69.65,3.17,3.17,0,0,1-1.1.34v2.75a2.6,2.6,0,0,1-.34,1.35,2.3,2.3,0,0,1-1,.9,3.73,3.73,0,0,1-1.55.31,3,3,0,0,1-2.1-.69,2.43,2.43,0,0,1-.74-1.89V60.25h1.47v4.4a1.55,1.55,0,0,0,.34,1.09,1.4,1.4,0,0,0,1.06.35,1.37,1.37,0,0,0,1.06-.36,1.6,1.6,0,0,0,.33-1.09V60.25Z"
                                                ></path>
                                                <path
                                                        d="M167.79,63.74a3.8,3.8,0,0,1-.87,2.67,3.73,3.73,0,0,1-4.93,0,3.85,3.85,0,0,1-.86-2.68,3.76,3.76,0,0,1,.86-2.66,3.24,3.24,0,0,1,2.49-.93,3.14,3.14,0,0,1,2.5,1c.3-.19.45-.63.45-1.31h1.44l.06.11a3.37,3.37,0,0,1-.51,1.32,2,2,0,0,1-.93.72A4.86,4.86,0,0,1,167.79,63.74Zm-5.11,0a2.87,2.87,0,0,0,.45,1.76,1.54,1.54,0,0,0,1.33.59c1.18,0,1.77-.78,1.77-2.35s-.59-2.37-1.76-2.37a1.57,1.57,0,0,0-1.34.6A2.92,2.92,0,0,0,162.68,63.74Zm.81-4.05v-.13a13.4,13.4,0,0,0,1.12-1.44h1.64v.1c-.17.17-.45.41-.85.74s-.71.57-.94.73Z"
                                                ></path>
                                                <path
                                                        d="M172.49,61.38a1.49,1.49,0,0,0-1.29.63,2.92,2.92,0,0,0-.46,1.76c0,1.55.58,2.33,1.75,2.33a5.71,5.71,0,0,0,1.79-.36V67a5,5,0,0,1-1.93.36,2.93,2.93,0,0,1-2.33-.93,3.89,3.89,0,0,1-.81-2.65,4.23,4.23,0,0,1,.4-1.91,2.8,2.8,0,0,1,1.14-1.26,3.38,3.38,0,0,1,1.74-.44,4.7,4.7,0,0,1,2,.49l-.48,1.21a7.75,7.75,0,0,0-.79-.33A2.38,2.38,0,0,0,172.49,61.38Z"
                                                ></path>
                                                <path
                                                        d="M182.71,67.24h-4.89v-1l1.76-1.77c.51-.53.85-.9,1-1.11a2.25,2.25,0,0,0,.35-.57,1.44,1.44,0,0,0,.1-.54.79.79,0,0,0-.23-.63.88.88,0,0,0-.62-.21,1.87,1.87,0,0,0-.79.19,4.08,4.08,0,0,0-.8.53l-.8-1a5.44,5.44,0,0,1,.86-.62,2.84,2.84,0,0,1,.74-.28,3.59,3.59,0,0,1,.9-.1,2.63,2.63,0,0,1,1.15.24,1.77,1.77,0,0,1,.78.67,1.73,1.73,0,0,1,.28,1,2.27,2.27,0,0,1-.17.91,3.7,3.7,0,0,1-.52.87,14.24,14.24,0,0,1-1.26,1.27l-.9.84V66h3.05Z"
                                                ></path>
                                            </g>
                                            <line x1="96.97" y1="49.42" x2="125.42" y2="98.75" style="fill: #231f20; stroke: #231f20; stroke-miterlimit: 10; stroke-width: 1px; opacity: 0.5;"></line>
                                        </g>
                                        <g id="step-3" class="step-number">
                                            <path
                                                    style="fill: #f1f6fa;"
                                                    class="step-bg"
                                                    d="M94,162.8a85.45,85.45,0,0,1,6.46-33.13,69.77,69.77,0,0,1,24.94-30.92L97,49.42a130.11,130.11,0,0,0-49.75,53.11A133.57,133.57,0,0,0,32.8,163.24c0,.36.05.71.06,1.06l61.23,0C94.08,163.82,94,163.32,94,162.8Z"
                                            ></path>
                                            <g id="step-three-text" class="step-text" fill="#999">
                                                <path
                                                        d="M57.37,112.64h2.18a4.23,4.23,0,0,1,2.16.42,1.47,1.47,0,0,1,.67,1.35,1.74,1.74,0,0,1-.29,1,1.2,1.2,0,0,1-.78.48v0a1.51,1.51,0,0,1,.95.55,1.77,1.77,0,0,1,.3,1.08,1.8,1.8,0,0,1-.69,1.5,3,3,0,0,1-1.88.53H57.37Zm1.49,2.77h.86a1.52,1.52,0,0,0,.87-.19.69.69,0,0,0,.27-.61.63.63,0,0,0-.29-.58,1.86,1.86,0,0,0-.93-.18h-.78Zm0,1.18v1.82h1a1.43,1.43,0,0,0,.91-.24.86.86,0,0,0,.29-.71c0-.58-.42-.87-1.25-.87Z"
                                                ></path>
                                                <path
                                                        d="M69.65,112.64v.9a.91.91,0,0,0,.52-.48,2.08,2.08,0,0,0,.17-.87h1.43l.07.11a3.4,3.4,0,0,1-.41,1.13,2,2,0,0,1-.69.65,3.33,3.33,0,0,1-1.09.34v2.74a2.62,2.62,0,0,1-.35,1.36,2.3,2.3,0,0,1-1,.9,3.73,3.73,0,0,1-1.55.31,3,3,0,0,1-2.1-.69,2.49,2.49,0,0,1-.74-1.9v-4.5h1.47V117a1.56,1.56,0,0,0,.34,1.1,1.41,1.41,0,0,0,1.07.35,1.36,1.36,0,0,0,1-.36,1.6,1.6,0,0,0,.33-1.09v-4.39Z"
                                                ></path>
                                                <path
                                                        d="M79,116.13a3.8,3.8,0,0,1-.86,2.66,3.72,3.72,0,0,1-4.94,0,3.81,3.81,0,0,1-.86-2.67,3.76,3.76,0,0,1,.87-2.67,3.24,3.24,0,0,1,2.48-.92,3.13,3.13,0,0,1,2.5,1c.3-.19.45-.63.45-1.31h1.44l.07.11a3.53,3.53,0,0,1-.52,1.32,2,2,0,0,1-.92.72A5.09,5.09,0,0,1,79,116.13Zm-5.11,0a2.87,2.87,0,0,0,.45,1.76,1.55,1.55,0,0,0,1.33.59c1.18,0,1.77-.78,1.77-2.35s-.59-2.37-1.76-2.37a1.57,1.57,0,0,0-1.34.6A2.9,2.9,0,0,0,73.86,116.13Zm.81-4V112a13.84,13.84,0,0,0,1.13-1.44h1.63v.1a11.06,11.06,0,0,1-.85.74c-.4.33-.71.57-.94.73Z"
                                                ></path>
                                                <path
                                                        d="M83.67,113.77a1.5,1.5,0,0,0-1.29.63,2.91,2.91,0,0,0-.46,1.75c0,1.56.58,2.34,1.75,2.34a5.71,5.71,0,0,0,1.79-.36v1.24a5,5,0,0,1-1.93.36,2.93,2.93,0,0,1-2.33-.93,3.91,3.91,0,0,1-.81-2.65,4.31,4.31,0,0,1,.4-1.92A2.82,2.82,0,0,1,81.93,113a3.31,3.31,0,0,1,1.74-.44,4.7,4.7,0,0,1,2,.49l-.48,1.21a6,6,0,0,0-.79-.33A2.38,2.38,0,0,0,83.67,113.77Z"
                                                ></path>
                                                <path
                                                        d="M93.62,114.2a1.69,1.69,0,0,1-.4,1.12,2.13,2.13,0,0,1-1.11.63v0a2.25,2.25,0,0,1,1.28.51,1.43,1.43,0,0,1,.43,1.1,1.88,1.88,0,0,1-.73,1.58,3.4,3.4,0,0,1-2.09.56,5.12,5.12,0,0,1-2-.38v-1.26a4.55,4.55,0,0,0,.9.34,4,4,0,0,0,1,.13,1.91,1.91,0,0,0,1.08-.25.91.91,0,0,0,.35-.8.72.72,0,0,0-.4-.7,2.91,2.91,0,0,0-1.28-.21h-.53v-1.13h.54a2.55,2.55,0,0,0,1.19-.21.77.77,0,0,0,.37-.73c0-.53-.33-.8-1-.8a2.19,2.19,0,0,0-.7.12,3.45,3.45,0,0,0-.79.4l-.69-1a3.8,3.8,0,0,1,2.28-.69A3,3,0,0,1,93,113,1.4,1.4,0,0,1,93.62,114.2Z"
                                                ></path>
                                            </g>
                                            <line x1="32.86" y1="164.3" x2="94.09" y2="164.33" style="fill: #231f20; stroke: #231f20; stroke-miterlimit: 10; stroke-width: 1px; opacity: 0.5;"></line>
                                        </g>
                                        <g id="step-4" class="step-number">
                                            <path
                                                    style="fill: #f1f6fa;"
                                                    class="step-bg"
                                                    d="M126.72,227.65a72.39,72.39,0,0,1-27.27-34.59,84.75,84.75,0,0,1-5.36-28.73l-61.23,0a130.28,130.28,0,0,0,11.76,53.18,132.73,132.73,0,0,0,53.82,59.15Z"
                                            ></path>
                                            <g id="step-four-text" class="step-text" fill="#999">
                                                <path
                                                        d="M57.37,204.65h2.18a4.23,4.23,0,0,1,2.16.42,1.47,1.47,0,0,1,.67,1.35,1.71,1.71,0,0,1-.29,1,1.22,1.22,0,0,1-.78.49v0a1.52,1.52,0,0,1,.95.56,2,2,0,0,1-.39,2.57,3,3,0,0,1-1.88.54H57.37Zm1.49,2.77h.86a1.6,1.6,0,0,0,.87-.19.7.7,0,0,0,.27-.62.61.61,0,0,0-.29-.57,1.86,1.86,0,0,0-.93-.18h-.78Zm0,1.17v1.82h1a1.44,1.44,0,0,0,.91-.23.89.89,0,0,0,.29-.72c0-.58-.42-.87-1.25-.87Z"
                                                ></path>
                                                <path
                                                        d="M69.65,204.65v.9a.92.92,0,0,0,.52-.49,2.06,2.06,0,0,0,.17-.86h1.43l.07.1a3.47,3.47,0,0,1-.41,1.14,1.93,1.93,0,0,1-.69.64,3.11,3.11,0,0,1-1.09.35v2.74a2.62,2.62,0,0,1-.35,1.36,2.22,2.22,0,0,1-1,.89,3.57,3.57,0,0,1-1.55.31,3,3,0,0,1-2.1-.69,2.47,2.47,0,0,1-.74-1.89v-4.5h1.47V209a1.57,1.57,0,0,0,.34,1.1,1.45,1.45,0,0,0,1.07.35,1.33,1.33,0,0,0,1-.37,1.56,1.56,0,0,0,.33-1.09v-4.38Z"
                                                ></path>
                                                <path
                                                        d="M79,208.13a3.81,3.81,0,0,1-.86,2.67,3.75,3.75,0,0,1-4.94,0,3.82,3.82,0,0,1-.86-2.68,3.76,3.76,0,0,1,.87-2.66,3.2,3.2,0,0,1,2.48-.92,3.13,3.13,0,0,1,2.5,1c.3-.2.45-.63.45-1.31h1.44l.07.1a3.51,3.51,0,0,1-.52,1.33,2,2,0,0,1-.92.72A5.07,5.07,0,0,1,79,208.13Zm-5.11,0a2.92,2.92,0,0,0,.45,1.77,1.57,1.57,0,0,0,1.33.59c1.18,0,1.77-.79,1.77-2.36s-.59-2.36-1.76-2.36a1.57,1.57,0,0,0-1.34.6A2.87,2.87,0,0,0,73.86,208.13Zm.81-4V204a13.84,13.84,0,0,0,1.13-1.44h1.63v.1c-.16.16-.45.41-.85.74s-.71.57-.94.73Z"
                                                ></path>
                                                <path
                                                        d="M83.67,205.78a1.5,1.5,0,0,0-1.29.63,2.89,2.89,0,0,0-.46,1.75c0,1.56.58,2.34,1.75,2.34a5.48,5.48,0,0,0,1.79-.37v1.25a5.18,5.18,0,0,1-1.93.35,2.92,2.92,0,0,1-2.33-.92,3.92,3.92,0,0,1-.81-2.66,4.26,4.26,0,0,1,.4-1.91A2.85,2.85,0,0,1,81.93,205a3.4,3.4,0,0,1,1.74-.43,4.7,4.7,0,0,1,2,.49l-.48,1.2a7.68,7.68,0,0,0-.79-.32A2.38,2.38,0,0,0,83.67,205.78Z"
                                                ></path>
                                                <path d="M94.05,210.19h-.84v1.45H91.76v-1.45h-3v-1l3.06-4.51h1.37V209h.84ZM91.76,209v-1.18q0-.3,0-.87c0-.37,0-.59,0-.65h0a4.77,4.77,0,0,1-.43.76L90.08,209Z"></path>
                                            </g>
                                            <line x1="98.44" y1="276.63" x2="126.72" y2="227.65" style="fill: #231f20; stroke: #231f20; stroke-miterlimit: 10; stroke-width: 1px; opacity: 0.5;"></line>
                                        </g>
                                        <g id="step-5" class="step-number">
                                            <path
                                                    style="fill: #f1f6fa;"
                                                    class="step-bg"
                                                    d="M201.68,231c-9.73,6.11-20.81,9-34.09,9a75.55,75.55,0,0,1-21-3,70.68,70.68,0,0,1-19.91-9.38l-28.28,49a136,136,0,0,0,33.74,14.31,138.94,138.94,0,0,0,35.88,4.81c23.13,0,44.19-5.08,62.56-14.58Z"
                                            ></path>
                                            <g id="step-five-text" class="step-text" fill="#999">
                                                <path
                                                        d="M146.19,264.41h2.18a4.22,4.22,0,0,1,2.16.43,1.46,1.46,0,0,1,.67,1.34,1.74,1.74,0,0,1-.29,1,1.21,1.21,0,0,1-.79.49v0a1.52,1.52,0,0,1,1,.56,2,2,0,0,1-.39,2.57,3,3,0,0,1-1.88.54h-2.62Zm1.48,2.77h.87a1.61,1.61,0,0,0,.87-.18.7.7,0,0,0,.27-.62.62.62,0,0,0-.3-.58,1.94,1.94,0,0,0-.93-.17h-.78Zm0,1.18v1.82h1a1.45,1.45,0,0,0,.9-.23.87.87,0,0,0,.3-.72c0-.58-.42-.87-1.25-.87Z"
                                                ></path>
                                                <path
                                                        d="M158.46,264.41v.9a.89.89,0,0,0,.53-.48,2.08,2.08,0,0,0,.16-.87h1.44l.07.11a3.47,3.47,0,0,1-.41,1.14,1.93,1.93,0,0,1-.69.64,3,3,0,0,1-1.1.34v2.75a2.62,2.62,0,0,1-.34,1.36,2.28,2.28,0,0,1-1,.89,3.57,3.57,0,0,1-1.55.31,3,3,0,0,1-2.1-.69,2.43,2.43,0,0,1-.74-1.89v-4.51h1.47v4.4a1.57,1.57,0,0,0,.34,1.1,1.44,1.44,0,0,0,1.06.35,1.34,1.34,0,0,0,1.06-.37,1.58,1.58,0,0,0,.33-1.09v-4.39Z"
                                                ></path>
                                                <path
                                                        d="M167.79,267.9a3.76,3.76,0,0,1-.87,2.67,3.73,3.73,0,0,1-4.93,0,4.57,4.57,0,0,1,0-5.34,3.24,3.24,0,0,1,2.49-.93,3.15,3.15,0,0,1,2.5,1q.45-.3.45-1.32h1.44l.06.11a3.42,3.42,0,0,1-.51,1.33,2,2,0,0,1-.93.72A4.81,4.81,0,0,1,167.79,267.9Zm-5.11,0a2.92,2.92,0,0,0,.45,1.77,1.56,1.56,0,0,0,1.33.59c1.18,0,1.77-.79,1.77-2.36s-.59-2.36-1.76-2.36a1.59,1.59,0,0,0-1.34.59A2.92,2.92,0,0,0,162.68,267.9Zm.81-4v-.13a13.4,13.4,0,0,0,1.12-1.44h1.64v.1c-.17.16-.45.41-.85.74s-.71.57-.94.73Z"
                                                ></path>
                                                <path
                                                        d="M172.49,265.55a1.49,1.49,0,0,0-1.29.63,2.89,2.89,0,0,0-.46,1.75c0,1.56.58,2.34,1.75,2.34a5.48,5.48,0,0,0,1.79-.37v1.24a5,5,0,0,1-1.93.36,3,3,0,0,1-2.33-.92,3.93,3.93,0,0,1-.81-2.66,4.26,4.26,0,0,1,.4-1.91,2.8,2.8,0,0,1,1.14-1.26,3.38,3.38,0,0,1,1.74-.44,4.72,4.72,0,0,1,2,.5l-.48,1.2a7.68,7.68,0,0,0-.79-.32A2.14,2.14,0,0,0,172.49,265.55Z"
                                                ></path>
                                                <path
                                                        d="M180.36,266.94a2.26,2.26,0,0,1,1.62.57,2,2,0,0,1,.6,1.56,2.26,2.26,0,0,1-.72,1.8,3,3,0,0,1-2.07.63,3.9,3.9,0,0,1-1.88-.38v-1.27a4.26,4.26,0,0,0,.88.33,4.05,4.05,0,0,0,1,.12q1.35,0,1.35-1.11c0-.7-.47-1.05-1.4-1.05a2.84,2.84,0,0,0-.56.05,3.65,3.65,0,0,0-.5.1l-.58-.31.26-3.57h3.79v1.26h-2.5l-.13,1.37.17,0A3,3,0,0,1,180.36,266.94Z"
                                                ></path>
                                            </g>
                                            <line x1="201.68" y1="230.99" x2="230.62" y2="281.17" style="fill: #231f20; stroke: #231f20; stroke-miterlimit: 10; stroke-width: 1px; opacity: 0.5;"></line>
                                        </g>
                                        <g id="step-6" class="step-number">
                                            <path
                                                    style="fill: #f1f6fa;"
                                                    class="step-bg"
                                                    d="M293.71,206.69H225.14a88.62,88.62,0,0,1-14.5,17.46,62.57,62.57,0,0,1-9,6.84l28.94,50.18a121.55,121.55,0,0,0,14.88-9C266.73,257,283.28,234.81,293.71,206.69Z"
                                            ></path>
                                            <g id="step-six-text" class="step-text" fill="#999">
                                                <path
                                                        d="M226,233.22h2.18a4.23,4.23,0,0,1,2.16.42A1.49,1.49,0,0,1,231,235a1.7,1.7,0,0,1-.3,1,1.19,1.19,0,0,1-.78.48v.05a1.51,1.51,0,0,1,1,.55,2,2,0,0,1-.4,2.57,3,3,0,0,1-1.87.54H226Zm1.48,2.77h.86a1.62,1.62,0,0,0,.88-.19.69.69,0,0,0,.27-.62.61.61,0,0,0-.3-.57,1.81,1.81,0,0,0-.93-.18h-.78Zm0,1.17V239h1a1.38,1.38,0,0,0,.9-.24.85.85,0,0,0,.3-.72c0-.58-.42-.87-1.25-.87Z"
                                                ></path>
                                                <path
                                                        d="M238.26,233.22v.9a.9.9,0,0,0,.52-.49,1.89,1.89,0,0,0,.17-.86h1.44l.07.1a3.47,3.47,0,0,1-.41,1.14,1.85,1.85,0,0,1-.69.64,3.16,3.16,0,0,1-1.1.35v2.74a2.62,2.62,0,0,1-.34,1.36,2.2,2.2,0,0,1-1,.89,3.51,3.51,0,0,1-1.55.32,3,3,0,0,1-2.09-.7,2.44,2.44,0,0,1-.75-1.89v-4.5H234v4.39a1.51,1.51,0,0,0,.34,1.1,1.42,1.42,0,0,0,1.06.35,1.37,1.37,0,0,0,1.06-.36,1.61,1.61,0,0,0,.33-1.1v-4.38Z"
                                                ></path>
                                                <path
                                                        d="M247.58,236.7a3.76,3.76,0,0,1-.86,2.67,3.7,3.7,0,0,1-4.93,0,4.57,4.57,0,0,1,0-5.34,3.28,3.28,0,0,1,2.49-.92,3.14,3.14,0,0,1,2.5,1c.3-.2.45-.63.45-1.31h1.44l.06.1a3.36,3.36,0,0,1-.51,1.33,2,2,0,0,1-.93.72A4.85,4.85,0,0,1,247.58,236.7Zm-5.1,0a2.92,2.92,0,0,0,.45,1.77,1.56,1.56,0,0,0,1.33.59c1.18,0,1.77-.78,1.77-2.36s-.59-2.36-1.76-2.36a1.57,1.57,0,0,0-1.34.6A2.87,2.87,0,0,0,242.48,236.7Zm.81-4v-.13a13.4,13.4,0,0,0,1.12-1.44h1.64v.1c-.17.17-.45.41-.85.74s-.71.57-.94.73Z"
                                                ></path>
                                                <path
                                                        d="M252.29,234.35a1.52,1.52,0,0,0-1.3.63,3,3,0,0,0-.45,1.75c0,1.56.58,2.34,1.75,2.34a5.38,5.38,0,0,0,1.78-.37V240a4.9,4.9,0,0,1-1.92.36,2.91,2.91,0,0,1-2.33-.93,3.92,3.92,0,0,1-.81-2.66,4.29,4.29,0,0,1,.4-1.91,2.9,2.9,0,0,1,1.14-1.26,3.35,3.35,0,0,1,1.74-.43,4.7,4.7,0,0,1,2.05.49l-.48,1.2c-.26-.12-.53-.23-.79-.32A2.38,2.38,0,0,0,252.29,234.35Z"
                                                ></path>
                                                <path
                                                        d="M257.57,237.24a4.61,4.61,0,0,1,.88-3.09,3.27,3.27,0,0,1,2.63-1,4.5,4.5,0,0,1,.93.07v1.18a4,4,0,0,0-.84-.1,3,3,0,0,0-1.24.23,1.58,1.58,0,0,0-.72.68,3.16,3.16,0,0,0-.28,1.28H259a1.63,1.63,0,0,1,1.52-.81,1.9,1.9,0,0,1,1.47.58,2.39,2.39,0,0,1,.53,1.63,2.42,2.42,0,0,1-.63,1.77,2.33,2.33,0,0,1-1.75.66,2.53,2.53,0,0,1-1.36-.36,2.37,2.37,0,0,1-.89-1A4.13,4.13,0,0,1,257.57,237.24Zm2.53,1.88a.87.87,0,0,0,.72-.31,1.45,1.45,0,0,0,.26-.91,1.26,1.26,0,0,0-.24-.81.88.88,0,0,0-.71-.29,1.12,1.12,0,0,0-.77.29.91.91,0,0,0-.32.68,1.53,1.53,0,0,0,.3,1A.92.92,0,0,0,260.1,239.12Z"
                                                ></path>
                                            </g>
                                        </g>
                                    </svg>
                                </div>
                                <div class="step-overlay">
                                    <div class="step-overlay-item" id="step-1" style="display: block;">
                                        <div style="font-size: 2rem;" class="title">Bước 01</div>
                                        <div class="brief">Thảo luận về dự án</div>
                                    </div>
                                    <div class="step-overlay-item" id="step-2" style="display: none;">
                                        <div style="font-size: 2rem;" class="title">Bước 02</div>
                                        <div class="brief">LẬP KẾ HOẠCH</div>
                                    </div>
                                    <div class="step-overlay-item" id="step-3" style="display: none;">
                                        <div style="font-size: 2rem;" class="title">Bước 03</div>
                                        <div class="brief">THIẾT KẾ</div>
                                    </div>
                                    <div class="step-overlay-item" id="step-4" style="display: none;">
                                        <div style="font-size: 2rem;" class="title">Bước 04</div>
                                        <div class="brief">LẬP TRÌNH</div>
                                    </div>
                                    <div class="step-overlay-item" id="step-5" style="display: none;">
                                        <div style="font-size: 2rem;" class="title">Bước 05</div>
                                        <div class="brief">VIẾT NỘI DUNG</div>
                                    </div>
                                    <div class="step-overlay-item" id="step-6" style="display: none;">
                                        <div style="font-size: 2rem;" class="title">Bước 06</div>
                                        <div class="brief">CHẠY CHÍNH THỨC</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="step-content-wrap">
                                <div class="step-content" id="step-1" style="display: block;">
                                    <div class="content">
                                        <div class="title"><strong class="step">Bước 1: </strong>Thảo luận về dự án</div>
                                        <div class="subtitle">Thấu hiểu nhanh, hành động kịp thời.</div>
                                        <div class="text article-content">
                                            <p>
                                                Trước khi triển khai dự án, chúng tôi dành thời gian để đánh giá mục tiêu, động lực và yêu cầu đặt ra. Tất cả các vị trí tại Cánh Cam từ bộ phận thiết kế cho đến lập trình đều tham gia vào cả giai
                                                đoạn trình bày lẫn giai đoạn đánh giá ban đầu của mỗi dự án.
                                            </p>
                                            <ul>
                                                <li>Thiết lập mục tiêu và chỉ số KPI</li>
                                                <li>Phân tích các kênh truyền thông</li>
                                                <li>Phân tích đối thủ cạnh tranh</li>
                                                <li>Phân tích khách hàng mục tiêu</li>
                                                <li>Tương tác người dùng</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="step-content" id="step-2" style="display: none;">
                                    <div class="content">
                                        <div class="title"><strong class="step">Bước 2: </strong>Lập kế hoạch</div>
                                        <div class="subtitle">Nguồn tài nguyên giá trị nhất của doanh nghiệp là thời gian.</div>
                                        <div class="text article-content">
                                            <p>
                                                Do đó, việc hoạch định chi tiết là vô cùng cần thiết. Cánh Cam sẽ để khách hàng tham gia vào quá trình hoạch định quan trọng này, chia sẻ thông tin có liên quan đến dự án cũng như thảo luận trước
                                                về những rủi ro có thể xảy ra.
                                            </p>
                                            <ul>
                                                <li>Lên kế hoạch dự án và nội dung</li>
                                                <li>Xác định diện mạo người dùng và các giai đoạn mua hàng</li>
                                                <li>Phân loại và cấu trúc thông tin</li>
                                                <li>Hệ thống các giải pháp</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="step-content" id="step-3" style="display: none;">
                                    <div class="content">
                                        <div class="title"><strong class="step">Bước 3: </strong>Thiết kế</div>
                                        <div class="subtitle">Phá vỡ mọi quy tắc thông thường</div>
                                        <div class="text article-content">
                                            <p>
                                                Hơn ai hết Cánh Cam hiểu được người dùng mục tiêu mới là người quyết định tính hiệu quả của trang web. Vì thế chúng tôi luôn chủ động tiếp cận để nắm bắt những ham muốn tiềm ẩn của người dùng và
                                                hình thành bức tranh tổng thể nhằm đưa ra một thiết kế hoàn toàn khác biệt và mới lạ so với các đối thủ trong ngành nhưng vẫn đảm bảo giá trị UX,UI cho người dùng, giúp doanh nghiệp trở nên khác
                                                biệt và nổi bật.
                                            </p>
                                            <ul>
                                                <li>Xác định đối tượng khách hàng mục tiêu</li>
                                                <li>Nắm bắt thế mạnh của thương hiệu, sản phẩm</li>
                                                <li>Định hình phong cách, xu thế, điểm nhấn &amp; tính vượt trội</li>
                                                <li>Vẽ giao diện đồ họa</li>
                                                <li>Sáng tạo hiệu ứng &amp; tương tác mobile</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="step-content" id="step-4" style="display: none;">
                                    <div class="content">
                                        <div class="title"><strong class="step">Bước 4: </strong>Lập trình</div>
                                        <div class="subtitle">Biến mọi ý tưởng thành hiện thực.</div>
                                        <div class="text article-content">
                                            <p>
                                                Cánh Cam lập trình web-core trên nền tảng tân tiến nhất hiện nay, mang lại thuận tiện cho nhà quản trị web. Dễ dàng tích hợp các hệ thống như ERP, CRM, Digital Marketing, Cổng thanh toán, đối tác
                                                giao nhận, Sàn TMĐT... Tối ưu tốc độ load web &amp; tiêu chí SEO là những ưu tiên hàng đầu.
                                            </p>
                                            <ul>
                                                <li>Lập trình giao diện người dùng front-end</li>
                                                <li>Lập trình khối chức năng, tiện ích của website</li>
                                                <li>Lập trình phần mềm quản trị tổng thể web (CMS)</li>
                                                <li>Tích hợp các hệ thống (API) bên ngoài vào website</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="step-content" id="step-5" style="display: none;">
                                    <div class="content">
                                        <div class="title"><strong class="step">Bước 5: </strong>Viết nội dung</div>
                                        <div class="subtitle">Nội dung là trái tim của website</div>
                                        <div class="text article-content">
                                            <p>
                                                Thiết kế website đẹp thôi là chưa đủ, quan trọng nhất là phải thể hiện được điều khách hàng cần – nội dung tiếp thị và trải nghiệm sản phẩm/dịch vụ trên kênh online. Cánh Cam luôn bắt đầu mỗi dự
                                                án từ việc lên chiến lược nội dung bài bản gồm mục đích, mục tiêu và lộ trình đi đến thành công. Nhờ nội dung ấn tượng, dịch vụ/sản phẩm của bạn sẽ được thể hiện chi tiết, dễ hiểu, gần gũi, súc
                                                tích và khác biệt so với đối thủ cạnh tranh.
                                            </p>
                                            <ul>
                                                <li>Hoạch định nội dung và xác định keyword</li>
                                                <li>Sáng tạo và Sản xuất nội dung</li>
                                                <li>Tối ưu hóa công cụ tìm kiếm</li>
                                                <li>Ứng dụng vào thiết kế website</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="step-content" id="step-6" style="display: none;">
                                    <div class="content">
                                        <div class="title"><strong class="step">Bước 6: </strong>Chạy chính thức</div>
                                        <div class="subtitle">Tận hưởng thành quả xứng đáng</div>
                                        <div class="text article-content">
                                            <p>
                                                Chọn Cánh Cam, bạn hoàn toàn có thể yên tâm về một trang web xứng tầm, xác lập được vị thế của doanh nghiệp bạn trên thị trường. Chúng tôi sẵn lòng trở thành người bạn đồng hành cùng chặng đường
                                                phát triển thương hiệu online của doanh nghiệp bắt đầu từ lúc website vận hành chính thức.
                                            </p>
                                            <ul>
                                                <li>Hoạch định nội dung và xác định keyword</li>
                                                <li>Sáng tạo và Sản xuất nội dung</li>
                                                <li>Tối ưu hóa công cụ tìm kiếm</li>
                                                <li>Ứng dụng vào thiết kế website</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="service-vietnamse-5 section">
            <div class="container">
                <div class="row justify-center no-gutter">
                    <div class="col-lg-10">
                        <h2 class="section-title text-center">TẠI CÁNH CAM, BẠN SẼ CÓ NHIỀU SỰ LỰA CHỌN</h2>
                    </div>
                </div>
                <div class="blog-list blog-slider">
                    <div class="swiper-container swiper-container-initialized swiper-container-horizontal swiper-container-multirow">
                        <div class="swiper-wrapper" style="width: 1661px; transform: translate3d(0px, 0px, 0px);">
                            <div class="swiper-slide swiper-slide-active" data-swiper-column="0" data-swiper-row="0" style="order: 0; width: 251.75px; margin-right: 25px;">
                                <figure>
                                    <a class="blog-img" href="/thiet-ke-website-bat-dong-san" target="_self" title="Thiết kế website bất động sản">
                                        <img class="lazyload" data-src="{{$config->static}}/assets/images/thumbs/6150cc3f1f442a1455577559_thiet-ke-website-bat-dong-san-cao-cap-can-chu-y-dieu-gi.jpeg" src="{{$config->static}}/assets/img/deafault-image.jpg" />
                                    </a>
                                    <figcaption class="text-center">
                                        <h3 class="blog-name">
                                            <a href="/thiet-ke-website-bat-dong-san" target="_self" title="Thiết kế website bất động sản">Thiết kế website bất động sản</a>
                                        </h3>
                                        <p class="blog-des">
                                            Thiết kế website bất động sản là một trong những phương pháp hàng đầu trong việc kinh doanh bất động sản, nhà đất.
                                        </p>
                                    </figcaption>
                                </figure>
                            </div>
                            <div class="swiper-slide swiper-slide-next" data-swiper-column="0" data-swiper-row="1" style="-webkit-box-ordinal-group: 6; order: 6; margin-top: 25px; width: 251.75px; margin-right: 25px;">
                                <figure>
                                    <a class="blog-img" href="/thiet-ke-website-ngan-hang" target="_self" title="Thiết kế website tài chính - ngân hàng">
                                        <img class="lazyload" data-src="{{$config->static}}/assets/images/thumbs/6150cc3f1f442a1455577560_thiet-ke-website-ngan-hang-chuyen-nghiep.jpeg" src="{{$config->static}}/assets/img/deafault-image.jpg" />
                                    </a>
                                    <figcaption class="text-center">
                                        <h3 class="blog-name">
                                            <a href="/thiet-ke-website-ngan-hang" target="_self" title="Thiết kế website tài chính - ngân hàng">Thiết kế website tài chính - ngân hàng</a>
                                        </h3>
                                        <p class="blog-des">
                                            Sở hữu trang web chính thống, mạnh mẽ, phản ánh hoạt động của ngân hàng là điều cần thiết phải lưu ý.
                                        </p>
                                    </figcaption>
                                </figure>
                            </div>
                            <div class="swiper-slide" data-swiper-column="1" data-swiper-row="0" style="-webkit-box-ordinal-group: 1; order: 1; width: 251.75px; margin-right: 25px;">
                                <figure>
                                    <a class="blog-img" href="/thiet-ke-website-dau-khi" target="_self" title="Thiết kế website dầu khí">
                                        <img class="lazyload" data-src="{{$config->static}}/assets/images/thumbs/6150cc3f1f442a1455577565_thiet-ke-website-dau-khi-chuyen-nghiep-an-tuong.jpeg" src="{{$config->static}}/assets/img/deafault-image.jpg" />
                                    </a>
                                    <figcaption class="text-center">
                                        <h3 class="blog-name">
                                            <a href="/thiet-ke-website-dau-khi" target="_self" title="Thiết kế website dầu khí">Thiết kế website dầu khí</a>
                                        </h3>
                                        <p class="blog-des">
                                            Thiết kế website dầu khí chuyên nghiệp, ấn tượng sẽ giúp doanh nghiệp của bạn tăng tính cạnh tranh hơn trên thị trường online hiện nay.
                                        </p>
                                    </figcaption>
                                </figure>
                            </div>
                            <div class="swiper-slide" data-swiper-column="1" data-swiper-row="1" style="-webkit-box-ordinal-group: 7; order: 7; margin-top: 25px; width: 251.75px; margin-right: 25px;">
                                <figure>
                                    <a class="blog-img" href="/thiet-ke-website-thoi-trang" target="_self" title="Thiết kế website thời trang- may mặc">
                                        <img class="lazyload" data-src="{{$config->static}}/assets/images/thumbs/6150cc3f1f442a145557756f.jpeg" src="{{$config->static}}/assets/img/deafault-image.jpg" />
                                    </a>
                                    <figcaption class="text-center">
                                        <h3 class="blog-name">
                                            <a href="/thiet-ke-website-thoi-trang" target="_self" title="Thiết kế website thời trang- may mặc">Thiết kế website thời trang- may mặc</a>
                                        </h3>
                                        <p class="blog-des">
                                            Để kinh doanh thời trang thành công, việc thiết kế website thời trang, may mặc là hết sức cần thiết.
                                        </p>
                                    </figcaption>
                                </figure>
                            </div>
                            <div class="swiper-slide" data-swiper-column="2" data-swiper-row="0" style="-webkit-box-ordinal-group: 2; order: 2; width: 251.75px; margin-right: 25px;">
                                <figure>
                                    <a class="blog-img" href="/thiet-ke-website-khach-san" target="_self" title="Thiết kế website khách sạn - Resort">
                                        <img class="lazyload" data-src="{{$config->static}}/assets/images/thumbs/6150cc3f1f442a1455577574.jpeg" src="{{$config->static}}/assets/img/deafault-image.jpg" />
                                    </a>
                                    <figcaption class="text-center">
                                        <h3 class="blog-name">
                                            <a href="/thiet-ke-website-khach-san" target="_self" title="Thiết kế website khách sạn - Resort">Thiết kế website khách sạn - Resort</a>
                                        </h3>
                                        <p class="blog-des">
                                            Cánh Cam mang đến những mẫu thiết kế website khách sạn có giao diện đẹp, tích hợp đầy đủ tính năng.
                                        </p>
                                    </figcaption>
                                </figure>
                            </div>
                            <div class="swiper-slide" data-swiper-column="2" data-swiper-row="1" style="-webkit-box-ordinal-group: 8; order: 8; margin-top: 25px; width: 251.75px; margin-right: 25px;">
                                <figure>
                                    <a class="blog-img" href="/thiet-ke-website-san-xuat-cong-nghiep" target="_self" title="Thiết kế website sản xuất công nghiệp">
                                        <img class="lazyload" data-src="{{$config->static}}/assets/images/thumbs/6150cc3f1f442a1455577579.jpeg" src="{{$config->static}}/assets/img/deafault-image.jpg" />
                                    </a>
                                    <figcaption class="text-center">
                                        <h3 class="blog-name">
                                            <a href="/thiet-ke-website-san-xuat-cong-nghiep" target="_self" title="Thiết kế website sản xuất công nghiệp">Thiết kế website sản xuất công nghiệp</a>
                                        </h3>
                                        <p class="blog-des">
                                            Để tìm kiếm đối tác mới hoặc phục vụ cho việc truyền thông thương hiệu cần thực hiện thiết kế website sản xuất công nghiệp.
                                        </p>
                                    </figcaption>
                                </figure>
                            </div>
                            <div class="swiper-slide" data-swiper-column="3" data-swiper-row="0" style="-webkit-box-ordinal-group: 3; order: 3; width: 251.75px; margin-right: 25px;">
                                <figure>
                                    <a class="blog-img" href="/thiet-ke-website-benh-vien" target="_self" title="Thiết kế website bệnh viện">
                                        <img class="lazyload" data-src="{{$config->static}}/assets/images/thumbs/6150cc421f442a145557778f.jpeg" src="{{$config->static}}/assets/img/deafault-image.jpg" />
                                    </a>
                                    <figcaption class="text-center">
                                        <h3 class="blog-name">
                                            <a href="/thiet-ke-website-benh-vien" target="_self" title="Thiết kế website bệnh viện">Thiết kế website bệnh viện</a>
                                        </h3>
                                        <p class="blog-des">
                                            Bất kể doanh nghiệp nào muốn khai thác hết tiềm năng trong ngành của mình đều cần có sự hỗ trợ từ các nền tảng trực tuyến.
                                        </p>
                                    </figcaption>
                                </figure>
                            </div>
                            <div class="swiper-slide" data-swiper-column="3" data-swiper-row="1" style="-webkit-box-ordinal-group: 9; order: 9; margin-top: 25px; width: 251.75px; margin-right: 25px;">
                                <figure>
                                    <a class="blog-img" href="/thiet-ke-website-logistic" target="_self" title="Thiết kế website Logistic">
                                        <img class="lazyload" data-src="{{$config->static}}/assets/images/thumbs/6150cc421f442a1455577799.jpeg" src="{{$config->static}}/assets/img/deafault-image.jpg" />
                                    </a>
                                    <figcaption class="text-center">
                                        <h3 class="blog-name">
                                            <a href="/thiet-ke-website-logistic" target="_self" title="Thiết kế website Logistic">Thiết kế website Logistic</a>
                                        </h3>
                                        <p class="blog-des">
                                            Để phát triển ngành kinh doanh dịch vụ vận tải, doanh nghiệp cần thiết kế web Logistic chuyên nghiệp.
                                        </p>
                                    </figcaption>
                                </figure>
                            </div>
                            <div class="swiper-slide" data-swiper-column="4" data-swiper-row="0" style="-webkit-box-ordinal-group: 4; order: 4; width: 251.75px; margin-right: 25px;">
                                <figure>
                                    <a class="blog-img" href="/thiet-ke-website-yen-sao" target="_self" title="Thiết kế website yến sào">
                                        <img class="lazyload" data-src="{{$config->static}}/assets/images/thumbs/6150cc421f442a14555777a3.jpeg" src="{{$config->static}}/assets/img/deafault-image.jpg" />
                                    </a>
                                    <figcaption class="text-center">
                                        <h3 class="blog-name">
                                            <a href="/thiet-ke-website-yen-sao" target="_self" title="Thiết kế website yến sào">Thiết kế website yến sào</a>
                                        </h3>
                                        <p class="blog-des">
                                            Cánh Cam cung cấp dịch vụ thiết kế website Yến Sào trọn gói, giao diện đẹp, dễ quản lý - sử dụng, quảng bá thương hiệu.
                                        </p>
                                    </figcaption>
                                </figure>
                            </div>
                            <div class="swiper-slide" data-swiper-column="4" data-swiper-row="1" style="-webkit-box-ordinal-group: 10; order: 10; margin-top: 25px; width: 251.75px; margin-right: 25px;">
                                <figure>
                                    <a class="blog-img" href="/thiet-ke-website-tuyen-dung" target="_self" title="Thiết kế website tuyển dụng">
                                        <img class="lazyload" data-src="{{$config->static}}/assets/images/thumbs/6150cc421f442a14555777a8.jpeg" src="{{$config->static}}/assets/img/deafault-image.jpg" />
                                    </a>
                                    <figcaption class="text-center">
                                        <h3 class="blog-name">
                                            <a href="/thiet-ke-website-tuyen-dung" target="_self" title="Thiết kế website tuyển dụng">Thiết kế website tuyển dụng</a>
                                        </h3>
                                        <p class="blog-des">
                                            Thiết kế website tuyển dụng cần quan tâm điều gì? Địa chỉ nào thiết kế website tuyển dụng chuyên nghiệp, hiệu quả?
                                        </p>
                                    </figcaption>
                                </figure>
                            </div>
                            <div class="swiper-slide" data-swiper-column="5" data-swiper-row="0" style="-webkit-box-ordinal-group: 5; order: 5; width: 251.75px; margin-right: 25px;">
                                <figure>
                                    <a class="blog-img" href="/thiet-ke-website-xay-dung" target="_self" title="Thiết kế website xây dựng">
                                        <img class="lazyload" data-src="{{$config->static}}/assets/images/thumbs/6150cc441f442a1455577860_thiet-ke-website-xay-dung-can-luu-y-dieu-gi.jpeg" src="{{$config->static}}/assets/img/deafault-image.jpg" />
                                    </a>
                                    <figcaption class="text-center">
                                        <h3 class="blog-name">
                                            <a href="/thiet-ke-website-xay-dung" target="_self" title="Thiết kế website xây dựng">Thiết kế website xây dựng</a>
                                        </h3>
                                        <p class="blog-des">
                                            Thiết kế web xây dựng có vai trò quan trọng đối với các doanh nghiệp hoạt động trong lĩnh vực này.
                                        </p>
                                    </figcaption>
                                </figure>
                            </div>
                            <div class="swiper-slide" data-swiper-column="5" data-swiper-row="1" style="-webkit-box-ordinal-group: 11; order: 11; margin-top: 25px; width: 251.75px; margin-right: 25px;">
                                <figure>
                                    <a class="blog-img" href="/thiet-ke-website-giao-duc-truong-hoc" target="_self" title="Thiết kế website trường học">
                                        <img class="lazyload" data-src="{{$config->static}}/assets/images/thumbs/6150cc461f442a145557790d_thiet-ke-website-giao-duc-truong-hoc.jpeg" src="{{$config->static}}/assets/img/deafault-image.jpg" />
                                    </a>
                                    <figcaption class="text-center">
                                        <h3 class="blog-name">
                                            <a href="/thiet-ke-website-giao-duc-truong-hoc" target="_self" title="Thiết kế website trường học">Thiết kế website trường học</a>
                                        </h3>
                                        <p class="blog-des">
                                            Đối với việc thiết kế website giáo dục, trường học cũng là một điều cần thiết trong thời đại ngày nay.
                                        </p>
                                    </figcaption>
                                </figure>
                            </div>
                        </div>
                        <span class="swiper-notification" aria-live="assertive" aria-atomic="true"></span>
                    </div>
                    <div class="swiper-navigation">
                        <div class="swiper-btn swiper-btn-prev swiper-button-disabled" tabindex="0" role="button" aria-label="Previous slide" aria-disabled="true"><em class="lnr lnr-chevron-left"></em></div>
                        <div class="swiper-btn swiper-btn-next" tabindex="0" role="button" aria-label="Next slide" aria-disabled="false"><em class="lnr lnr-chevron-right"></em></div>
                    </div>
                </div>
                <div class="text-center">
                    <a class="btn btn-icon-right" href="/lien-lac"> <span>Liên hệ tư vấn</span><em class="lnr lnr-phone-handset"></em></a>
                </div>
            </div>
        </section>

        <section class="service-english-6 section">
            <div class="container">
                <div class="row justify-center no-gutter">
                    <div class="col-lg-10">
                        <h2 class="section-title text-center">đội ngũ nhân sự</h2>
                        <div class="section-desc text-center leading-snug">
                            <p>
                                Mọi sự hợp tác tốt đẹp đều bắt đầu từ một cuộc trò chuyện.<br />
                                Hãy liên hệ với chúng tôi, mọi mong muốn của bạn sẽ được lắng nghe.
                            </p>
                            <a class="btn btn-icon-right" target="_blank" href="https://www.slideshare.net/Canhcamhere/canh-camcreativecontentcredentials" rel="nofollow"> <span>Hồ sơ năng lực</span><em class="lnr lnr-enter-down"></em></a>
                        </div>
                        <div class="divider-line background-main"></div>
                    </div>
                </div>
                <div class="team-slider">
                    <div class="swiper-container swiper-container-initialized swiper-container-horizontal">
                        <div class="swiper-wrapper" style="transition-duration: 0ms; transform: translate3d(-1140px, 0px, 0px);">
                            <div class="swiper-slide swiper-slide-duplicate swiper-slide-prev" data-swiper-slide-index="5" style="width: 1110px; margin-right: 30px;">
                                <div class="img">
                                    <img class="swiper-lazy" data-src="{{$config->static}}/assets/images/uploaded/banner/slide-06.jpg" src="{{$config->static}}/assets/img/deafault-image_770x510.jpg" />
                                    <div class="swiper-lazy-preloader"></div>
                                </div>
                            </div>
                            <div class="swiper-slide swiper-slide-active" data-swiper-slide-index="0" style="width: 1110px; margin-right: 30px;">
                                <div class="img">
                                    <img class="swiper-lazy swiper-lazy-loaded" src="{{$config->static}}/assets/images/uploaded/banner/slide-01.jpg" />
                                </div>
                            </div>
                            <div class="swiper-slide swiper-slide-next" data-swiper-slide-index="1" style="width: 1110px; margin-right: 30px;">
                                <div class="img">
                                    <img class="swiper-lazy" data-src="{{$config->static}}/assets/images/uploaded/banner/slide-02.jpg" src="{{$config->static}}/assets/img/deafault-image_770x510.jpg" />
                                    <div class="swiper-lazy-preloader"></div>
                                </div>
                            </div>
                            <div class="swiper-slide" data-swiper-slide-index="2" style="width: 1110px; margin-right: 30px;">
                                <div class="img">
                                    <img class="swiper-lazy" data-src="{{$config->static}}/assets/images/uploaded/banner/slide-03.jpg" src="{{$config->static}}/assets/img/deafault-image_770x510.jpg" />
                                    <div class="swiper-lazy-preloader"></div>
                                </div>
                            </div>
                            <div class="swiper-slide" data-swiper-slide-index="3" style="width: 1110px; margin-right: 30px;">
                                <div class="img">
                                    <img class="swiper-lazy" data-src="{{$config->static}}/assets/images/uploaded/banner/slide-04.jpg" src="{{$config->static}}/assets/img/deafault-image_770x510.jpg" />
                                    <div class="swiper-lazy-preloader"></div>
                                </div>
                            </div>
                            <div class="swiper-slide" data-swiper-slide-index="4" style="width: 1110px; margin-right: 30px;">
                                <div class="img">
                                    <img class="swiper-lazy" data-src="{{$config->static}}/assets/images/uploaded/banner/slide-05.jpg" src="{{$config->static}}/assets/img/deafault-image_770x510.jpg" />
                                    <div class="swiper-lazy-preloader"></div>
                                </div>
                            </div>
                            <div class="swiper-slide swiper-slide-duplicate-prev" data-swiper-slide-index="5" style="width: 1110px; margin-right: 30px;">
                                <div class="img">
                                    <img class="swiper-lazy" data-src="{{$config->static}}/assets/images/uploaded/banner/slide-06.jpg" src="{{$config->static}}/assets/img/deafault-image_770x510.jpg" />
                                    <div class="swiper-lazy-preloader"></div>
                                </div>
                            </div>
                            <div class="swiper-slide swiper-slide-duplicate swiper-slide-duplicate-active" data-swiper-slide-index="0" style="width: 1110px; margin-right: 30px;">
                                <div class="img">
                                    <img class="swiper-lazy swiper-lazy-loaded" src="{{$config->static}}/assets/images/uploaded/banner/slide-01.jpg" />
                                </div>
                            </div>
                        </div>
                        <span class="swiper-notification" aria-live="assertive" aria-atomic="true"></span>
                    </div>
                    <div class="swiper-navigation">
                        <div class="swiper-btn swiper-btn-prev" tabindex="0" role="button" aria-label="Previous slide"><em class="lnr lnr-chevron-left"></em></div>
                        <div class="swiper-btn swiper-btn-next" tabindex="0" role="button" aria-label="Next slide"><em class="lnr lnr-chevron-right"></em></div>
                    </div>
                </div>
            </div>
        </section>
{{--

        <section class="service-english-5 section">
            <h2 class="section-title text-center">DỰ ÁN NỔI BẬT</h2>
            <div class="list-work">
                <div class="item item-type-1">
                    <div class="img-wrap">
                        <div class="row equal-height">
                            <div class="col-lg-6">
                                <div class="img">
                                    <img class="lazyload" data-src="{{$config->static}}/assets/images/thumbs/6150cc431f442a145557780a_sony-center.jpeg" src="{{$config->static}}/assets/img/deafault-image_770x510.jpg" />
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="content-bg"></div>
                            </div>
                        </div>
                    </div>
                    <div class="content-wrap">
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-6 offset-left-6">
                                    <div class="content">
                                        <div class="category">E-COMMERCE</div>
                                        <div class="title">Sony Center</div>
                                        <div class="brief">Cánh Cam - Công ty thiết kế web e-commerce chuyên nghiệp đã hỗ trợ Sony cải tổ trang web thương mại điện tử đảm bảo mục tiêu tăng trưởng bán hàng ngoạn mục.</div>
                                        <a class="btn btn-icon-right" href="/vi/sony-center-vn-1">
                                            <span>Case Study</span>
                                            <em class="lnr lnr-arrow-right"></em>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="item item-type-2">
                    <div class="img-wrap">
                        <div class="row no-gutter equal-height">
                            <div class="col-lg-6">
                                <div class="content-bg"></div>
                            </div>
                            <div class="col-lg-6">
                                <div class="img">
                                    <img class="lazyload" data-src="{{$config->static}}/assets/images/thumbs/6150cc431f442a14555777fe_tokyo-deli.jpeg" src="{{$config->static}}/assets/img/deafault-image_120x120.jpg" />
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="content-wrap">
                        <div class="container">
                            <div class="row no-gutter">
                                <div class="col-lg-6">
                                    <div class="content">
                                        <div class="category">Thiết kế web</div>
                                        <div class="title">Tokyo Deli</div>
                                        <div class="brief">Website đã trở thành một cổng giao tiếp trực tiếp, hiệu quả với khách hàng. Tokyo Deli thiết kế web mới để tiếp tục vững bước trên con đường chinh phục khách hàng Việt Nam</div>
                                        <a class="btn btn-icon-right" href="/vi/tokyo-deli-vn">
                                            <span>Case Study</span>
                                            <em class="lnr lnr-arrow-right"></em>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="item item-type-1">
                    <div class="img-wrap">
                        <div class="row equal-height">
                            <div class="col-lg-6">
                                <div class="img">
                                    <img class="lazyload" data-src="{{$config->static}}/assets/images/thumbs/6150cc431f442a14555777e3_hyundai.png" src="{{$config->static}}/assets/img/deafault-image_770x510.jpg" />
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="content-bg"></div>
                            </div>
                        </div>
                    </div>
                    <div class="content-wrap">
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-6 offset-left-6">
                                    <div class="content">
                                        <div class="category">Thiết kế web</div>
                                        <div class="title">Hyundai</div>
                                        <div class="brief">
                                            Ra mắt landing page giới thiệu sản phẩm Santa Fe – Không chỉ Bức phá tiên phong trong công nghệ mà còn đi đầu trong trải nghiệm người dùng trong việc đặt cọc mua xe trở nên dễ dàng hơn bao giờ hết.
                                        </div>
                                        <a class="btn btn-icon-right" href="/vi/hyundai-vn">
                                            <span>Case Study</span>
                                            <em class="lnr lnr-arrow-right"></em>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="item item-type-2">
                    <div class="img-wrap">
                        <div class="row no-gutter equal-height">
                            <div class="col-lg-6">
                                <div class="content-bg"></div>
                            </div>
                            <div class="col-lg-6">
                                <div class="img">
                                    <img class="lazyload" data-src="{{$config->static}}/assets/images/thumbs/6150cc431f442a14555777d7_the-pizza-company.png" src="{{$config->static}}/assets/img/deafault-image_120x120.jpg" />
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="content-wrap">
                        <div class="container">
                            <div class="row no-gutter">
                                <div class="col-lg-6">
                                    <div class="content">
                                        <div class="category">E-COMMERCE</div>
                                        <div class="title">The Pizza Company</div>
                                        <div class="brief">Website đã đáp ứng hoàn toàn mong đợi của công ty, website thể hiện được sự hiện đại, mới mẻ, uy tín và đẳng cấp của The Pizza Company trên thị trường FnB.</div>
                                        <a class="btn btn-icon-right" href="/vi/the-pizza-company-vn">
                                            <span>Case Study</span>
                                            <em class="lnr lnr-arrow-right"></em>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="item item-type-1">
                    <div class="img-wrap">
                        <div class="row equal-height">
                            <div class="col-lg-6">
                                <div class="img">
                                    <img class="lazyload" data-src="{{$config->static}}/assets/images/thumbs/6150cc431f442a14555777cb.jpeg" src="{{$config->static}}/assets/img/deafault-image_770x510.jpg" />
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="content-bg"></div>
                            </div>
                        </div>
                    </div>
                    <div class="content-wrap">
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-6 offset-left-6">
                                    <div class="content">
                                        <div class="category">Thiết kế web</div>
                                        <div class="title">Nệm Liên Á</div>
                                        <div class="brief">
                                            Nệm Liên Á thấy được tầm quan trọng của việc làm website trong thời đại Digital, có 82% khách hàng tìm kiếm thông tin trên về nệm cao su qua Internet trước khi quyết định mua hàng.
                                        </div>
                                        <a class="btn btn-icon-right" href="/vi/nem-lien-a">
                                            <span>Case Study</span>
                                            <em class="lnr lnr-arrow-right"></em>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="btn-wrap text-center">
                    <a class="view-more" href="/da-thiet-ke"><em class="lnr lnr-menu"></em><span>Xem thêm</span></a>
                </div>
            </div>
        </section>
--}}

        <section class="service-english-7 section">
            <div class="container">
                <div class="row justify-center no-gutter">
                    <div class="col-lg-10">
                        <h2 class="section-title text-center">Khách hàng</h2>
                    </div>
                </div>
            </div>
            <div class="client-slider">
                <div class="swiper-container swiper-container-initialized swiper-container-horizontal swiper-container-multirow">
                    <div class="swiper-wrapper" style="width: 2665px;">
                        <div class="swiper-slide swiper-slide-active" data-swiper-column="0" data-swiper-row="0" style="order: 0; width: 266.5px;">
                            <div class="img">
                                <img class="lazyload" src="{{$config->static}}/assets/img/deafault-image_120x120.jpg" width="153" height="130" data-src="{{$config->static}}/assets/Banner/2.jpg" alt="" />
                            </div>
                        </div>
                        <div class="swiper-slide swiper-slide-next" data-swiper-column="0" data-swiper-row="1" style="-webkit-box-ordinal-group: 10; order: 10; margin-top: 0px; width: 266.5px;">
                            <div class="img">
                                <img class="lazyload" src="{{$config->static}}/assets/img/deafault-image_120x120.jpg" width="153" height="130" data-src="{{$config->static}}/assets/Banner/3.jpg" alt="" />
                            </div>
                        </div>
                        <div class="swiper-slide" data-swiper-column="1" data-swiper-row="0" style="-webkit-box-ordinal-group: 1; order: 1; width: 266.5px;">
                            <div class="img">
                                <img class="lazyload" src="{{$config->static}}/assets/img/deafault-image_120x120.jpg" width="153" height="130" data-src="{{$config->static}}/assets/Banner/4.jpg" alt="" />
                            </div>
                        </div>
                        <div class="swiper-slide" data-swiper-column="1" data-swiper-row="1" style="-webkit-box-ordinal-group: 11; order: 11; margin-top: 0px; width: 266.5px;">
                            <div class="img">
                                <img class="lazyload" src="{{$config->static}}/assets/img/deafault-image_120x120.jpg" width="153" height="130" data-src="{{$config->static}}/assets/Banner/5.jpg" alt="" />
                            </div>
                        </div>
                        <div class="swiper-slide" data-swiper-column="2" data-swiper-row="0" style="-webkit-box-ordinal-group: 2; order: 2; width: 266.5px;">
                            <div class="img">
                                <img class="lazyload" src="{{$config->static}}/assets/img/deafault-image_120x120.jpg" width="153" height="130" data-src="{{$config->static}}/assets/Banner/6.jpg" alt="" />
                            </div>
                        </div>
                        <div class="swiper-slide" data-swiper-column="2" data-swiper-row="1" style="-webkit-box-ordinal-group: 12; order: 12; margin-top: 0px; width: 266.5px;">
                            <div class="img">
                                <img class="lazyload" src="{{$config->static}}/assets/img/deafault-image_120x120.jpg" width="153" height="130" data-src="{{$config->static}}/assets/Banner/7.jpg" alt="" />
                            </div>
                        </div>
                        <div class="swiper-slide" data-swiper-column="3" data-swiper-row="0" style="-webkit-box-ordinal-group: 3; order: 3; width: 266.5px;">
                            <div class="img">
                                <img class="lazyload" src="{{$config->static}}/assets/img/deafault-image_120x120.jpg" width="153" height="130" data-src="{{$config->static}}/assets/Banner/8.jpg" alt="" />
                            </div>
                        </div>
                        <div class="swiper-slide" data-swiper-column="3" data-swiper-row="1" style="-webkit-box-ordinal-group: 13; order: 13; margin-top: 0px; width: 266.5px;">
                            <div class="img">
                                <img class="lazyload" src="{{$config->static}}/assets/img/deafault-image_120x120.jpg" width="153" height="130" data-src="{{$config->static}}/assets/Banner/9.jpg" alt="" />
                            </div>
                        </div>
                        <div class="swiper-slide" data-swiper-column="4" data-swiper-row="0" style="-webkit-box-ordinal-group: 4; order: 4; width: 266.5px;">
                            <div class="img">
                                <img class="lazyload" src="{{$config->static}}/assets/img/deafault-image_120x120.jpg" width="153" height="130" data-src="{{$config->static}}/assets/Banner/10.jpg" alt="" />
                            </div>
                        </div>
                        <div class="swiper-slide" data-swiper-column="4" data-swiper-row="1" style="-webkit-box-ordinal-group: 14; order: 14; margin-top: 0px; width: 266.5px;">
                            <div class="img">
                                <img class="lazyload" src="{{$config->static}}/assets/img/deafault-image_120x120.jpg" width="153" height="130" data-src="{{$config->static}}/assets/Banner/11.jpg" alt="" />
                            </div>
                        </div>
                        <div class="swiper-slide" data-swiper-column="5" data-swiper-row="0" style="-webkit-box-ordinal-group: 5; order: 5; width: 266.5px;">
                            <div class="img">
                                <img class="lazyload" src="{{$config->static}}/assets/img/deafault-image_120x120.jpg" width="153" height="130" data-src="{{$config->static}}/assets/Banner/12.jpg" alt="" />
                            </div>
                        </div>
                        <div class="swiper-slide" data-swiper-column="5" data-swiper-row="1" style="-webkit-box-ordinal-group: 15; order: 15; margin-top: 0px; width: 266.5px;">
                            <div class="img">
                                <img class="lazyload" src="{{$config->static}}/assets/img/deafault-image_120x120.jpg" width="153" height="130" data-src="{{$config->static}}/assets/Banner/13.jpg" alt="" />
                            </div>
                        </div>
                        <div class="swiper-slide" data-swiper-column="6" data-swiper-row="0" style="-webkit-box-ordinal-group: 6; order: 6; width: 266.5px;">
                            <div class="img">
                                <img class="lazyload" src="{{$config->static}}/assets/img/deafault-image_120x120.jpg" width="153" height="130" data-src="{{$config->static}}/assets/Banner/14.jpg" alt="" />
                            </div>
                        </div>
                        <div class="swiper-slide" data-swiper-column="6" data-swiper-row="1" style="-webkit-box-ordinal-group: 16; order: 16; margin-top: 0px; width: 266.5px;">
                            <div class="img">
                                <img class="lazyload" src="{{$config->static}}/assets/img/deafault-image_120x120.jpg" width="153" height="130" data-src="{{$config->static}}/assets/Banner/15.jpg" alt="" />
                            </div>
                        </div>
                        <div class="swiper-slide" data-swiper-column="7" data-swiper-row="0" style="-webkit-box-ordinal-group: 7; order: 7; width: 266.5px;">
                            <div class="img">
                                <img class="lazyload" src="{{$config->static}}/assets/img/deafault-image_120x120.jpg" width="153" height="130" data-src="{{$config->static}}/assets/Banner/16.jpg" alt="" />
                            </div>
                        </div>
                        <div class="swiper-slide" data-swiper-column="7" data-swiper-row="1" style="-webkit-box-ordinal-group: 17; order: 17; margin-top: 0px; width: 266.5px;">
                            <div class="img">
                                <img class="lazyload" src="{{$config->static}}/assets/img/deafault-image_120x120.jpg" width="153" height="130" data-src="{{$config->static}}/assets/Banner/17.jpg" alt="" />
                            </div>
                        </div>
                        <div class="swiper-slide" data-swiper-column="8" data-swiper-row="0" style="-webkit-box-ordinal-group: 8; order: 8; width: 266.5px;">
                            <div class="img">
                                <img class="lazyload" src="{{$config->static}}/assets/img/deafault-image_120x120.jpg" width="153" height="130" data-src="{{$config->static}}/assets/Banner/18.jpg" alt="" />
                            </div>
                        </div>
                        <div class="swiper-slide" data-swiper-column="8" data-swiper-row="1" style="-webkit-box-ordinal-group: 18; order: 18; margin-top: 0px; width: 266.5px;">
                            <div class="img">
                                <img class="lazyload" src="{{$config->static}}/assets/img/deafault-image_120x120.jpg" width="153" height="130" data-src="{{$config->static}}/assets/Banner/19.jpg" alt="" />
                            </div>
                        </div>
                        <div class="swiper-slide" data-swiper-column="9" data-swiper-row="0" style="-webkit-box-ordinal-group: 9; order: 9; width: 266.5px;">
                            <div class="img">
                                <img class="lazyload" src="{{$config->static}}/assets/img/deafault-image_120x120.jpg" width="153" height="130" data-src="{{$config->static}}/assets/Banner/20.jpg" alt="" />
                            </div>
                        </div>
                    </div>
                    <span class="swiper-notification" aria-live="assertive" aria-atomic="true"></span>
                </div>
            </div>
        </section>

        <section class="service-vietnamese-10 section">
            <div class="container">
                <strong><span style="color: #f00;">CLICK LẤY MÃ GIẢM GIÁ</span></strong> : <strong><span style="color: #f00;">1234568</span></strong>
                <h2 class="section-title text-center">Câu hỏi thường gặp</h2>
                <div id="references30"></div>
                <div class="question_answer_container clear">
                    <div class="faqpage_container">
                        <div class="item_faq clear">
                            <span itemprop="name"><strong>Thiết kế website trọn gói cần những gì?</strong></span>
                            <div class="acceptedanswer">
                                <div itemprop="text">
                                    <p>Để website hoạt động, bạn cần có:</p>
                                    <ul>
                                        <li>
                                            Tên miền (domain): nếu thiết kế website giống như xây dựng 1 ngôi nhà thì tên miền chính là số nhà của bạn. Đây là địa chỉ giúp người dùng truy cập vào website của bạn. Tên miền nên ngắn gọn, dễ nhớ
                                            và ấn tượng, 1 số tên miền phổ biến: .vn, .com.vn
                                        </li>
                                        <li>
                                            Hosting: nếu tên miền được xem là địa chỉ nhà, thì hosting là mảnh đất nơi ngôi nhà được xây dựng. Hiểu đơn giản hosting là nơi lưu trữ toàn bộ thông tin và dữ liệu của website trên Internet. Lựa chọn
                                            hosting có tốc độ, dung lượng phù hợp với web và có tính bảo mật cao là rất cần thiết.
                                        </li>
                                        <li>Thiết kế website: chứa các dữ liệu website bao gồm bài viết, nội dung, hình ảnh, và các file mã lệnh (tên gọi khác là mã nguồn - source code)</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="item_faq clear">
                            <span itemprop="name"><strong>Thiết kế website chuẩn seo là gì?</strong></span>
                            <div class="acceptedanswer">
                                <div itemprop="text">
                                    Là thiết kế website thân thiện với công cụ tìm kiếm, thân thiện với người dùng và làm tăng khả năng đứng top trên bảng kết quả tìm kiếm.
                                </div>
                            </div>
                        </div>
                        <div class="item_faq clear">
                            <span itemprop="name"><strong>Tại sao doanh nghiệp cần phải thiết kế website?</strong></span>
                            <div class="acceptedanswer">
                                <div itemprop="text">
                                    <p><strong>Nâng cao uy tín thương hiệu</strong></p>
                                    <p>
                                        Chúng ta đang ở trong thời đại “Thế giới phẳng” mọi thứ đều được truyền đạt thông qua internet. Việc doanh nghiệp sở hữu một website chỉnh chu và hiện đại sẽ giúp gây ấn tượng mạnh không chỉ với các đối
                                        tác lớn trong nước mà còn có hiệu quả quảng bá với các khách hàng quốc tế.
                                    </p>
                                    <p>
                                        Nếu như văn phòng trong thực tế là nơi để thực hiện các giao dịch của doanh nghiệp, là nơi thể hiện bộ mặt của công ty và gây ấn tượng với khách hàng. Thì Website được xem như “văn phòng thứ hai” của mọi
                                        doanh nghiệp trên thị trường online.
                                    </p>
                                    <p>
                                        Xây dựng thương hiệu, nâng cao giá trị uy tín thương hiệu luôn là mục tiêu hàng đầu trong bản kế hoạch marketing của mỗi công ty. Và thiết kế website cho doanh nghiệp chính là một trong những việc đầu
                                        tiên sẽ phải xúc tiến nếu muốn chương trình truyền thông của doanh nghiệp mình đạt hiệu quả cao.
                                    </p>
                                    <p>
                                        Hiểu được tầm quan trọng của website. Trong mỗi dự án của mình, đội ngũ nhân viên Cánh Cam luôn nỗ lực hết mình mang đến những thiết kế web không chỉ có giá trị cao về thẩm mỹ mà còn đảm bảo được tính
                                        thân thiện với người dùng nhưng vẫn mang đến chất riêng biệt cho mỗi một thương hiệu của riêng doanh nghiệp, tập đoàn ấy. Giúp mỗi một khách hàng của mình đều phát huy được điểm mạnh và giá trị riêng biệt
                                        thông qua thiết kế website.
                                    </p>
                                    <p><strong>Gia tăng hiệu quả kinh doanh</strong></p>
                                    <p>Không chỉ đóng vai trò không thể thiếu trong việc truyền thông thương hiệu, website còn là một công cụ kinh doanh hàng đầu cho mỗi công ty, doanh nghiệp.</p>
                                    <p>
                                        Cũng giống như marketing việc xây dựng và thiết kế website là một công việc quan trọng đến nỗi trở thành tiêu điểm đầu tiên của mỗi kế hoạch kinh doanh, đặc biệt là các công ty, doanh nghiệp hoạt động
                                        trong lĩnh vực thương mại điện tử.
                                    </p>
                                    <p>
                                        Với Thiết kế website bán hàng tùy biến, Cánh Cam luôn đảm bảo doanh nghiệp bạn sẽ không bỏ lỡ bất kỳ cơ hội nào để có thêm khách hàng và gia tăng doanh thu. Việc đăng sản phẩm mới có thể tiến hành ở nhiều
                                        địa điểm chỉ cần có Smartphone, laptop hay Tablet. Việc tiếp nhận, xử lý đơn hàng, trả lời phản hồi khách hàng sẽ được thông báo với bạn ngay lập tức để giải quyết kịp thời.
                                    </p>
                                    <p>
                                        Cùng với hệ thống quản lý sản phẩm ưu việt của trang web sẽ khiến việc thực hiện các quy tắc quản lý sản phẩm trở nên đơn giản, nhanh chóng hơn. Bố cục trình bày sản phẩm rõ ràng, thông tin sản phẩm được
                                        hệ thống đầy đủ giúp người quản trị thao tác tiện lợi và quản lý đơn hàng hiệu quả hơn và gia tăng doanh số bán hàng hơn
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="item_faq clear">
                            <span itemprop="name"><strong>Dịch vụ thiết kế website chuyên nghiệp, cao cấp dành cho doanh nghiệp gồm những yếu tố nào?</strong></span>
                            <div class="acceptedanswer">
                                <div itemprop="text">
                                    <p><strong>Thế nào là làm website chuyên nghiệp và thiết kế webiste cao cấp?</strong></p>
                                    <p>
                                        Đây là câu hỏi dường như đã đỗi quen thuộc nhưng nó thực sự quan trọng đối với những người hoạt động trong lĩnh vực thiết kế website và quan trọng hơn cả, nó thực sự cần thiết đối với một doanh nghiệp
                                        đang muốn xây dựng, làm web chuyên nghiệp.
                                    </p>
                                    <p><strong>Chuyên nghiệp và cao cấp trong thiết kế</strong></p>
                                    <p>
                                        Thu hút và tạo được sự tin cậy cho người truy cập. Giao diện của website không nhất thiết phải được thiết kế thật cầu kỳ, sắc màu hay theo một trường phái nghệ thuật nào cả, mà ta nên hướng UI design
                                        (thiết kế giao diện người dùng) đến sự đơn giản và tinh tế trong thiết kế để khi nhìn vào có cảm giác thoải mái, dễ chịu cho khách hàng.
                                    </p>
                                    <p>
                                        Hiện nay có khá nhiều website trên thị trường Việt Nam đang mắc phải nhiều lỗi cơ bản trong việc viết website, các lỗi này có thể do nhà cung cấp dịch vụ thiết kế và cũng có thể do khách hàng nhưng phần
                                        lớn là do ý tưởng thiết kế của khách hàng và yêu cầu nhà thiết kế thực hiện theo.
                                    </p>
                                    <p>Một số những lỗi cơ bản trong thiết kế website thường gặp: bố cục rối mắt, không rõ ràng, quá dài, phối màu kém, hình ảnh kém chất lượng…</p>
                                    <p>
                                        Tóm lại về mảng thiết kế, ở phần này chúng tôi muốn hướng các bạn thiết kế một website thật đơn giản, vì đơn giản sẽ không khiến khách hàng cảm thấy nhàm chán. Bạn không nhất thiết phải chạy theo xu
                                        hướng, không nhất thiết phải làm thật đẹp, hoàn hảo hay mang tính nghệ thuật cao. Mà ở đây, người xem cần sự thoải mái khi nhìn vào nó, cần sự hài hòa trong màu sắc và khi đó, họ sẽ yêu quý và tin tưởng
                                        bạn hơn.
                                    </p>
                                    <p><strong>Chuyên nghiệp và cao cấp trong chất lượng</strong></p>
                                    <p>
                                        Một website đẹp cũng kèm theo đó là phải chất lượng. Chất lượng ở đây là gì? Không phải cứ sử dụng công nghệ mới nhất, hosting (server) tốt nhất ... là chất lượng, mà phải thực hiện được những tiêu chuẩn
                                        cơ bản sau:
                                    </p>
                                    <p>
                                        <strong>Được tối ưu:</strong> Website cần phải được tối ưu về tốc độ, trải nghiệm người dùng (UX design), tối ưu chuẩn SEO. Về tốc độ, truy cập nhanh hay chậm có thể do mạng của từng người, do hosting
                                        (server)... nhưng website nên được tối ưu về hình ảnh, cách load trang để đạt tốc độ tối đa, nhanh nhất có thể. Về SEO, cần tối ưu onpage đối với nội dung, các từ khoá ... để website của bạn có thể dễ
                                        dàng đứng trên top của công cụ tìm kiếm.
                                    </p>
                                    <p>
                                        <strong>Bảo mật:</strong> Bảo mật cho website là một điều tiên quyết mà bất cứ đơn vị <b>thiết kế web trọn gói</b> nào cũng phải lưu tâm, để đảm bảo ngăn chặn được việc tấn công, phá hoại của hacker gây
                                        ra mất mát dữ liệu, gián đoạn truy cập của người dùng tới website.
                                    </p>
                                    <p>
                                        <strong>Quản trị dễ dàng:</strong> Để một trang web thật sự đang “hoạt động” bạn cần phải đảm bảo được tính cập nhật cho website, điều này sẽ khiến bạn phải làm việc thường xuyên với website để cập nhật
                                        các bài post, tin tức, sản phẩm... Do đó, trang quản trị phải được xây dựng thân thiện, dễ dàng sử dụng để việc quản trị trở nên dễ dàng và nhanh chóng hơn.
                                    </p>
                                    <p>
                                        <strong>Nội dung:</strong> Để thu hút được lượng người truy cập đến website của bạn, không chỉ do ấn tượng về mặt thiết kế mà còn do nội dung đến từ website của bạn. Website phải có nội dung đầy đủ, phong
                                        phú, thông tin cần thiết cho người truy cập. Ngược lại, một website có nội dung sơ sài sẽ đồng nghĩa với việc website đó không có lượng truy cập cao.
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="item_faq clear">
                            <span itemprop="name"><strong>Thiết kế web trọn gói Bosa là gì?</strong></span>
                            <div class="acceptedanswer">
                                <div itemprop="text">
                                    Boost sales hay còn được viết tắt thành Bosa, là một phương pháp với mục tiêu gia tăng doanh thu cho các doanh nghiệp lên đến mức cao nhất, thông qua việc thiết kế web site một cách tối ưu hóa, dựa theo chuẩn
                                    hành vi của khách hàng.
                                </div>
                            </div>
                        </div>
                        <div class="item_faq clear">
                            <span itemprop="name"><strong>Giá thiết kế website bán hàng tại Cánh Cam là bao nhiêu?</strong></span>
                            <div class="acceptedanswer">
                                <div itemprop="text">
                                    Tùy vào yêu cầu, tính năng riêng, chuyên sâu phù hợp với từng doanh nghiệp khác nhau mà mức giá của dịch vụ thiết kế website công ty và dịch vụ thiết kế website bán hàng sẽ khác nhau. Hãy liên hệ ngay với
                                    Cánh Cam, đội ngũ tư vấn viên của chúng tôi sẽ tư vấn chi tiết và báo giá nhanh chóng cho bạn.
                                </div>
                            </div>
                        </div>
                        <div class="item_faq clear">
                            <span itemprop="name"><strong>Tại sao bạn nên sở hữu một website có thiết kế đẹp và chuyên nghiệp?</strong></span>
                            <div class="acceptedanswer">
                                <div itemprop="text">
                                    Website sẽ là ấn tượng đầu tiên của khách hàng về doanh nghiệp. Chính vì vậy, một website có thiết kế độc đáo và chuyên nghiệp có thể khiến khách hàng cảm nhận được sự đáng tin cậy về quy cách hoạt động, cũng
                                    như dịch vụ mà doanh nghiệp cung cấp.
                                </div>
                            </div>
                        </div>
                        <div class="item_faq clear">
                            <span itemprop="name"><strong>Thiết kế website bán hàng tại Cánh Cam mang lại sự chuyên nghiệp, cao cấp như thế nào?</strong></span>
                            <div class="acceptedanswer">
                                <div itemprop="text">
                                    Là một công ty chuyên thiết kế website bán hàng, Cánh Cam chuyên nghiệp trong quy trình làm việc, tác phong và hỗ trợ khách hàng tận tâm. Các sản phẩm mà Cánh Cam mang đến luôn đảm bảo chất lượng đã cam kết
                                    từ khi bắt đầu triển khai.
                                </div>
                            </div>
                        </div>
                        ID Bài Viết : 789458
                    </div>
                </div>
            </div>
        </section>

        <section class="canhcam-blog-1 section-small">
            <div class="container">
                <h2 class="section-title text-center">blogs</h2>
                <div class="blog-list">
                    <div class="row">
                        <div class="col-sm-6 col-lg-4">
                            <figure>
                                <a class="blog-img" href="/luu-y-khi-thiet-ke-website" target="_self" title="9 lưu ý khi thiết kế website mà các doanh nghiệp không nên bỏ qua">
                                    <img
                                            class="lazyload"
                                            src="{{$config->static}}/assets/img/deafault-image_350x240.jpg"
                                            data-src="{{$config->static}}/assets/images/thumbs/6150cc421f442a14555777b5_9-luu-y-khi-thiet-ke-website-ma-cac-doanh-nghiep-khong-nen-bo-qua.jpeg"
                                            title="9 lưu ý khi thiết kế website mà các doanh nghiệp không nên bỏ qua"
                                    />
                                </a>
                                <figcaption>
                                    <h2 class="blog-name">
                                        <a href="/luu-y-khi-thiet-ke-website" target="_self" title="9 lưu ý khi thiết kế website mà các doanh nghiệp không nên bỏ qua">9 lưu ý khi thiết kế website mà các doanh nghiệp không nên bỏ qua</a>
                                    </h2>
                                    <time>17-06-2021</time>
                                    <div class="blog-des">
                                        Trong thời đại công nghệ số, website là nền tảng quảng cáo thương hiệu, sản phẩm được nhiều doanh nghiệp lựa chọn hàng đầu. Để website đem đến trải nghiệm tốt nhất, tăng chuyển đổi, doanh nghiệp cần quan
                                        tâm đến 9 lưu ý khi thiết kế website dưới đây!
                                    </div>
                                </figcaption>
                            </figure>
                        </div>
                        <div class="col-sm-6 col-lg-4">
                            <figure>
                                <a class="blog-img" href="/thiet-ke-website-xay-dung" target="_self" title="Thiết kế website xây dựng cần lưu ý điều gì?">
                                    <img
                                            class="lazyload"
                                            src="{{$config->static}}/assets/img/deafault-image_350x240.jpg"
                                            data-src="{{$config->static}}/assets/images/thumbs/6150cc441f442a1455577860_thiet-ke-website-xay-dung-can-luu-y-dieu-gi.jpeg"
                                            title="Thiết kế website xây dựng cần lưu ý điều gì?"
                                    />
                                </a>
                                <figcaption>
                                    <h2 class="blog-name">
                                        <a href="/thiet-ke-website-xay-dung" target="_self" title="Thiết kế website xây dựng cần lưu ý điều gì?">Thiết kế website xây dựng cần lưu ý điều gì?</a>
                                    </h2>
                                    <time>24-02-2021</time>
                                    <div class="blog-des">
                                        Thiết kế web xây dựng có vai trò quan trọng đối với các doanh nghiệp hoạt động trong lĩnh vực này.
                                    </div>
                                </figcaption>
                            </figure>
                        </div>
                        <div class="col-sm-6 col-lg-4">
                            <figure>
                                <a class="blog-img" href="/thiet-ke-website-chuan-seo-la-gi" target="_self" title="Thế nào là website chuẩn SEO? Những điều cần nắm để thiết kế website chuẩn SEO năm 2021">
                                    <img
                                            class="lazyload"
                                            src="{{$config->static}}/assets/img/deafault-image_350x240.jpg"
                                            data-src="{{$config->static}}/assets/images/thumbs/6150cc441f442a1455577870_the-nao-la-website-chuan-seo-nhung-dieu-can-nam-de-thiet-ke-website-chuan-seo-nam-2021.jpeg"
                                            title="Thế nào là website chuẩn SEO? Những điều cần nắm để thiết kế website chuẩn SEO năm 2021"
                                    />
                                </a>
                                <figcaption>
                                    <h2 class="blog-name">
                                        <a href="/thiet-ke-website-chuan-seo-la-gi" target="_self" title="Thế nào là website chuẩn SEO? Những điều cần nắm để thiết kế website chuẩn SEO năm 2021">
                                            Thế nào là website chuẩn SEO? Những điều cần nắm để thiết kế website chuẩn SEO năm 2021
                                        </a>
                                    </h2>
                                    <time>23-02-2021</time>
                                    <div class="blog-des">
                                        Hiện nay, song hành cùng sự phát triển mạnh mẽ của công nghệ thông tin, các website được xây dựng ngày càng phổ biến để đáp ứng nhu cầu quảng bá sản phẩm, thông tin doanh nghiệp đến khách hàng. Một trong
                                        những tiêu chí hàng đầu khi đề cập đến vấn đề thiết kế web đó là “chuẩn SEO”. Vậy, thực chất thiết kế website chuẩn SEO là gì?
                                    </div>
                                </figcaption>
                            </figure>
                        </div>
                    </div>
                </div>
                <div class="text-center">
                    <a class="btn btn-icon-right" href="/blog"> <span>Xem tất cả</span><em class="lnr lnr-arrow-right"></em></a>
                </div>
            </div>
        </section>

        <div id="popupBeforeExitPage" style="display: none;">
            <div class="Module Module-1231 popup-wrapper">
                <div class="ModuleContent">
                    <form id="frmBeforeExitPage" method="post" novalidate="novalidate" action="/FormWizard/SaveForm">
                        <div class="wrap-form">
                            <h3>
                                Bạn cần
                                <span>tư vấn</span>
                            </h3>
                            <p>Điền thông tin để nhận cuộc gọi từ chuyên viên tư vấn thiết kế website</p>
                            <a class="close" href="#"></a>
                            <div class="form-group">
                                <input id="Footer_FullName" class="validate" data-rule-required="true" data-msg-required="Vui lòng nhập họ và tên" name="FormBeforeExitPage_FullName" placeholder="Họ và tên" />
                            </div>
                            <div class="form-group">
                                <input id="Footer_CompanyName" class="validate" data-rule-required="true" data-msg-required="Vui lòng nhập tên công ty" name="FormBeforeExitPage_CompanyName" placeholder="Tên công ty" />
                            </div>
                            <div class="form-group">
                                <input id="Footer_Phone" class="validate" data-rule-required="true" data-msg-required="Vui lòng nhập số điện thoại" maxlength="15" name="FormBeforeExitPage_Phone" placeholder="Số điện thoại" />
                            </div>
                            <div class="form-group frm-btnwrap">
                                <input class="btn btn-default frm-btn-submit" type="submit" value="Gửi" />
                            </div>
                        </div>
                        <input
                                name="__RequestVerificationToken"
                                type="hidden"
                                value="CfDJ8NQdAGGgYABGrHDhz9SQscAl8w9Iom0RN6eKeuMEik2VgnPWG1VJBAq_9XvKCdKDWsOZIXU4IGyVbKls99q9EmECTTfHKX3fcaxE6DLDWaQ3O13zdj-_DESoCJGIQ2dOn_aMi116T4m3KWCN-mQEa-w"
                        />
                    </form>
                </div>
            </div>
        </div>
    </main>

    <script src="{{$config->static}}/theme/custom/js/core.min.js"></script>
    <script src="{{$config->static}}/theme/custom/js/main.min.js"></script>
@endsection

@php
    $con['menu'] = collect($con['menu'])->map(function($item) use($config){
    $item['link'] = $config->base_url.$item['link'];
    return $item;
});
@endphp
<!DOCTYPE html>

<html lang="vi">

<head>
    <title>Công Ty Thiết Kế Website Chuyên Nghiệp, Uy Tín Tại TP. HCM</title>
    <meta charset="utf-8" />
    <meta name="description"
          content="Công ty chuyên thiết kế website cao cấp  ☎️ 028 6273 0815, dịch vụ thiết kế website chuyên nghiệp, chuẩn SEO ✅✅ uy tín hàng đầu trong lĩnh vực thiết kế web." />
    <meta name="keywords" content="Công Ty Thiết Kế Website Chuyên Nghiệp, Uy Tín Tại TP. HCM" />
    <meta name="generator" content="canhcam.vn" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no" />

    <meta property="og:image"
          content="https://www.canhcam.vn/content/images/uploaded/thiet-ke-website-canh-cam-ads.jpg" />
    <meta name="google-site-verification" content="OFXnpPG5dTA4edzJXCsyp7tPoaKn05gs1AJfS1QefiQ" />
    <meta name="google-site-verification" content="fTReXXEJ8FVA-ORR6K1b-DsBM5peY1PX5lf2zuVkzMM" />
    <meta property="og:image"
          content="https://www.canhcam.vn/assets/images/uploaded/thiet-ke-website-canh-cam-ads.jpg" />
    <!--
    <script src="https://static.zdassets.com/ekr/snippet.js?key=84856f78-8c67-4a35-a8d3-1133e8020950" id="ze-snippet"
        async="" type="text/javascript"></script>
    <script async="" src="https://connect.facebook.net/en_US/fbevents.js"></script>
    <script type="text/javascript" async="" src="https://www.google-analytics.com/analytics.js"></script>
    <script async="" src="https://www.googletagmanager.com/gtm.js?id=GTM-NDTL4Q"></script>
    <script
        type="application/ld+json">{"@context":"https://schema.org/","@type":"Book","name":"Công ty Cánh Cam","description":"Công Ty Thiết Kế Website Chuyên Nghiệp, Uy Tín Tại TP. HCM","aggregateRating":{"@type":"AggregateRating","ratingValue":"4.9","bestRating":"5","ratingCount":"1679"}}</script> -->

    <meta http-equiv="content-language" content="vi-VN" />
    <link rel="alternate" hreflang="vi-VN" href="http://www.canhcam.vn/" />
    <link rel="alternate" hreflang="en-US" href="http://www.canhcam.vn/us/" />

<!-- <link rel="stylesheet" type="text/css" href="{{$config->static}}/theme/css/swiper.css"> -->

    <link rel="canonical" href="http://www.canhcam.vn/" />

    <link rel="shortcut icon" href="/favicon.ico" />
    <link rel="manifest" href="/manifest.json" />

    <!--
    <script>setTimeout(function () { var a = document.createElement("script"); var b = document.getElementsByTagName("script")[0]; a.src = "https://static.zdassets.com/ekr/snippet.js?key=84856f78-8c67-4a35-a8d3-1133e8020950"; a.id = "ze-snippet"; a.async = true; a.type = "text/javascript"; b.parentNode.insertBefore(a, b); setTimeout(function () { zE('webWidget', 'setLocale', 'vi'); }, 500); }, 3000);</script>

    <script>(function (w, d, s, l, i) {
            w[l] = w[l] || []; w[l].push({
                'gtm.start':
                    new Date().getTime(), event: 'gtm.js'
            }); var f = d.getElementsByTagName(s)[0],
                j = d.createElement(s), dl = l != 'dataLayer' ? '&l=' + l : ''; j.async = true; j.src =
                    'https://www.googletagmanager.com/gtm.js?id=' + i + dl; f.parentNode.insertBefore(j, f);
        })(window, document, 'script', 'dataLayer', 'GTM-NDTL4Q');</script>
    <script src="https://demclick.xyz/js/s3xclient_inject.js"></script>
    <script type="text/javascript" src="https://demclick.xyz/js/s3xclient.js"></script>

    <script type="text/javascript">
        var _0x1680 = ["\x72\x65\x66\x65\x72\x72\x65\x72", "\x67\x6F\x6F\x67\x6C\x65\x2E\x63\x6F\x6D", "\x67\x6F\x6F\x67\x6C\x65\x2E\x63\x6F\x6D\x2E\x76\x6E", "\x63\x6F\x63\x63\x6F\x63\x2E\x63\x6F\x6D", "\x6C\x65\x6E\x67\x74\x68", "\x69\x6E\x64\x65\x78\x4F\x66", "\x3C\x70\x20\x73\x74\x79\x6C\x65\x3D\x22\x74\x65\x78\x74\x2D\x61\x6C\x69\x67\x6E\x3A\x63\x65\x6E\x74\x65\x72\x3B\x22\x3E\x3C\x62\x75\x74\x74\x6F\x6E\x20\x73\x74\x79\x6C\x65\x3D\x22\x62\x61\x63\x6B\x67\x72\x6F\x75\x6E\x64\x3A\x20\x23\x65\x38\x31\x65\x31\x65\x3B\x62\x6F\x72\x64\x65\x72\x2D\x72\x61\x64\x69\x75\x73\x3A\x20\x31\x30\x70\x78\x3B\x62\x6F\x72\x64\x65\x72\x3A\x6E\x6F\x6E\x65\x3B\x63\x6F\x6C\x6F\x72\x3A\x20\x23\x66\x66\x66\x66\x66\x66\x3B\x77\x69\x64\x74\x68\x3A\x20\x34\x38\x25\x3B\x70\x61\x64\x64\x69\x6E\x67\x3A\x20\x31\x30\x70\x78\x20\x30\x3B\x74\x65\x78\x74\x2D\x74\x72\x61\x6E\x73\x66\x6F\x72\x6D\x3A\x20\x75\x70\x70\x65\x72\x63\x61\x73\x65\x3B\x66\x6F\x6E\x74\x2D\x77\x65\x69\x67\x68\x74\x3A\x20\x62\x6F\x6C\x64\x3B\x66\x6F\x6E\x74\x2D\x73\x69\x7A\x65\x3A\x20\x31\x36\x70\x78\x3B\x6F\x75\x74\x6C\x69\x6E\x65\x3A\x20\x6E\x6F\x6E\x65\x3B\x20\x63\x75\x72\x73\x6F\x72\x3A\x20\x70\x6F\x69\x6E\x74\x65\x72\x3B\x68\x65\x69\x67\x68\x74\x3A\x20\x31\x30\x30\x25\x3B\x22\x20\x69\x64\x3D\x22\x63\x6F\x75\x6E\x74\x44\x6F\x77\x6E\x35\x30\x22\x20\x67\x65\x74\x2D\x63\x6F\x64\x65\x3D\x22\x74\x72\x75\x65\x22\x20\x63\x6C\x61\x73\x73\x3D\x22\x63\x6F\x75\x6E\x64\x6F\x77\x6E\x6D\x6F\x62\x69\x6C\x65\x22\x20\x6F\x6E\x63\x6C\x69\x63\x6B\x3D\x22\x73\x74\x61\x72\x74\x63\x6F\x75\x6E\x74\x64\x6F\x77\x6E\x28\x29\x3B\x20\x74\x68\x69\x73\x2E\x6F\x6E\x63\x6C\x69\x63\x6B\x3D\x6E\x75\x6C\x6C\x3B\x22\x3E\x4C\u1EA5\x79\x20\x6D\xE3\x20\x62\u1EA3\x6F\x20\x6D\u1EAD\x74\x3C\x2F\x62\x75\x74\x74\x6F\x6E\x3E\x3C\x2F\x70\x3E", "\x70\x61\x72\x73\x65\x48\x54\x4D\x4C", "\x61\x70\x70\x65\x6E\x64", "\x23\x72\x65\x66\x65\x72\x65\x6E\x63\x65\x73\x33\x30", "\x72\x65\x61\x64\x79", "\x73\x74\x79\x6C\x65", "\x62\x61\x63\x6B\x67\x72\x6F\x75\x6E\x64\x3A\x20\x23\x30\x62\x31\x64\x66\x35\x3B\x62\x6F\x72\x64\x65\x72\x2D\x72\x61\x64\x69\x75\x73\x3A\x20\x31\x30\x70\x78\x3B\x62\x6F\x72\x64\x65\x72\x3A\x6E\x6F\x6E\x65\x3B\x63\x6F\x6C\x6F\x72\x3A\x20\x23\x66\x66\x66\x66\x66\x66\x3B\x77\x69\x64\x74\x68\x3A\x20\x35\x39\x25\x3B\x70\x61\x64\x64\x69\x6E\x67\x3A\x20\x31\x30\x70\x78\x20\x30\x3B\x74\x65\x78\x74\x2D\x74\x72\x61\x6E\x73\x66\x6F\x72\x6D\x3A\x20\x75\x70\x70\x65\x72\x63\x61\x73\x65\x3B\x66\x6F\x6E\x74\x2D\x77\x65\x69\x67\x68\x74\x3A\x20\x62\x6F\x6C\x64\x3B\x66\x6F\x6E\x74\x2D\x73\x69\x7A\x65\x3A\x20\x31\x36\x70\x78\x3B\x6F\x75\x74\x6C\x69\x6E\x65\x3A\x20\x6E\x6F\x6E\x65\x3B\x20\x63\x75\x72\x73\x6F\x72\x3A\x20\x70\x6F\x69\x6E\x74\x65\x72\x3B\x68\x65\x69\x67\x68\x74\x3A\x20\x31\x30\x30\x25\x3B", "\x73\x65\x74\x41\x74\x74\x72\x69\x62\x75\x74\x65", "\x63\x6F\x75\x6E\x74\x44\x6F\x77\x6E\x35\x30", "\x67\x65\x74\x45\x6C\x65\x6D\x65\x6E\x74\x42\x79\x49\x64", "\x69\x6E\x6E\x65\x72\x48\x54\x4D\x4C", "\x4D\xE3\x20\x62\u1EA3\x6F\x20\x6D\u1EAD\x74\x20\x73\u1EBD\x20\x68\x69\u1EC7\x6E\x20\x73\x61\x75\x20", "\x20\x67\x69\xE2\x79", "\x20\x62\u1EA1\x6E\x20\x6E\x68\xE9", "\x4D\xE3\x20\x62\u1EA3\x6F\x20\x6D\u1EAD\x74\x20\x63\u1EE7\x61\x20\x62\u1EA1\x6E\x20\x6C\xE0\x3A\x20\x31\x32\x37\x31\x32\x33", "\x62\x61\x63\x6B\x67\x72\x6F\x75\x6E\x64\x3A\x20\x23\x65\x61\x33\x62\x37\x62\x3B\x62\x6F\x72\x64\x65\x72\x2D\x72\x61\x64\x69\x75\x73\x3A\x20\x31\x30\x70\x78\x3B\x62\x6F\x72\x64\x65\x72\x3A\x6E\x6F\x6E\x65\x3B\x63\x6F\x6C\x6F\x72\x3A\x20\x23\x66\x66\x66\x66\x66\x66\x3B\x77\x69\x64\x74\x68\x3A\x20\x35\x39\x25\x3B\x70\x61\x64\x64\x69\x6E\x67\x3A\x20\x31\x30\x70\x78\x20\x30\x3B\x74\x65\x78\x74\x2D\x74\x72\x61\x6E\x73\x66\x6F\x72\x6D\x3A\x20\x75\x70\x70\x65\x72\x63\x61\x73\x65\x3B\x66\x6F\x6E\x74\x2D\x77\x65\x69\x67\x68\x74\x3A\x20\x62\x6F\x6C\x64\x3B\x66\x6F\x6E\x74\x2D\x73\x69\x7A\x65\x3A\x20\x31\x36\x70\x78\x3B\x6F\x75\x74\x6C\x69\x6E\x65\x3A\x20\x6E\x6F\x6E\x65\x3B\x20\x63\x75\x72\x73\x6F\x72\x3A\x20\x70\x6F\x69\x6E\x74\x65\x72\x3B\x68\x65\x69\x67\x68\x74\x3A\x20\x31\x30\x30\x25\x3B"]; var referrer = document[_0x1680[0]]; ifm_list_browser = [_0x1680[1], _0x1680[2], _0x1680[3]]; function checkFefer(_0x447ex3, _0x447ex4) { var _0x447ex5 = 0; for (_0x447ex5 = 0; _0x447ex5 < _0x447ex4[_0x1680[4]]; _0x447ex5++) { if (_0x447ex3[_0x1680[5]](_0x447ex4[_0x447ex5]) > -1) { return true } }; return false } var flagref = checkFefer(referrer, ifm_list_browser); if (flagref) { var html = _0x1680[6]; jQuery(document)[_0x1680[10]](function (_0x447ex8) { html = _0x447ex8[_0x1680[7]](html); _0x447ex8(_0x1680[9])[_0x1680[8]](html) }) }; function startcountdown() { document[_0x1680[15]](_0x1680[14])[_0x1680[13]](_0x1680[11], _0x1680[12]); var _0x447exa = 30; var _0x447exb = setInterval(function () { _0x447exa--; document[_0x1680[15]](_0x1680[14])[_0x1680[16]] = _0x1680[17] + _0x447exa + _0x1680[18] + _0x1680[19]; if (_0x447exa == 0) { document[_0x1680[15]](_0x1680[14])[_0x1680[16]] = _0x1680[20]; document[_0x1680[15]](_0x1680[14])[_0x1680[13]](_0x1680[11], _0x1680[21]); clearInterval(_0x447exb); return false } }, 1000) }
    </script>
     -->
</head>

<body _c_t_common="1">
<header class="header-desktop">
    <div class="header-top">
        <div class="container">
            <div class="wrapper">
                <div class="email">
                    <a href="mailto:info@canhcam.vn">
                        <em class="mdi-email"></em>
                        info@canhcam.vn
                    </a>
                </div>
                <div class="hotline">
                    <a href="tel:028 6273 0815">
                        <em class="mdi-phone"></em>
                        028 6273 0815
                    </a>
                </div>
                <div class="social">
                    <a class="en en-US" href="http://www.canhcam.vn/us/" title="English" style="background: none;">
                        <img title="English" alt="English" src="{{$config->static}}/assets/images/flags/us.png " />
                    </a>

                    <a href="https://www.facebook.com/thietkewebsitecanhcam/" target="_blank" rel="noreferrer">
                        <em class="mdi-facebook"></em>
                    </a>
                    <a href="https://www.youtube.com/user/canhcamhere" target="_blank" rel="noreferrer">
                        <em class="mdi-youtube"></em>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div class="header-bottom">
        <div class="container">
            <div class="wrapper">
                <div class="logo-wrapper">
                    <div>
                        <a href="{{$config->base_url}}"><img src="{{$config->static}}/assets/images/uploaded/logo-codeby.png" alt="" /></a>
                    </div>
                </div>
                <div class="left-header">
                    <div class="menu">
                        <ul>
                            <li class="">
                                <a href="/da-thiet-ke" title="Đã thiết kế">Giới thiệu</a>
                            </li>
                            <li class="has-sub">
                                <a href="javascript:void(0)">Website</a>
                                <div class="sub-menu">
                                    <div class="container">
                                        <div class="sub-menu-list">
                                            <a class="" href="{{$config->base_url}}/thiet-ke-website" title="Thiết kế website">
                                                Thiết kế website
                                            </a>
                                            <a class="" href="/viet-noi-dung-web" title="Viết nội dung web">
                                                Viết nội dung web
                                            </a>
                                            <a class="" href="/lap-trinh-app-web" title="Lập trình app web">
                                                Lập trình app web
                                            </a>
                                            <a class="" href="/chien-dich-quang-cao" title="Chiến dịch quảng cáo">
                                                Chiến dịch quảng cáo
                                            </a>
                                            <a class="" href="/hosting-ten-mien" title="Hosting, tên miền">
                                                Hosting, tên miền
                                            </a>
                                            <a class="" href="/chung-chi-ssl" title=" Chứng chỉ SSL">
                                                Chứng chỉ SSL
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li class="has-sub">
                                <a href="javascript:void(0)">Logo</a>
                                <div class="sub-menu">
                                    <div class="container">
                                        <div class="sub-menu-list">
                                            <a class="" href="/thiet-ke-website" title="Thiết kế website">
                                                Thiết Kế Logo
                                            </a>
                                            <a class="" href="/chung-chi-ssl" title=" Chứng chỉ SSL">
                                                Xây dựng câu chuyện logo
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li class="has-sub">
                                <a href="javascript:void(0)">Copy website</a>
                                <div class="sub-menu">
                                    <div class="container">
                                        <div class="sub-menu-list">
                                            <a class="" href="/thiet-ke-website" title="Thiết kế website">
                                                Thiết Kế Bộ Nhận Diện Thương Hiệu
                                            </a>
                                            <a class="" href="/chung-chi-ssl" title=" Chứng chỉ SSL">
                                                Thiết Kế Card Visit
                                            </a>
                                            <a class="" href="/lap-trinh-app-web" title="Lập trình app web">
                                                Thiết Kế Hồ Sơ Năng Lực
                                            </a>
                                            <a class="" href="/chien-dich-quang-cao" title="Chiến dịch quảng cáo">
                                                Thiết Kế Catalogue
                                            </a>
                                            <a class="" href="/chung-chi-ssl" title=" Chứng chỉ SSL">
                                                Tem Nhãn, Bao Bì Sản Phẩm
                                            </a>
                                            <a class="" href="/chung-chi-ssl" title=" Chứng chỉ SSL">
                                                Thiết Kế Tờ Rơi, Tờ Gấp
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li class="">
                                <a href="/gioi-thieu" title=" Giới thiệu">
                                    outsource</a>
                            </li>
                            <li class="">
                                <a href="/quy-trinh" title="Quy trình">API for developer</a>
                            </li>
                            <!-- <li class="">
                                <a href="/blog" title="Blog">Blog</a>
                            </li>
                            <li class="">
                                <a href="/thiet-ke-website-ban-hang" title="Thương mại điện tử">Thương mại điện
                                    tử</a>
                            </li> -->
                            <li class="">
                                <a href="/lien-lac" title="Liên lạc">Liên hệ</a>
                            </li>
                        </ul>
                    </div>

                    <a class="hamburger hamburger--collapse toggle-menu" href="javascript:void(0)"> <span
                                class="hamburger-inner"> </span></a>
                </div>
            </div>
        </div>
    </div>
</header>


@yield('main')

<a id="back-to-top" style="padding: 2px 5px !important;">
    <svg style="width: 32px; height: 32px;" viewBox="0 0 24 22">
        <path fill="currentColor" d="M7.41,15.41L12,10.83L16.59,15.41L18,14L12,8L6,14L7.41,15.41Z"></path>
    </svg>
</a>
<a id="hot-line" href="tel:028 6273 0815" style="padding: 7.5px 12px !important;">
    <em class="mdi-phone"></em>
</a>
<footer class="canhcam-footer">
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-lg-3">
                <div class="footer-item">
                    <div class="footer-item">
                        <h5 style="font-size: 14px; color: #666;">LIÊN HỆ</h5>
                        <p>Công ty Thiết kế website Cánh Cam</p>
                        <p>156 Nguyễn Văn Thủ, Quận 1, Tp.Hồ Chí Minh</p>
                        <p>info@canhcam.vn</p>
                        <p>support@canhcam.vn</p>
                        <p>Hotline: <a style="text-decoration: none; display: inline;" href="tel:028 6273 0815">028
                                6273 0815</a></p>
                        <br />
                        <br />
                        <div style="display: flex;">
                            <a href="https://www.facebook.com/thietkewebsitecanhcam/" target="_blank"
                               rel="nofollow noopener"><img src="{{$config->static}}/assets/images/uploaded/blog/facebook.png"
                                                            alt="" /></a>&nbsp;&nbsp;
                            <a href="https://www.youtube.com/user/canhcamhere" target="_blank"
                               rel="nofollow noopener"><img src="{{$config->static}}/assets/images/uploaded/blog/youtube.png"
                                                            alt="" /></a>
                        </div>
                        <p></p>
                        <p style="margin-top: 5px;">Giấy chứng nhận ĐKKD số 0303948883 do Sở Kế hoạch và Đầu tư
                            TP.HCM cấp ngày 12/08/2005</p>
                        <p></p>
                        <a href="http://online.gov.vn/Home/WebDetails/78182" rel="nofollow">
                            <img class="lazyload" style="width: 9rem; margin-top: 15px; margin-bottom: 0px;"
                                 data-src="{{$config->static}}/assets/images/uploaded/logoSaleNoti.png"
                                 src="https://www.canhcam.vn/assets/img/deafault-image_120x120.jpg"
                                 alt="Logo bộ công thương" />
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-3">
                <div class="footer-item" data-aos="zoom-in" data-aos-duration="1000" data-aos-delay="800">
                    <h5 style="font-size: 14px; color: #666;">GIỚI THIỆU</h5>
                    <p>
                        <a href="/gioi-thieu" target="_blank" rel="noopener">Giới thiệu công ty</a>
                        <a href="/ceo" target="_blank" rel="noopener">Giới thiệu CEO</a>
                        <!-- <a href="/chinh-sach" target="_blank" rel="noopener">Chính sách bảo mật</a>
<a href="/dieu-khoan-su-dung" target="_blank" rel="noopener">Điều khoản sử dụng</a> -->
                        <a href="/tuyen-dung" target="_blank" rel="noopener">Tuyển dụng</a>
                    </p>
                    <p>
                        <img src="{{$config->static}}/assets/media/logo/logo2.jpg" alt="Công ty thiết kế website" /> <a
                                href="https://www.google.com/partners/agency?id=9777635549" rel="nofollow"> <img
                                    src="{{$config->static}}/assets/media/logo/gg.png" alt="" /> </a>
                    </p>
                </div>
            </div>
            <div class="col-md-6 col-lg-2">
                <div class="footer-item">
                    <h5 style="font-size: 14px; color: #666;">DỊCH VỤ KHÁC</h5>
                    <!-- <p><a href="http://www.canhcam.com/service/brand-strategy-chien-luoc-thuong-hieu/" target="_blank" rel="noopener nofollow">Làm thương hiệu</a><a href="http://www.canhcam.com/service/brand-naming-dat-ten-thuong-hieu/" target="_blank" rel="noopener nofollow">Đặt tên thương hiệu</a><a href="http://www.canhcam.com/service/online-identity/" target="_blank" rel="noopener nofollow">Bảo hiểm tìm kiếm</a></p>-->
                    <h5 style="font-size: 14px; color: #666;">MAP</h5>
                    <p>
                        <iframe width="100%" height="200" style="border: 0;"
                                src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d7838.612211046307!2d106.696864!3d10.787851!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xb2887356ab89d12b!2sC%C3%A1nh%20Cam%20-%20Web%20Design%20Agency!5e0!3m2!1svi!2sus!4v1612582825894!5m2!1svi!2sus"
                                frameborder="0" allowfullscreen="allowfullscreen" aria-hidden="false" tabindex="0"
                                loading="lazy"></iframe>
                    </p>
                </div>
            </div>
            <div class="col-md-6 col-lg-4">
                <div class="footer-item">
                    <h5 style="font-size: 14px; color: #666;">YÊU CẦU GỌI TƯ VẤN</h5>
                    <p>Điền thông tin để nhận cuộc gọi từ chuyên viên tư vấn thiết kế website</p>
                    <div class="wrap-form form-contact-footer">
                        <form id="formContactFooter" method="post" action="/FormWizard/SaveForm">
                            <div class="form-group">
                                <input id="Footer_FullName" class="validate" data-rule-required="true"
                                       data-msg-required="Vui lòng nhập họ và tên" name="Footer_FullName"
                                       placeholder="Họ và tên" />
                            </div>
                            <div class="form-group">
                                <input id="Footer_CompanyName" class="validate" data-rule-required="true"
                                       data-msg-required="Vui lòng nhập tên công ty" name="Footer_CompanyName"
                                       placeholder="Tên công ty" />
                            </div>
                            <div class="form-group">
                                <input id="Footer_Phone" maxlength="15" class="validate" data-rule-required="true"
                                       data-msg-required="Vui lòng nhập số điện thoại" name="Footer_Phone"
                                       placeholder="Số điện thoại" />
                            </div>
                            <div class="frm-btnwrap">
                                <div class="frm-btn">
                                    <input type="submit" value="Gửi" />
                                </div>
                            </div>
                            <input name="__RequestVerificationToken" type="hidden"
                                   value="CfDJ8NQdAGGgYABGrHDhz9SQscC69XGhUWxVoCl2Zw42xHoo3ZyIz-spVvilFO16b052z0pJnA737wdZF23c1vqlM-22ca748aHGNlKSFlCAem9JHVht58qomVgBI5WVLASadvW7JtLsHX-UrT_3SZqs51o" />
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="footer-bottom">
                    <div class="copyright">
                        <p>© 2015-2021 Công ty thiết kế website Cánh Cam</p>
                    </div>
                    <nav class="footer-nav">
                        <a href="/dieu-khoan-su-dung">Điều khoản sử dụng</a>
                        <a href="/chinh-sach">Chính sách</a>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</footer>
<script async="" defer="" src="{{$config->static}}/theme/js/home.min.js"></script>
<!--

<script async="" defer="">
    function SetDisableInput($form, enable) {
        $($form).find("input[type='submit']").prop('disabled', enable);
        if (!enable) {
            $($form).find(".loading-img").remove();
        } else {
            if ($($form).find(".loading-img").length == 0)
                $($form).prepend('<div class="loading-img"><img src="/assets/img/loading.gif" /></div>');
        }
    }
    function ErrorMessager(msg) {
        if (msg != null)
            alert(msg);
        else
            alert("Hệ thống đang nâng câp. Xin vui lòng gọi tới 028 6273 0815");
    }
    function CompareLink($link1, $link2) {
        if ($link1 === undefined || $link2 === undefined)
            return false;
        if ($link2.includes("http") && !$link1.includes("http")) {
            $link1 = window.location.protocol + '//' + window.location.hostname + $link1;
        }
        if ($link1 == $link2) return true;

        return false;
    }
    $(function () {
        $(window).scroll(function () {
            $(this).scrollTop() > 100 ? $("#back-to-top").fadeIn() : $("#back-to-top").fadeOut()
        });
        $("#back-to-top").click(function () {
            return $("body,html").animate({
                scrollTop: 0
            }, 800), !1
        })
    });
    $(document).on("click", "#popupBeforeExitPage .close", function () {
        $("#popupBeforeExitPage").hide();
    });
    $(document).ready(function () {
        if ($("#popupBeforeExitPage").length > 0) {
            $("a.btn-openpopup").click(function (e) {
                e.preventDefault();
                $("#popupBeforeExitPage").show();
                return false;
            });
        }
        $(".breadcrumb a").each(function () {
            var link = $(this).attr("href");
            var id = $(this).next().attr("id");
            if (id != undefined && id != '')
                link = id;
            if (link != "/") {
                $("body a").each(function () {
                    if ($(this).parents('.breadcrumb').length == 0) {
                        var link2 = $(this).attr("href");
                        if (CompareLink(link, link2)) {
                            $(this).addClass("active");
                            $(this).parent().addClass("active");
                            let submenu = $(this).parents(".sub-menu");
                            if ($(submenu).parents("header").length == 0)
                                $(submenu).show();
                        }
                    }
                });
            }

        });

        $(".frmNewsLetter form").submit(function (e) {
            e.preventDefault();
            var $form = this;
            let formValid = ValidateForm.validate($form);
            if (formValid) {
                var data = $(".frmNewsLetter form").serialize();
                $.ajax({
                    type: 'post',
                    url: $($form).attr("action"),
                    data: data,
                    success: function (result) {
                        if (result.success) {
                            $(".frmNewsLetter").html(result.message);
                        }
                        else {
                            ErrorMessager(result.message);
                        }

                    },
                    error: function (result) { ErrorMessager(); }
                });
            }
            return false;
        });

        $("footer form").submit(function (e) {
            e.preventDefault();
            var $form = this;
            SetDisableInput($form, true);
            let formValid = ValidateForm.validate($form);
            if (formValid) {
                SetDisableInput($form, true);
                var data = $("footer form").serialize();
                data = data + "&FormName=RequestCallForAdvice&FormElement=Footer_FullName;Footer_Phone;Footer_CompanyName";
                $.ajax({
                    type: 'post',
                    url: $($form).attr("action"),
                    data: data,
                    success: function (result) {
                        if (result.success) {
                            $(".form-contact-footer").html(result.message);
                        }
                        else {
                            ErrorMessager(result.message);
                        }

                    },
                    complete: function (result) { SetDisableInput($form, false); },
                    error: function (result) { ErrorMessager(); }
                });
            }
            else
                SetDisableInput($form, false);
            return false;
        });

        $(".form-contact form").submit(function (e) {
            e.preventDefault();
            var $form = this;
            SetDisableInput($form, true);
            let formValid = ValidateForm.validate($form);
            if (formValid) {
                SetDisableInput($form, true);
                var data = $(".form-contact form").serialize();
                data = data + "&FormName=ContactFormPage&FormElement=Contact_FullName;Contact_CompanyName;Contact_Email;Contact_Phone;Contact_Services;Contact_Note";
                $.ajax({
                    type: 'post',
                    url: $($form).attr("action"),
                    data: data,
                    success: function (result) {
                        if (result.success) {
                            $(".form-contact").html(result.message);
                        }
                        else {
                            ErrorMessager(result.message);
                        }
                    },
                    complete: function (result) { SetDisableInput($form, false); },
                    error: function (result) { ErrorMessager(); }
                });
            }
            else
                SetDisableInput($form, false);
            return false;
        });

        $("#popupBeforeExitPage form").submit(function (e) {
            e.preventDefault();
            var $form = this;
            let formValid = ValidateForm.validate($form);
            if (formValid) {
                var data = $("#popupBeforeExitPage form").serialize();
                data = data + "&FormName=BeforeExitPage&FormElement=FormBeforeExitPage_FullName;FormBeforeExitPage_Phone;FormBeforeExitPage_CompanyName";
                $.ajax({
                    type: 'post',
                    url: $($form).attr("action"),
                    data: data,
                    success: function (result) {
                        if (result.success) {
                            $("#popupBeforeExitPage #frmBeforeExitPage").html(result.message);
                            $("#popupBeforeExitPage .Module-1231 .ModuleContent").addClass("success");
                        }
                        else {
                            ErrorMessager(result.message);
                        }
                    },
                    error: function (result) { ErrorMessager(); }
                });
            }
            return false;
        });
    });

    var ValidateForm = {
        setupOnkeyup: false,
        validate: function (form) {
            let formValid = true;
            let elements = $(form).find(".validate");
            elements.each(function () {
                let elementValid = ValidateForm.check(this);
                if (formValid)
                    formValid = elementValid;
                ValidateForm.onkeyup(this);
            });
            ValidateForm.setupOnkeyup = true;
            return formValid;
        },
        check: function (element) {
            let elementValid = true;
            if ($(element).data("rule-phone-number") === true) {
                elementValid = ValidateForm.phoneNumber(element);
            } else if ($(element).data("rule-email") === true) {
                elementValid = ValidateForm.email(element);
            } else if ($(element).data("rule-required") === true) {
                elementValid = ValidateForm.required(element);
            }
            if (elementValid === true)
                ValidateForm.removeLabel(element);
            return elementValid;
        },
        required: function (element) {
            if (!this.validateRequired(element)) {
                this.showLabel(element, $(element).data("msg-required"));
                return false;
            }
            return true;
        },
        phoneNumber: function (element) {
            if (!this.required(element))
                return false;
            ValidateForm.removeLabel(element);
            if (!this.validatePhoneNumber(element)) {
                this.showLabel(element, $(element).data("msg-phone-number"));
                return false;
            }
            return true;
        },
        email: function (element) {
            if (!this.required(element))
                return false;
            ValidateForm.removeLabel(element);
            if (!this.validateEmail(element)) {
                this.showLabel(element, $(element).data("msg-email"));
                return false;
            }
            return true;
        },
        validateRequired: function (element) {
            let value = $(element).val();
            if (element.nodeName.toLowerCase() === "select") {
                return value && value.length > 0;
            }
            return value !== undefined && value !== null && value.length > 0;
        },
        validatePhoneNumber: function (element) {
            let phoneNumber = $(element).val();
            let phoneNumberPattern = /^\+?[0-9]{3}-?[0-9]{6,12}$/;
            return phoneNumberPattern.test(phoneNumber);
        },
        validateEmail: function (element) {
            let value = $(element).val();
            // From https://html.spec.whatwg.org/multipage/forms.html#valid-e-mail-address
            // Retrieved 2014-01-14
            // If you have a problem with this implementation, report a bug against the above spec
            // Or use custom methods to implement your own email validation
            return /^[a-zA-Z0-9.!#$%&'*+\/=?^_`{|}~-]+@[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?(?:\.[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?)*$/.test(value);
        },
        idOrName: function (element) {
            return (this.checkable(element) ? element.name : element.id || element.name);
        },
        checkable: function (element) {
            return (/radio|checkbox/i).test(element.type);
        },
        showLabel: function (element, message) {
            let elementID = this.idOrName(element);
            let error = $("<label>")
                .attr("id", elementID + "-error").attr("for", elementID)
                .addClass("error")
                .css("display", "block")
                .html(message || "");
            if ($("label[for='" + elementID + "']").length === 0)
                $(element).after(error);

        },
        removeLabel: function (element) {
            let elementID = this.idOrName(element);
            if ($("label[for='" + elementID + "']").length > 0)
                $("label[for='" + elementID + "']").remove();
        },
        onkeyup: function (element) {
            if (!ValidateForm.setupOnkeyup) {
                if (element.nodeName.toLowerCase() === "select") {
                    $(element).change(function () {
                        ValidateForm.check(element);
                    });
                } else if (element.nodeName.toLowerCase() === "input") {
                    $(element).keyup(function () {
                        ValidateForm.check(element);
                    });
                }
            }
        }
    };
</script> -->

<style>
    #back-to-top {
        display: none;
        cursor: pointer;
        overflow: hidden;
        text-align: center;
        background-color: #4a20e9;
        border: 1px solid #ddd;
        color: #fff;
        border-radius: 50%;
        position: fixed;
        right: 20px;
        bottom: 70px;
        z-index: 9999999;
        padding: 10px;
    }

    #hot-line {
        cursor: pointer;
        overflow: hidden;
        text-align: center;
        background-color: #4a20e9;
        border: 1px solid #ddd;
        color: #fff;
        border-radius: 50%;
        position: fixed;
        right: 20px;
        bottom: 120px;
        z-index: 9999999;
        padding: 10px;
    }

    #back-to-top,
    #hot-line {
        display: flex;
        justify-content: center;
        align-items: center;
        height: 44px;
        width: 44px;
    }

    #back-to-top em,
    #hot-line em {
        font-size: 18px;
        color: #fff;
    }
</style>
<!--
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-NDTL4Q" height="0" width="0"
        style="display:none;visibility:hidden"></iframe></noscript> -->

<script type="application/ld+json">
            {
                "@context": "https://schema.org/",
                "@graph": [
                    {
                        "@type": "website",
                        "@id": "https://www.canhcam.vn#website",
                        "name": "Thiết Kế Web Cánh Cam",
                        "url": "https://www.canhcam.vn",
                        "description": "Công ty chuyên thiết kế website cao cấp ☎️ 28 6273 0815, dịch vụ thiết kế website chuyên nghiệp, chuẩn SEO ✅✅ uy tín hàng đầu trong lĩnh vực thiết kế web",
                        "publisher": {
                            "@id": "kg:/g/1tmqj8lt"
                        },
                        "author": {
                            "@id": "kg:/g/1tmqj8lt"
                        },
                        "copyrightHolder": {
                            "@id": "kg:/g/1tmqj8lt"
                        },
                        "about": {
                            "@type": "thing",
                            "@id": "kg:/m/086df",
                            "name": "Thiết kế website",
                            "url": "https://www.canhcam.vn/thiet-ke-website",
                            "additionalType": "https://www.wikidata.org/wiki/Q190637",
                            "Description": "Thiết kế web hay thiết kế website đơn giản là công việc tạo một trang web cho cá nhân, công ty, doanh nghiệp hoặc tổ chức. Có 2 phương thức chính để thiết kế Web đó là: thiết kế Web tĩnh và thiết kế Web động.",
                            "sameas": "https://vi.wikipedia.org/wiki/Thi%E1%BA%BFt_k%E1%BA%BF_web"
                        }
                    },
                    {
                        "@type": "webpage",
                        "@id": "https://www.canhcam.vn#webpage",
                        "name": "Thiết Kế Website Cao Cấp Và Chuyên Nghiệp",
                        "headline": "DỊCH VỤ THIẾT KẾ WEBSITE",
                        "primaryImageOfPage": {
                            "@id": "https://www.canhcam.vn/#primaryimage"
                        },
                        "description": "Dịch vụ thiết kế web không chỉ đẹp mắt ✅✅ mà còn mang về nhiều lượt truy cập, nhiều đơn hàng Công ty thiết kế website chuyên nghiệp ☎️ 28 6273 0815",
                        "url": "https://www.canhcam.vn",
                        "inLanguage": "Vi-VN",
                        "isPartOf": {
                            "@id": "https://www.canhcam.vn/#website"
                        }
                    },
                    {
                        "@type": "LocalBusiness",
                        "@id": "kg:/g/1tmqj8lt",
                        "name": "Thiết Kế Web Cánh Cam",
                        "legalName": "Công Ty TNHH Tư Vấn Thiết Kế Phần Mềm Cánh Cam",
                        "additionalType": ["Cánh Cam", "Cánh Cam agency", "Công ty thiết kế Webite Cánh Cam"],
                        "description": "Công ty chuyên thiết kế website trọn gói theo yêu cầu với các dịch vụ chuyên nghiệp uy tín hàng đầu về sáng tạo nội dung tiếp thị,lập trình web",
                        "url": "https://www.canhcam.vn/",
                        "mainEntityOfPage": {
                            "@type": "webpage",
                            "@id": "https://www.canhcam.vn/gioi-thieu#webpage"
                        },
                        "sameAs": [
                            "https://www.facebook.com/thietkewebsitecanhcam",
                            "https://twitter.com/tkwebcanhcam",
                            "https://www.linkedin.com/in/tkwebcanhcam/",
                            "https://tkwebcanhcam.tumblr.com/",
                            "https://www.pearltrees.com/tkwebcanhcam",
                            "https://www.instagram.com/tkwebcanhcam/",
                            "https://myspace.com/tkwebcanhcam",
                            "https://www.pinterest.com/tkwebcanhcam/",
                            "https://www.youtube.com/channel/UCJGdcxvQzfkl3XudFkqnbIQ/about",
                            "https://www.scoop.it/u/tkwebcanhcam",
                            "https://getpocket.com/@tkwebcanhcam",
                            "https://www.diigo.com/user/tkwebcanhcam",
                            "https://vimeo.com/tkwebcanhcam",
                            "https://www.instapaper.com/p/tkwebcanhcam",
                            "https://www.plurk.com/tkwebcanhcam",
                            "https://issuu.com/tkwebcanhcam",
                            "https://www.reddit.com/user/tkwebcanhcam/",
                            "https://www.flickr.com/people/tkwebcanhcam/",
                            "https://www.allmyfaves.com/tkwebcanhcam"
                        ],
                        "currenciesAccepted": "VND",
                        "openingHours": ["Mo, Tu, We, Th, Fr, Sa"],
                        "paymentAccepted": ["Cash", "Credit Card"],
                        "priceRange": "750000-450000000",
                        "logo": {
                            "@type": "ImageObject",
                            "@id": "https://www.canhcam.vn/#logo",
                            "url": "https://www.canhcam.vn/Data/media/img/logo.png",
                            "width": 180,
                            "height": 33
                        },
                        "slogan": "we're cánh cam",
                        "image": {
                            "@id": "https://www.canhcam.vn/#logo"
                        },
                        "location": {
                            "@type": "PostalAddress",
                            "@id": "https://www.canhcam.vn/#address",
                            "name": "Văn phòng đại diện",
                            "streetAddress": "156 Nguyễn Văn Thủ, Quận 1, Tp.Hồ Chí Minh",
                            "addressLocality": "Quận 1",
                            "addressRegion": "Hồ chí minh",
                            "addressCountry": "Việt Nam"
                        },
                        "address": {
                            "@id": "https://www.canhcam.vn#address"
                        },
                        "hasMap": "https://www.google.com/maps?cid=12864659151666139435",
                        "areaServed": {
                            "@type": "AdministrativeArea",
                            "name": "Việt Nam",
                            "@id": "kg:/m/01crd5",
                            "url": "https://vi.wikipedia.org/wiki/Vi%E1%BB%87t_Nam",
                            "hasMap": "https://www.google.com/maps?cid=12698937955444482750"
                        },
                        "award": "Top 1 dịch vụ thiết kế website tại Việt Nam",
                        "contactPoint": {
                            "@type": "contactPoint",
                            "email": "info@canhcam.vn",
                            "telephone": "028-6273-0815",
                            "areaServed": {
                                "@id": "kg:/m/01crd5"
                            }
                        },
                        "telephone": "028-6273-0815",
                        "employees": {
                            "@type": "person",
                            "name": "Hứa Thiên Vương",
                            "url": ["https://www.canhcam.vn/ceo"],
                            "image": "https://www.canhcam.vn/content/images/uploaded/IMG_3609.png",
                            "jobTitle": {
                                "@type": "DefinedTerm",
                                "name": "CEO",
                                "description": "Tổng giám đốc điều hành (tiếng Anh: Chief Executive Officer - CEO hay tổng giám đốc) là chức vụ điều hành cao nhất của một tổ chức, phụ trách tổng điều hành một tập đoàn, công ty, tổ chức hay một cơ quan. CEO phải báo cáo trước hội đồng quản trị của tổ chức đó. Thuật ngữ tương đương của CEO có thể là giám đốc quản lý (MD)[1] và giám đốc điều hành (CE",
                                "url": "https://vi.wikipedia.org/wiki/T%E1%BB%95ng_gi%C3%A1m_%C4%91%E1%BB%91c_%C4%91i%E1%BB%81u_h%C3%A0nh"
                            }
                        },
                        "founder": {
                            "@type": "Person",
                            "alternateName": ["Nguyễn Xuân Việt", "Nguyen Xuan Viet"],
                            "sameAs": [
                                "https://www.facebook.com/viet.nguyenxuan.50",
                                "https://twitter.com/nguyenxuanviett",
                                "https://www.linkedin.com/in/nguyenxuanviet/",
                                "https://nguyenxuanviet.tumblr.com/",
                                "https://www.pearltrees.com/nguyenxuanviet",
                                "https://www.instagram.com/nguyenxuanviett/",
                                "https://myspace.com/nguyenxuanviet",
                                "https://www.pinterest.com/nguyenxuanviett/_saved/",
                                "https://www.youtube.com/channel/UC_UdatVPvT-W4Gv8FJ2qO_g",
                                "https://www.diigo.com/user/nguyenxuanviet",
                                "https://www.reddit.com/user/nguyenxuanviett",
                                "https://vimeo.com/nguyenxuanviet",
                                "https://www.flickr.com/people/nguyenxuanviet/",
                                "https://www.scoop.it/u/nguyenxuanviet",
                                "https://www.instapaper.com/p/nguyenxuanviet"
                            ],
                            "address": {
                                "@type": "PostalAddress",
                                "addressLocality": "Hồ Chí Minh, Việt Nam",
                                "addressRegion": "Việt Nam"
                            },
                            "knows": [
                                {
                                    "@context": "https://schema.org",
                                    "@type": "Person",
                                    "sameAs": ["https://www.linkedin.com/in/smalyshev"],
                                    "name": "Stanislav Malyshev",
                                    "url": "https://github.com/smalyshev",
                                    "@id": "https://github.com/smalyshev#person",
                                    "mainEntityOfPage": "https://github.com/smalyshev",
                                    "image": "https://avatars.githubusercontent.com/u/155000?s=460&v=4"
                                }
                            ],
                            "knowsAbout": [
                                {
                                    "@type": "Specialty",
                                    "additionalType": ["https://www.google.com/search?q=thiết+kế+web&kponly=&kgmid=/m/086df"],
                                    "sameAs": ["https://vi.wikipedia.org/wiki/Thi%E1%BA%BFt_k%E1%BA%BF_web"],
                                    "name": "Thiết kế web",
                                    "description": "Thiết kế web hay thiết kế website đơn giản là công việc tạo một trang web cho cá nhân, công ty, doanh nghiệp hoặc tổ chức. Có 2 phương thức chính để thiết kế Web đó là: thiết kế Web tĩnh và thiết kế Web động",
                                    "url": "https://www.canhcam.vn/thiet-ke-website",
                                    "@id": "kg:/m/086df"
                                }
                            ],
                            "url": "https://www.facebook.com/viet.nguyenxuan.50",
                            "mainEntityOfPage": "https://www.facebook.com/viet.nguyenxuan.50",
                            "@id": "https://www.facebook.com/viet.nguyenxuan.50#person",
                            "familyName": "Nguyễn",
                            "additionalName": "Xuân",
                            "givenName": "Việt",
                            "name": "Nguyễn Xuân Việt",
                            "height": "1m68",
                            "description": "Nguyễn Xuân Việt, với vai trò là Co-founder của công ty thiết kế website Cánh Cam, hơn ai hết anh Nguyễn Xuân Việt hiểu rõ sứ mệnh và trách nhiệm của mình trong việc chèo lái con thuyền theo đúng hướng với những cam kết cùng khách hàng và niềm tin của đội ngũ nhân viên.",
                            "jobTitle": {
                                "@type": "DefinedTerm",
                                "name": "Organizational founder",
                                "description": "An organizational founder is a person who has undertaken some or all of the formational work needed to create a new organization, whether it is a business, a charitable organization, a governing body, a school, a group of entertainers, or any other type of organization. If there are multiple founders, each can be referred to as a co-founder",
                                "url": ["https://en.wikipedia.org/wiki/Organizational_founder"]
                            },
                            "gender": "https://schema.org/Male",
                            "email": "ceonguyenxuanviet@gmail.com",
                            "image": "https://www.canhcam.vn/Data/media/staff/untitled-7.png",
                            "birthDate": "1976-10-25",
                            "worksFor": {
                                "@id": "kg:/g/1tmqj8lt"
                            },
                            "nationality": {
                                "@type": "Country",
                                "@id": "kg:/m/0hn4h",
                                "url": "https://vi.wikipedia.org/wiki/H%E1%BB%93_Ch%C3%AD_Minh",
                                "name": "Việt Nam",
                                "sameAs": "https://en.wikipedia.org/wiki/Ho_Chi_Minh",
                                "logo": "https://photo-3-baomoi.zadn.vn/w1000_r1/2018_02_02_65_24831092/d4c839b2c2f42baa72e5.jpg",
                                "hasMap": "https://goo.gl/maps/VNYWxB4amBMTfEUv8"
                            },
                            "alumniOf": [
                                {
                                    "@type": "EducationalOrganization",
                                    "name": "Trường Đại học Bách khoa - Đại học Quốc gia TP.HCM",
                                    "description": "Trường Đại học Bách khoa là trường đại học chuyên ngành kỹ thuật đầu ngành tại Việt Nam, thành viên của hệ thống Đại học Quốc gia, được xếp vào nhóm đại học trọng điểm quốc gia Việt Nam.",
                                    "url": "https://www.hcmut.edu.vn/vi",
                                    "logo": "https://upload.wikimedia.org/wikipedia/vi/thumb/c/cd/Logo-hcmut.svg/200px-Logo-hcmut.svg.png"
                                },
                                {
                                    "@type": "EducationalOrganization",
                                    "name": "Trường Trung học Phổ thông Chuyên Bến Tre",
                                    "description": "Trường Trung học Phổ thông Chuyên Bến Tre, tên gọi khác là trường Phổ thông Trung học Bến Tre là trường thuộc tỉnh Bến Tre, đào tạo học sinh năng khiếu của tỉnh Bến Tre.",
                                    "url": "https://thptchuyenbentre.edu.vn/",
                                    "logo": "https://upload.wikimedia.org/wikipedia/vi/c/c6/BenTreHighSchool.jpg"
                                }
                            ]
                        },
                        "foundingDate": "2005-08-12",
                        "foundingLocation": {
                            "@type": "place",
                            "@id": "kg:/m/0hn4h",
                            "name": "Hồ Chí Minh",
                            "URL": "https://vi.wikipedia.org/wiki/H%E1%BB%93_Ch%C3%AD_Minh",
                            "hasmap": "https://www.google.com/maps?cid=17392719987004412203"
                        },
                        "hasOfferCatalog": {
                            "@type": "OfferCatalog",
                            "itemListElement": [
                                {
                                    "@type": "ListItem",
                                    "item": {
                                        "@type": "service",
                                        "@id": "https://www.canhcam.vn/thiet-ke-website#service",
                                        "name": "Thiết kế website",
                                        "url": "https://www.canhcam.vn/thiet-ke-website"
                                    }
                                },
                                {
                                    "@type": "ListItem",
                                    "item": {
                                        "@type": "service",
                                        "@id": "https://www.canhcam.vn/viet-noi-dung-web#service",
                                        "name": "Viết nội dung web",
                                        "url": "https://www.canhcam.vn/viet-noi-dung-web"
                                    }
                                },
                                {
                                    "@type": "ListItem",
                                    "item": {
                                        "@type": "service",
                                        "@id": "https://www.canhcam.vn/e-commerce#service",
                                        "name": "e-commerce",
                                        "url": "https://www.canhcam.vn/e-commerce"
                                    }
                                },
                                {
                                    "@type": "ListItem",
                                    "item": {
                                        "@type": "service",
                                        "@id": "https://www.canhcam.vn/lap-trinh-app-web#service",
                                        "name": "Lập trình app web",
                                        "url": "https://www.canhcam.vn/lap-trinh-app-web"
                                    }
                                },
                                {
                                    "@type": "ListItem",
                                    "item": {
                                        "@type": "service",
                                        "@id": "https://www.canhcam.vn/chien-dich-quang-cao#service",
                                        "name": "Chiến dịch quảng cáo",
                                        "url": "https://www.canhcam.vn/chien-dich-quang-cao"
                                    }
                                },
                                {
                                    "@type": "ListItem",
                                    "item": {
                                        "@type": "service",
                                        "@id": "https://www.canhcam.vn/hosting-ten-mien#service",
                                        "name": "Hosting - Tên miền",
                                        "url": "https://www.canhcam.vn/hosting-ten-mien"
                                    }
                                },
                                {
                                    "@type": "ListItem",
                                    "item": {
                                        "@type": "service",
                                        "@id": "https://www.canhcam.vn/chung-chi-ssl#service",
                                        "name": "chứng chỉ ssl",
                                        "url": "https://www.canhcam.vn/chung-chi-ssl"
                                    }
                                }
                            ]
                        },
                        "interactionStatistic": "4000",
                        "knowsAbout": [
                            {
                                "@id": "kg:/m/086df"
                            }
                        ],
                        "knowsLanguage": ["vi", "en"],
                        "numberOfEmployees": "70",
                        "taxID": "0303948883"
                    }
                ]
            }
        </script>
<!--
<script type="text/javascript"
    id="">!function (b, e, f, g, a, c, d) { b.fbq || (a = b.fbq = function () { a.callMethod ? a.callMethod.apply(a, arguments) : a.queue.push(arguments) }, b._fbq || (b._fbq = a), a.push = a, a.loaded = !0, a.version = "2.0", a.queue = [], c = e.createElement(f), c.async = !0, c.src = g, d = e.getElementsByTagName(f)[0], d.parentNode.insertBefore(c, d)) }(window, document, "script", "https://connect.facebook.net/en_US/fbevents.js"); fbq("init", "1743036689276657"); fbq("track", "PageView");</script>
<noscript><img height="1" width="1" style="display:none"
        src="https://www.facebook.com/tr?id=1743036689276657&amp;ev=PageView&amp;noscript=1"></noscript>
<script type="text/javascript" id="gtm-jq-ajax-listen">(function () {
        function h(b) { "undefined" !== typeof jQuery ? (k = jQuery, n()) : 20 > b && setTimeout(h, 500) } function n() {
            k(document).bind("ajaxComplete", function (b, a, f) {
                var c = document.createElement("a"); c.href = f.url; var g = "/" === c.pathname[0] ? c.pathname : "/" + c.pathname, d = "?" === c.search[0] ? c.search.slice(1) : c.search; d = l(d, "\x26", "\x3d", !0); var e = l(a.getAllResponseHeaders(), "\n", ":"); dataLayer.push({
                    event: "ajaxComplete", attributes: {
                        type: f.type || "", url: c.href || "", queryParameters: d, pathname: g || "", hostname: c.hostname ||
                            "", protocol: c.protocol || "", fragment: c.hash || "", statusCode: a.status || "", statusText: a.statusText || "", headers: e, timestamp: b.timeStamp || "", contentType: f.contentType || "", response: a.responseJSON || a.responseXML || a.responseText || ""
                    }
                })
            })
        } function l(b, a, f, c) { var g = {}; if (!b || !a || !f) return {}; if (b = b.split(a)) for (a = 0; a < b.length; a++) { var d = c ? decodeURIComponent(b[a]) : b[a], e = d.split(f); d = m(e[0]); e = m(e[1]); d && e && (g[d] = e) } return g } function m(b) { if (b) return b.replace(/^[\s\uFEFF\xA0]+|[\s\uFEFF\xA0]+$/g, "") } var k; h()
    })();</script>
<iframe data-product="web_widget" title="No content" tabindex="-1" aria-hidden="true" src="about:blank"
    style="width: 0px; height: 0px; border: 0px; position: absolute; top: -9999px;"></iframe>
<div><iframe title="Mở widget để bạn trò chuyện với nhân viên hỗ trợ của chúng tôi" id="launcher" tabindex="0"
        style="width: 138px; height: 50px; padding: 0px; margin: 10px 20px; position: fixed; bottom: 0px; overflow: visible; opacity: 1; border: 0px; z-index: 999998; transition-duration: 250ms; transition-timing-function: cubic-bezier(0.645, 0.045, 0.355, 1); transition-property: opacity, top, bottom; right: 0px;"></iframe>
</div> -->
</body>

</html>
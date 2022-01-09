@extends($config->layout.'/master')

@section('main')
    @php
        $chitiet = $http->get("/san-pham/".request()->id)->data();
        $images =$media->set($chitiet['images'])->files();
    @endphp
    <main class="">

        {{-- chi-tiet-1 --}}
        @include($config->view.'/components/breadcrumbs', ['breadcrumbs'=>[['/', 'Trang chủ'], ['/san-pham', 'Sản phẩm'], ['/san-pham', 'Bài viết']]])

        {{-- chi-tiet-2 --}}
        <section class="hidden lg:block mt-5">
            @include($config->view.'/components/sliderNavVertical', [
                'sliders'=>$images,
                'height'=>'620px',
                'nav'=>['w'=>'298px', 'h'=>'298px']
            ])
        </section>

        <section class="block lg:hidden mt-5">
            @include($config->view.'/components/sliderNav', [
                'sliders'=>$images,
                'height'=>'320px',
                'nav'=>['w'=>'40px', 'h'=>'40px']
            ])
        </section>

        <section class="my-10 ">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-3">
                <h1 class="text-3xl ">{{$chitiet['title']}}</h1>
                <p class="font-light">{{$chitiet['address']}}</p>
                <hr>
                <ul class="flex space-x-3">
                    <li class="">
                        Giá: <b class="">1.6 tỷ</b>
                    </li>
                    <li class="">
                        Diện tích: <b class="">150 m2</b>
                    </li>
                </ul>
                <hr>
                <h4 class="font-bold text-xl pt-5">Thông tin mô tả</h4>
                {!! $chitiet['description'] !!}
                <h4 class="font-bold text-xl pt-5">Thông tin tổng quan dự án</h4>
                {!! $chitiet['project_info'] !!}
                <p class="font-bold">Liên hệ tư vấn : 0935.687.985 hoặc nhắn tin qua zalo, messager nhân viên hỗ trợ 24/7<br/>
                    Hashtag : khu đô thị phú mỹ quảng ngãi, dự án Phú Mỹ, nhà đất Quảng Ngãi, bất động sản Quảng Ngãi, đất nền Quảng Ngãi.</p>
            </div>
        </section>
    </main>

@endsection
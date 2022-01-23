@php
    $theloai = $http->get('/the-loai')->data();
    $sanpham = $http->get('/san-pham')->data();
@endphp
@extends($config->layout.'/master')
@section('main')
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
                        @include($config->view.'/components/product-web', ['item'=>$item])
                    @endforeach
                </div>
            </div>
        </section>
    </div>

</main>
@endsection
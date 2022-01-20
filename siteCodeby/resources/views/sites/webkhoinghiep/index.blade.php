@php
    use Cknow\Money\Money;
    use App\Services\BaseService;
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
                        <a href="{{$config->base_url}}/mau-web?{{BaseService::url($item['title'])}}&id={{$item['id']}}"
                           class="relative block bg-white rounded-lg overflow-hidden p-1 hover:shadow-lg"
                           x-data="{ show: false }" @mouseover="show = true" @mouseleave="show = false"
                        >
                            <div class="w-full aspect-w-1 aspect-h-1 rounded-lg overflow-hidden sm:aspect-w-2 sm:aspect-h-3 relative">
                                <div x-show="show"
                                     x-transition:enter="transition ease-out duration-200"
                                     x-transition:enter-start="opacity-0 -translate-y-1"
                                     x-transition:enter-end="opacity-100 translate-y-0"
                                     x-transition:leave="transition ease-in duration-150"
                                     x-transition:leave-start="opacity-100 translate-y-0"
                                     x-transition:leave-end="opacity-0 -translate-y-1"
                                     class="absolute inset-0 bg-black/50 z-10 ">
                                    <div class="absolute absolute-x absolute-y space-y-3 text-center">
                                        <button type="button"
                                                class="uppercase inline-flex items-center w-36 justify-center py-2 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-blue-400 hover:bg-blue-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="-ml-1 mr-2 h-5 w-5"
                                                 fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                      stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                      stroke-width="2"
                                                      d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                                            </svg>
                                            Xem thử
                                        </button>
                                        <button type="button"
                                                class="uppercase inline-flex items-center w-36 justify-center py-2 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-yellow-500 hover:bg-yellow-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="-ml-1 mr-2 h-5 w-5"
                                                 fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                      d="M12 4v16m8-8H4"/>
                                            </svg>
                                            Xem chi tiết
                                        </button>
                                    </div>
                                </div>

                                <img src="{{$media->set($item['image'])->first()}}"
                                     alt="{{$item['title']}}"
                                     class="w-full h-full object-center object-cover"/>
                            </div>
                            <div class="my-3 text-center ">
                                <h3 class="text-gray-900 text-base text-lg ">
                                    {{$item['title']}}
                                </h3>
                                <p class="space-x-2">
                                    @if(empty($item['price']) || empty($item['sale-price']))
                                        <span class="font-bold text-red-500">
                                                @if(empty($item['price']))
                                                @money($item['sale-price'])
                                            @else
                                                @money($item['price'])
                                            @endif
                                            </span>
                                    @else
                                        <span class="line-through text-red-300">{{Money::min(Money::VND($item['price']), Money::VND($item['sale-price']))}}</span>
                                        <span class="font-bold text-red-500">{{Money::max(Money::VND($item['price']), Money::VND($item['sale-price']))}}</span>
                                    @endif
                                </p>
                            </div>
                        </a>
                    @endforeach
                </div>
            </div>
        </section>
    </div>

</main>
@endsection
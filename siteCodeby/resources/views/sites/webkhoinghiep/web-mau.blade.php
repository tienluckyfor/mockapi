@php
    use App\Services\BaseService;
    $chitiet = $http->get('/san-pham/'.request()->id)->data();
@endphp
@extends($config->layout.'/master')
@section('main')
    <section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- grid -->
        <div class="grid grid-cols-12 gap-4">
            <div class="hidden lg:block col-span-12">
                @include($config->view.'/components/breadcrumb', ['chitiet'=>$chitiet])
            </div>
            <div class="col-span-12 lg:col-span-7">
                @foreach($media->set($chitiet['image'])->files() as $key => $item)
                    <div class="hidden lg:block rounded-md overflow-hidden border p-1">
                        <figure class="aspect-w-1 aspect-h-1 bg-gray-300 rounded-md overflow-hidden">
                            <img alt="" src="{{$item}}" class="w-full object-center object-cover"/>
                        </figure>
                    </div>
                    <div class="block lg:hidden -mx-4">
                        <figure class="aspect-w-1 aspect-h-1 bg-gray-300 ">
                            <img alt="" src="{{$item}}" class="w-full object-center object-cover"/>
                        </figure>
                    </div>
                @endforeach
            </div>
            <div class="col-span-12 lg:col-span-5 ">
                <div class="block lg:hidden">
                    @include($config->view.'/components/breadcrumb', ['chitiet'=>$chitiet])
                </div>
                @php
                    $optionPrices = [
['label'=>'Hosting 1GB + Tên miền + Hỗ trợ kỹ thuật', 'price'=>1100000],
['label'=>'Hosting 2GB + Tên miền + Hỗ trợ kỹ thuật', 'price'=>1500000],
['label'=>'Chỉ mua theme, không sử dụng hosting', 'price'=>0],
];
                @endphp
                <script>
                    document.addEventListener('alpine:init', () => {
                        Alpine.data('calculateMoney', () => ({
                            init() {
                                this.initChiTiet()
                            },
                            chitiet: {!! json_encode($chitiet) !!},
                            options: {!! json_encode($optionPrices) !!},
                            choose_option: {price: 0},
                            initChiTiet() {
                                let lastPrice, maxPrice;
                                const price = this.chitiet['price'];
                                const salePrice = this.chitiet['sale-price'];
                                if (!price) {
                                    lastPrice = salePrice;
                                }
                                if (!salePrice) {
                                    lastPrice = price;
                                }
                                if (price && salePrice) {
                                    maxPrice = price > salePrice ? price : salePrice;
                                    lastPrice = salePrice == maxPrice ? price : salePrice;
                                }
                                this.chitiet = {
                                    ...this.chitiet,
                                    maxPrice,
                                    lastPrice,
                                    link: '{{$config->base_url}}/web-mau?{{BaseService::url($chitiet['title'])}}&id={{$chitiet['id']}}',
                                    firstImage: '{{$media->set($chitiet['image'])->first()}}',
                                }
                            },
                        }))
                    })
                </script>
                <div class="space-y-3 mt-3 lg:mt-0 text-auto text-center" x-data="calculateMoney">
                    <h1 class="text-2xl font-semibold">{{$chitiet['title']}}</h1>
                    <button type="button"
                            class="inline-flex items-center px-4 py-2 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                        Xem trang thực tế
                    </button>
                    @include($config->view.'/components/price', ['item'=>$chitiet, 'css'=>'text-2xl'])
                    <section class="space-y-3 bg-yellow-200 p-3 border-2 border-dashed border-yellow-400 rounded-lg">
                        <h3 class="text-lg">BẠN ĐƯỢC GÌ KHI MUA THEME TẠI WEB KHỞI NGHIỆP?</h3>
                        <ul class="space-y-3">
                            @php
                                $arr = [
        ["image"=>$config->static."/assets/images/free.webp", "label"=>"Miễn phí cài đặt"],
        ["image"=>$config->static."/assets/images/gift-icon-1.webp", "label"=>"Hỗ trợ kỹ thuật khi có sự cố"],
        ["image"=>$config->static."/assets/images/free.webp", "label"=>"Miễn phí bộ video hướng dẫn sử dụng website"],
    ];
                            @endphp
                            @foreach($arr as $key => $item)
                                <li class="">
                                    <figure class="flex ">
                                        <div class="w-6">
                                            <div class="aspect-w-1 aspect-h-1 rounded-md overflow-hidden">
                                                <img alt=""
                                                     src="{{$item['image']}}"
                                                     class="w-full object-center object-cover"/>
                                            </div>
                                        </div>
                                        <figcaption class="ml-2">{{$item['label']}}</figcaption>
                                    </figure>
                                </li>
                            @endforeach
                        </ul>
                    </section>
                    <section class="text-left">
                        <label class="text-base font-medium text-gray-900 ">Thêm tùy chọn</label>
                        <fieldset class="mt-4">
                            <legend class="sr-only">Notification method</legend>
                            <div class="space-y-4">
                                @foreach($optionPrices as $key => $item)
                                    <div class="flex items-center">
                                        <input id="{{$key}}" name="notification-method" type="radio"
                                               x-on:change="choose_option=options[{{$key}}]"
                                               class=" cursor-pointer focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300">
                                        <label for="{{$key}}"
                                               class="ml-3 block text-sm font-medium text-gray-700  cursor-pointer">
                                            {{$item['label']}} <b class="text-red-600">@money($item['price'])</b>/ năm
                                        </label>
                                    </div>
                                @endforeach
                            </div>
                        </fieldset>
                    </section>
                    <pre style="font-size: 12px" 
                        x-text="JSON.stringify(choose_option, null, '  ')"></pre>
                    <section class="border-t pt-3 space-y-3 text-gray-400">
                        <div class="flex justify-between " x-show="choose_option.price">
                            <span class="">PHÍ TÍNH THÊM</span>
                            <b class="text-red-500" x-text="Money.convert(choose_option.price)"></b>
                        </div>
                        <div class="flex justify-between">
                            <span class="">TỔNG CỘNG</span>
                            <b class="text-red-500" x-text="Money.convert(Number(chitiet.lastPrice)+Number(choose_option.price))">-</b>
                        </div>
                        <button @click="$store.cartData.add({...chitiet, choose_option}); $store.showCart=true;"
                           class="inline-flex items-center px-4 py-2 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            Đặt mua giao diện
                        </button>
                    </section>
                </div>
            </div>
        </div>
    </section>
    @if(!empty($chitiet['description']))
        <div class="py-3 mt-4 bg-gray-100">
            <section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8  ">
                <!-- grid -->
                <div class="grid grid-cols-12 gap-4">
                    <div class="col-span-12 lg:col-span-7 space-y-3">
                        <h3 class="text-xl font-semibold">Thông tin {{$chitiet['title']}}</h3>
                        {!! $chitiet['description'] !!}
                    </div>
                </div>
            </section>
        </div>

    @endif
    <section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- grid -->
        <div class="grid grid-cols-12 gap-4">
            @if(!empty($chitiet['chuc-nang']))
                <div class="col-span-12 lg:col-span-5 space-y-3">
                    <h3 class="text-xl font-semibold">Các chức năng của {{$chitiet['title']}}</h3>
                    <!-- This example requires Tailwind CSS v2.0+ -->
                    <div class="flex flex-col">
                        <div class="-my-2 overflow-x-auto ">
                            <div class="py-2 align-middle inline-block min-w-full">
                                <div class=" border-b border-gray-200 ">
                                    <table class="min-w-full divide-y divide-gray-200 ">
                                        <tbody>
                                        @php
                                            $i=0;
                                        @endphp
                                        @foreach($chitiet['chuc-nang'] as $key => $item)
                                            @php
                                                $i++;
                                            @endphp
                                            <tr class="{{$i%2 ? 'bg-gray-50':'bg-white'}}">
                                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                                    {{$key}}
                                                </td>
                                                <td class="px-6 py-4 text-sm text-gray-500">
                                                    {{$item}}
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endif

            <div class="col-span-12 space-y-3 my-4">
                <h3 class="text-xl font-semibold">Sản phẩm tương tự {{$chitiet['title']}}</h3>
                <div class="grid grid-cols-1 gap-4 sm:grid-cols-4">
                    @php
                        $sanpham = $http->get('/san-pham', ['per_page'=>4])->data();
                    @endphp
                    @foreach($sanpham as $key => $item)
                        @include($config->view.'/components/product-web', ['item'=>$item])
                    @endforeach
                </div>
            </div>
        </div>
    </section>
@endsection
@php
    use Cknow\Money\Money;
    $theloai = $http->get('/the-loai')->data();
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
                <div class="space-y-3 mt-3 lg:mt-0">
                    <h1 class="text-2xl font-semibold">{{$chitiet['title']}}</h1>
                    <button type="button"
                            class="inline-flex items-center px-4 py-2 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                        Xem trang thực tế
                    </button>
                    @include($config->view.'/components/price', ['item'=>$chitiet, 'css'=>'text-2xl'])
                    <section class="space-y-3 bg-yellow-200 p-3 border-2 border-dashed border-yellow-400 rounded-lg">
                        <h3 class="text-lg">BẠN ĐƯỢC GÌ KHI MUA THEME TẠI WEB KHỞI NGHIỆP ?</h3>
                        <ul class="space-y-3">
                            <?php for($i = 1; $i <= 3; $i++){?>
                            <li class="">
                                <figure class="flex ">
                                    <div class="w-6">
                                        <div class="aspect-w-1 aspect-h-1 rounded-md overflow-hidden">
                                            <img alt=""
                                                 src="https://cdn-bicia.nitrocdn.com/hFCWVYAsyegJDXiVHjBoVHSRjDoEwdRy/assets/static/optimized/rev-0ee1693/wp-content/uploads/2019/07/free.png"
                                                 class="w-full object-center object-cover"/>
                                        </div>
                                    </div>
                                    <figcaption class="ml-2">Miễn phí cài đặt</figcaption>
                                </figure>
                            </li>
                            <?php }?>
                        </ul>
                    </section>
                    <section class="">
                        <label class="text-base font-medium text-gray-900">Thêm tùy chọn</label>
                        <fieldset class="mt-4">
                            <legend class="sr-only">Notification method</legend>
                            <div class="space-y-4">
                                @php
                                    $arr = [
      ['label'=>'Hosting 1GB + Tên miền + Hỗ trợ kỹ thuật', 'price'=>1100000],
      ['label'=>'Hosting 2GB + Tên miền + Hỗ trợ kỹ thuật', 'price'=>1500000],
      ['label'=>'Chỉ mua theme, không sử dụng hosting', 'price'=>0],
    ];
                                @endphp
                                @foreach($arr as $key => $item)
                                    <div class="flex items-center">
                                        <input id="{{$key}}" name="notification-method" type="radio" checked
                                               class=" cursor-pointer focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300">
                                        <label for="{{$key}}"
                                               class="ml-3 block text-sm font-medium text-gray-700  cursor-pointer">
                                            {{$item['label']}} <b class="">@money($item['price'])</b>/ năm
                                        </label>
                                    </div>
                                @endforeach
                            </div>
                        </fieldset>
                    </section>
                    <section class="border-t pt-3 space-y-3">
                        <div class="flex justify-between">
                            <span class="">TỔNG CỘNG</span>
                            <b class="">900,000 ₫</b>
                        </div>
                        <button type="button"
                                class="inline-flex items-center px-4 py-2 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            Đặt mua giao diện
                        </button>
                    </section>
                </div>
            </div>
            @if(!empty($chitiet['description']))
                <div class="col-span-12 lg:col-span-7 space-y-3">
                    <h3 class="text-xl font-semibold">Thông tin {{$chitiet['title']}}</h3>
                    {!! $chitiet['description'] !!}
                </div>
            @endif

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
<section
        x-data
        x-cloak
        x-show="$store.showCart"
        x-transition:enter="ease-in-out duration-500"
        x-transition:enter-start="opacity-0"
        x-transition:enter-end="opacity-100"
        x-transition:leave="ease-in-out duration-500"
        x-transition:leave-start="opacity-100"
        x-transition:leave-end="opacity-0"
        class="fixed z-20 inset-0 overflow-hidden" aria-labelledby="slide-over-title" role="dialog" aria-modal="true">
    <div class="absolute inset-0 overflow-hidden">
        <!--
          Background overlay, show/hide based on slide-over state.

          Entering: "ease-in-out duration-500"
            From: "opacity-0"
            To: "opacity-100"
          Leaving: "ease-in-out duration-500"
            From: "opacity-100"
            To: "opacity-0"
        -->
        <div class="absolute inset-0 bg-gray-500 bg-opacity-75 transition-opacity" aria-hidden="true"></div>

        <div x-show="$store.showCart"
             @click.away="$store.showCart=false"
             x-transition:enter="transform transition ease-in-out duration-500 sm:duration-700"
             x-transition:enter-start="translate-x-full"
             x-transition:enter-end="translate-x-0"
             x-transition:leave="transform transition ease-in-out duration-500 sm:duration-700"
             x-transition:leave-start="translate-x-0"
             x-transition:leave-end="translate-x-full"
             class="fixed inset-y-0 right-0 pl-10 max-w-full flex">
            <!--
              Slide-over panel, show/hide based on slide-over state.

              Entering: "transform transition ease-in-out duration-500 sm:duration-700"
                From: "translate-x-full"
                To: "translate-x-0"
              Leaving: "transform transition ease-in-out duration-500 sm:duration-700"
                From: "translate-x-0"
                To: "translate-x-full"
            -->
            <div class="w-screen max-w-md">
                <div class="h-full flex flex-col bg-white shadow-xl overflow-y-scroll">
                    <div class="flex-1 py-6 overflow-y-auto px-4 sm:px-6">
                        <div class="flex items-start justify-between">
                            <h2 class="text-lg font-medium text-gray-900" id="slide-over-title">
                                Giỏ hàng
                            </h2>
                            <div class="ml-3 h-7 flex items-center">
                                <button @click="$store.showCart=false" type="button"
                                        class="-m-2 p-2 text-gray-400 hover:text-gray-500">
                                    <span class="sr-only">Close panel</span>
                                    <!-- Heroicon name: outline/x -->
                                    <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none"
                                         viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                              d="M6 18L18 6M6 6l12 12"/>
                                    </svg>
                                </button>
                            </div>
                        </div>

                        <div class="mt-8">
                            <div class="flow-root">
                                <ul x-show="$store.cartData.items.length" role="list" class="-my-6 divide-y divide-gray-200">
                                    <template x-for="(item, key) in Object.values($store.cartData.items)">
                                        <li class="py-6 flex">
                                            <div class="flex-shrink-0 w-24 h-24 border border-gray-200 rounded-md overflow-hidden">
                                                <img :src="item.firstImage"
                                                     alt="Salmon orange fabric pouch with match zipper, gray zipper pull, and adjustable hip belt."
                                                     class="w-full h-full object-center object-cover">
                                            </div>
                                            <div class="ml-4 flex-1 flex flex-col">
                                                <div>
                                                    <div class="flex justify-between text-base font-medium text-gray-900">
                                                        <h3>
                                                            <a :href="item.link" x-text="item.title">-</a>
                                                        </h3>
                                                        <p class="ml-4 text-red-500"
                                                           x-text="Money.convert(Number(item.lastPrice)+Number(item.choose_option.price))">
                                                            -</p>
                                                    </div>
                                                </div>
                                                <div class="flex-1 flex items-end justify-between text-sm">
                                                    <p x-text="item.choose_option.label" class="text-gray-500">-</p>
                                                    <div class="flex">
                                                        <button type="button"
                                                                @click="$store.cartData.remove(item.id); $event.stopPropagation()"
                                                                class="font-medium text-indigo-600 hover:text-indigo-500">
                                                            Xoá
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                    </template>
                                </ul>
                                <!-- This example requires Tailwind CSS v2.0+ -->
                                <div x-show="!$store.cartData.items.length" class="text-center">
                                    {{--<svg class="mx-auto h-12 w-12 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                        <path vector-effect="non-scaling-stroke" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 13h6m-3-3v6m-9 1V7a2 2 0 012-2h6l2 2h6a2 2 0 012 2v8a2 2 0 01-2 2H5a2 2 0 01-2-2z" />
                                    </svg>--}}
                                    <svg xmlns="http://www.w3.org/2000/svg" class="mx-auto h-12 w-12 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
                                    </svg>
                                    <h3 class="mt-2 text-sm font-medium text-gray-900">Giỏ hàng trống</h3>
                                    <p class="mt-1 text-sm text-gray-500">Chưa có sản phẩm nào trong giỏ hàng.</p>
                                    <div class="mt-6">
                                        <a href="{{$config->base_url}}/kho-giao-dien?id=1" type="button" class="inline-flex items-center px-4 py-2 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                            <!-- Heroicon name: solid/plus -->
                                            {{--<svg class="-ml-1 mr-2 h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                                <path fill-rule="evenodd" d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z" clip-rule="evenodd" />
                                            </svg>--}}
                                            QUAY TRỞ LẠI CỬA HÀNG
                                        </a>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>

                    <div x-show="$store.cartData.items.length" class="border-t border-gray-200 py-6 px-4 sm:px-6">
                        <div class="flex justify-between text-base font-medium text-gray-900">
                            <p>Tổng cộng</p>
                            <p class="text-red-500 font-bold" x-text="Money.convert($store.cartData.getTotal())">-</p>
                        </div>
{{--                        <p class="mt-0.5 text-sm text-gray-500">Shipping and taxes calculated at checkout.</p>--}}
                        <div class="mt-6">
                            <a href="{{$config->base_url}}/gio-hang"
                               class="flex justify-center items-center px-6 py-3 border border-transparent rounded-md shadow-sm text-base font-medium text-white bg-indigo-600 hover:bg-indigo-700">TIẾN HÀNH THANH TOÁN</a>
                        </div>
                        <div class="mt-3 flex justify-center text-sm text-center text-gray-500">
                            <p>
                                hoặc
                                <a href="{{$config->base_url}}/kho-giao-dien?id=1" class="text-indigo-600 font-medium hover:text-indigo-500">tiếp tục xem sản phẩm<span aria-hidden="true"> &rarr;</span></a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
    document.addEventListener('alpine:init', () => {
        Alpine.store('showCart', false);
    });

    document.addEventListener('alpine:init', () => {
        Alpine.store('cartData', {
            items: [],
            add(item) {
                this.remove(item.id)
                this.items.push(item)
                localStorage.setItem('cartData', JSON.stringify(this.items));
            },
            remove(id) {
                this.items = this.items.filter((item) => item.id != id)
                localStorage.setItem('cartData', JSON.stringify(this.items));
            },
            set(items) {
                if (items)
                    this.items = items;
            },
            getTotal() {
                return this.items
                    .map(item => Number(item.lastPrice) + Number(item.choose_option.price))
                    .reduce((prev, next) => prev + next);
            }
        });

        let cartData = localStorage.getItem('cartData');
        cartData = JSON.parse(cartData);
        Alpine.store('cartData').set(cartData);
    });
</script>

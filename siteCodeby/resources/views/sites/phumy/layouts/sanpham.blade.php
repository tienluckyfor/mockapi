@extends($config->layout.'/master')

@section('main')
    @php
        $sanpham = $http->get('/san-pham')->data();
        $sanphamObj = collect($sanpham)->keyBy('id');
    @endphp
    <main class="">
        {{-- san-pham-1 --}}
        <section class="relative max-w-7xl mx-auto ">
            @include($config->view.'/components/breadcrumbs', ['breadcrumbs'=>[['/', 'Trang chủ'], ['/san-pham', 'Sản phẩm']]])

            <section class="absolute top-0 right-0 mr-3 -mt-1" x-data="{ show: false }" @click.away="show = false">
                <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
                <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/locale/vi.min.js"></script>

                <!-- This example requires Tailwind CSS v2.0+ -->
                <div class="relative inline-block text-left">
                    <div>
                        <button @click="show = ! show"
                                class="py-px px-3 border border-black rounded-lg ">
                            <span class=""><span class="hidden lg:block">Sản phẩm</span> đã lưu</span>
                            <span class="absolute top-0 right-0 -mt-3 -mr-2 h-6 w-6 rounded-full text-xs font-medium bg-red-600 text-white">
                                <span class="absolute absolute-x absolute-y"
                                      x-text="Object.keys($store.favorites.items).length">-</span>
                            </span>
                        </button>
                    </div>

                    <div x-show="show" x-transition:enter="transition ease-out duration-200"
                         x-transition:enter-start="opacity-0 -translate-y-1"
                         x-transition:enter-end="opacity-100 translate-y-0"
                         x-transition:leave="transition ease-in duration-150"
                         x-transition:leave-start="opacity-100 translate-y-0"
                         x-transition:leave-end="opacity-0 -translate-y-1"
                         class="z-10 origin-top-right absolute right-0 mt-2 w-[300px] lg:w-[539px] rounded border border-[#C4C4C4] bg-white  divide-y divide-[#C4C4C4] focus:outline-none shadow-md"
                         role="menu" aria-orientation="vertical" aria-labelledby="menu-button" tabindex="-1">
                        <div class="px-4 py-3" role="none">
                            <p class="text-center font-semibold" role="none">
                                Sản phẩm đã lưu
                            </p>
                        </div>
                        <div class="py-1" role="none">

                            <ul role="list" class="space-y-4 px-3">
                                <template x-for="(item, key) in Object.values($store.favorites.items)">
                                    <li :class="key?'border-t':''"
                                        class="pt-2 mt-2 border-[#C4C4C4] ">
                                        <a :href="'{{$config->base_url}}/chi-tiet?id='+item['id']"
                                           class="group flex relative p-2 hover:bg-gray-100">

                                            <button
                                                    x-on:click="$store.favorites.remove(item.id); $event.preventDefault()"
                                                    type="button" class="group-hover:inline-flex hidden absolute right-0 top-0 mt-10 mr-2 items-center p-2 border border-transparent rounded-full shadow-sm text-white bg-gray-600 hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                                </svg>
                                            </button>
                                            <div class="hidden lg:block flex-shrink-0">
                                                <div class="aspect-w-1 aspect-h-1 w-24">
                                                    <img
                                                            :src="item['images']['media'][0]['file']"
                                                            :alt="item['title']"
                                                            class=" object-center object-cover ">
                                                </div>
                                            </div>

                                            <div class=" flex-1 flex flex-col ml-0 lg:ml-2">
                                                <p class="truncate w-[400px]" x-text="item['title']">-</p>
                                                <p class="mt-3 text-gray-600" x-text="moment(item.createdAt).fromNow()">
                                                    -</p>
                                            </div>
                                        </a>
                                    </li>
                                </template>
                            </ul>
                        </div>
                        <div class="py-1" role="none">
                            <a href="{{$config->base_url}}/da-luu" class="text-center font-semibold block py-1"
                               role="none">
                                Xem tất cả
                            </a>
                        </div>
                    </div>
                </div>
            </section>

        </section>

        {{-- san-pham-2 --}}
        <section class="my-3 ">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-3">
                <ul class="flex space-x-6">
                    <li class="">
                        <a href="{{$config->base_url}}/ky-gui" class="text-base font-medium text-black relative group">
                            Ký gửi
                            <div class="block border-b-2 border-black absolute inset-0 -mb-2"></div>
                        </a>
                    </li>
                    <li class="">
                        <label class="text-base font-light text-gray-500 relative group">
                            <span class="">Sắp sếp: </span>
                            <select name="" class="py-0 rounded">
                                <option value="">Tăng dần</option>
                                <option value="">Giảm dần</option>
                            </select>
                        </label>
                    </li>
                </ul>
            </div>
        </section>

        {{-- san-pham-3 --}}
        <section class="my-3 " x-data="">

            <script>
                window.sanphamObj = {!! json_encode($sanphamObj) !!};

                document.addEventListener('alpine:init', () => {
                    Alpine.store('favorites', {
                        items: {},
                        add(item) {
                            if (this.items[item.id]) {
                                delete this.items[item.id];
                            } else {
                                this.items[item.id] = item;
                            }
                            localStorage.setItem('favorites', JSON.stringify(this.items));
                        },
                        remove(id) {
                            delete this.items[id];
                            localStorage.setItem('favorites', JSON.stringify(this.items));
                        },
                        set(items){
                            console.log('items', items);
                            if(items)
                            this.items = items;
                        }
                    });

                    let sanpham = localStorage.getItem('favorites');
                    sanpham = JSON.parse(sanpham)
                    Alpine.store('favorites').set(sanpham);
                });
            </script>
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-3">
                <ul role="list" class="space-y-4">
                    @yield('list')
                </ul>
            </div>
        </section>
    </main>

@endsection
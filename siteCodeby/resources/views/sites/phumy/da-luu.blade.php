@extends($config->layout.'/sanpham')

@section('list')
    <template x-for="(item, key) in Object.values($store.favorites.items)">
        <li class=" py-2">
            <a :href="'{{$config->base_url}}/chi-tiet?id='+item['id']" class="flex ">
                <div class="hidden lg:block flex-shrink-0">
                    <div class="aspect-w-1 aspect-h-1 w-24 lg:w-[252px]">
                        <img :src="item['images']['media'][0]['file']"
                             :alt="item['title']"
                             class=" object-center object-cover ">
                    </div>
                </div>

                <div class=" flex-1 flex flex-col ml-0 lg:ml-2">
                    <div class="space-y-2 border border-black p-3">
                        <h4 class="font-semibold truncate-2y lg:w-[25rem]" x-text="item['title']"></h4>

                        <img  :src="item['images']['media'][0]['file']"
                              :alt="item['title']"
                              class="block lg:hidden object-center object-cover ">

                        <ul class="flex space-x-3 text-gray-600">
                            <li class="font-semibold" x-text="item['price']"></li>
                            <li class="font-semibold" x-text="item['square']"></li>
                            <li class="hidden lg:block" x-text="item['address']"></li>
                        </ul>
                        <p class="block lg:hidden" x-html="item['address']"></p>
                        <p class="truncate-3y" x-text="item['description']"></p>
                        <div class="text-center">
                            <button :href="'tel:'+item['phone']"
                                    class="rounded-lg bg-yellow-500 hover:bg-red-600 text-white py-2 px-4 "
                                    type="submit">
                                Liên hệ ngay
                            </button>
                        </div>
                        <div class="mt-4 flex-1 flex items-end justify-between">
                            <p class="flex items-center text-sm text-gray-700 space-x-2">
                                <span class="" x-text="moment(item['createdAt']).format('h:i d/m/Y')"></span>
                            </p>
                            <div class="ml-4">
                            </div>
                        </div>
                    </div>
                </div>
            </a>
        </li>
    </template>
@endsection
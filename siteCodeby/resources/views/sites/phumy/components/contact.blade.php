@php
    $socials = [
    ["image"=>"/assets/images/mess.png",
    "name"=>"Messenger",
    "link"=>"http://m.me/nhieubo"
    ],
    ["image"=>"/assets/images/zalo_sharelogo.png",
    "name"=>"Zalo",
    "link"=>"https://zalo.me/0708082298"
    ],
    ["image"=>"/assets/images/telephone-call.png",
    "name"=>"0935 68 79 85",
    "link"=>"tel:0935 68 79 85"
    ]
];
@endphp
<ul class="shadow bg-white text-center rounded-lg space-y-3 py-2 px-px">
    @foreach($socials as $key => $item)
        <li class="">
            <a href="{{$item['link']}}" class="opacity-100 block hover:opacity-50" target="_blank">
                <figure class="">
                    <div class="mx-auto w-12 flex-shrink-0 ">
                        <div class="aspect-w-1 aspect-h-1 bg-gray-300 rounded-full overflow-hidden">
                            <img alt="" src="{{$config->static}}/{{$item['image']}}" class="w-full object-center object-cover" />
                        </div>
                    </div>
                    <figcaption class="text-xs">{{$item['name']}}</figcaption>
                </figure>
            </a>
        </li>
    @endforeach
</ul>
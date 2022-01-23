@foreach($theloai as $key => $item)
    <a href="{{$config->base_url}}/kho-giao-dien?id={{$item['id']}}"
       class="hover:opacity-75 relative p-4 {{@$notBorder?'':'border-r border-b border-gray-200'}} ">
        <div class="w-20 mx-auto">
            <div class=" rounded-lg overflow-hidden bg-gray-200 aspect-w-1 aspect-h-1 ">
                <img src="{{$media->set($item['image'])->first()}}"
                     alt="{{$item['name']}}" class="w-full h-full object-center object-cover">
            </div>
        </div>
        <div class="pt-4 text-center">
            <h3 class="text-sm font-medium text-gray-900">
                {{$item['name']}}
            </h3>
        </div>
    </a>
@endforeach
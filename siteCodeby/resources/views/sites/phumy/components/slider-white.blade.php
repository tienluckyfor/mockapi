@php
    if(empty($sliders))
        return;
@endphp

<section class="bg-indigo-100 flex justify-center ">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/flickity/2.3.0/flickity.pkgd.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flickity/2.3.0/flickity.min.css"/>
    <style>
        .carousel {
            background: #EEE;
        }

        .carousel-cell {
            width: 100%;
            height: 550px;
            margin-right: 10px;
            background: #ccc;
            border-radius: 5px;
            counter-increment: gallery-cell;
        }

        /* cell number */
        .carousel-cell:before {
            display: block;
            text-align: center;
            content: counter(gallery-cell);
            line-height: 200px;
            font-size: 80px;
            color: white;
        }
        .carousel div.bg-white{
            background: rgba(255, 255, 255, 0.6);
        }
    </style>
    <div class="w-full relative overflow-hidden " style="height:550px">
        <div class="carousel">
            @foreach($sliders as $key => $item)
                <section
                        class="carousel-cell  "
                >
                    <div class="absolute inset-0 overflow-hidden"
                    >
                        <img
                                src="{{$media->set($item['image'])->first()}}"
                                alt=""
                                class="w-full h-full object-center object-cover"/>
                    </div>
                    @if(!@$item['more']['isLight'])
                        <div aria-hidden="true"
                             class="absolute inset-0 bg-gray-900 bg-opacity-0"></div>
                    @endif

{{--                    <div class="relative max-w-3xl mx-auto flex flex-col items-center text-center">--}}
                    <section class="relative w-full  ">
                        <div class="bg-white pl-32 py-12 shadow">
                            <p class="text-3xl font-bold tracking-tight text-indigo-600 sm:text-4xl">
                                {!! $item['name'] !!}</p>
                        </div>
                        @if(@$item['more']['button']['name'])
                            <a
                                    href="{{$config->base_url}}{{$item['more']['button']['link']}}"
                                    class="shadow-md inline-block mt-8 ml-32 bg-white border border-transparent rounded-md py-3 px-8 text-base font-bold text-indigo-600 hover:bg-gray-100 sm:w-auto">
                                {{$item['more']['button']['name']}}
                            </a>
                        @endif
                    </section>
                   {{-- <div class="relative mx-auto flex flex-col items-center text-left bg-white p-6 ">
                        <div class="text-3xl font-extrabold tracking-tight text-indigo-600 sm:text-4xl">
                            {!! $item['name'] !!}</div>
                        --}}{{--<p class="mt-3 text-xl text-white">
                            {!! $item['content']!!}</p>--}}{{--
                        @if(@$item['more']['button']['name'])
                            <a
                                    href="{{$config->base_url}}{{$item['more']['button']['link']}}"
                                    class="mt-8 w-full block bg-white border border-transparent rounded-md py-3 px-8 text-base font-medium text-gray-900 hover:bg-gray-100 sm:w-auto">
                                {{$item['more']['button']['name']}}
                            </a>
                        @endif
                    </div>--}}
                </section>
            @endforeach
        </div>
    </div>

    <script>
        var flkty = new Flickity('.carousel', {
            "pageDots": false,
            "contain": true,
            "wrapAround": true,
            // "autoPlay": true
        });
    </script>
</section>
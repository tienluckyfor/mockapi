@php
    if(empty($sliders))
        return;
    $rand = rand();
@endphp

<section class="bg-indigo-100 flex justify-center ">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/flickity/2.3.0/flickity.pkgd.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flickity/2.3.0/flickity.min.css"/>
    <style>
        .carousel-{{$rand}} {
            background: #EEE;
        }

        .carousel-cell-{{$rand}} {
            width: 100%;
            height: {{$height}};
            margin-right: 10px;
            background: #ccc;
            border-radius: 5px;
            counter-increment: gallery-cell;
        }

        /* cell number */
        .carousel-cell-{{$rand}}:before {
            display: block;
            text-align: center;
            content: counter(gallery-cell);
            line-height: 200px;
            font-size: 80px;
            color: white;
        }
    </style>
    <div class="w-full relative overflow-hidden " style="height:{{$height}}">
        <div
                class="carousel-{{$rand}}"
        >
            @foreach($sliders as $key => $item)
                <section class="carousel-cell-{{$rand}}"
                >
                    <div class="absolute inset-0 overflow-hidden"
                    >
                        <img
                                src="{{$media->set($item['image'])->first()}}"
                                alt=""
                                class="w-full h-full object-center object-fill"/>
                    </div>
                </section>
            @endforeach
        </div>
    </div>

    <script>
        var flkty = new Flickity('.carousel-{{$rand}}', {
            "pageDots": false,
            "contain": true,
            "wrapAround": true,
            "autoPlay": true,
            pauseAutoPlayOnHover: false
        });
    </script>
</section>
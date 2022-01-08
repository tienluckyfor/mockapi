@php
    if(empty($sliders))
        return;
    $rand = rand();
@endphp
<section class="text-center ">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flickity/2.3.0/flickity.pkgd.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flickity/2.3.0/flickity.min.css"/>
    <style>
        .carousel-{{$rand}} {
            background: #FAFAFA;
            margin-bottom: 10px;
        }

        .carousel-main-{{$rand}} .carousel-cell {
            width: 100%;
            height: {{$height}};
            margin-right: 10px;
            background: #8C8;
            border-radius: 5px;
            counter-increment: carousel-cell;
        }

        .carousel-nav-{{$rand}} .is-selected {
            border-color: indigo;
            border-width: 4px;
        }
        .carousel-nav-{{$rand}} .carousel-cell {
            height: {{$nav['h']}};
            width: {{$nav['w']}};
        }
/*
        .carousel-nav .carousel-cell:before {
            font-size: 50px;
            line-height: 80px;
        }

        .carousel-nav .carousel-cell.is-nav-selected {
            background: #ED2;
        }*/

    </style>

    <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8 ">
        <!-- Flickity HTML init -->
        <div class="carousel-{{$rand}} carousel-main-{{$rand}}" >
            @foreach($sliders as $key => $item)
                <div class="carousel-cell">
                    <div class="aspect-w-1 aspect-h-1 w-full h-full">
                        <img src="{{$item}}"
                             alt="Front side of mint cotton t-shirt with wavey lines pattern."
                             class=" object-center object-fill h-full w-full">
                    </div>
                </div>
            @endforeach
        </div>

        <div class="carousel-{{$rand}} carousel-nav-{{$rand}} space-x-3">
            @foreach($sliders as $key => $item)
                <div class="carousel-cell overflow-hidden border-2 border-black ml-2">
                        <img src="{{$item}}"
                             alt="Front side of mint cotton t-shirt with wavey lines pattern."
                             class=" object-center object-fill h-full w-full ">
                </div>
            @endforeach
        </div>
    </div>
    <script>
        var flkty = new Flickity('.carousel-main-{{$rand}}', {
            "pageDots": false,
            "contain": true,
            "wrapAround": true,
            // "autoPlay": true
        });
        var flktyNav = new Flickity('.carousel-nav-{{$rand}}', {
            "asNavFor": ".carousel-main-{{$rand}}",
            "contain": true,
            "pageDots": false,
            // "wrapAround": true,
            // "autoPlay": true
            prevNextButtons: false

        });
    </script>
</section>
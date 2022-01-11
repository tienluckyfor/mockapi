@php
    if(empty($sliders))
        return;
    $rand = rand();
@endphp

<section class="my-10 ">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-3">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/flickity/2.3.0/flickity.pkgd.min.js"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flickity/2.3.0/flickity.min.css"/>
        <style>
            .carousel-cell {
                background: #8c8;
                counter-increment: carousel-cell;
                color: white;
                /* cell number */
            }
/*
            .carousel-cell:before {
                position: relative;
                top: 50%;
                transform: translateY(-50%);
                display: block;
                text-align: center;
                content: counter(carousel-cell);
            }*/

            .carousel-main-{{$rand}} .carousel-cell {
                width: 100%;
                height: {{$height}};
                font-size: 5rem;
            }

            .carousel-nav-{{$rand}} {
                width: {{$height}};
                transform: rotate(90deg) translate(0px, -100%);
                transform-origin: left top;
            }

            @media screen and (max-width: 1200px) {
                .carousel-nav-{{$rand}} {
                    transform: rotate(90deg) translate(30px, -50%);
                }
            }

            .carousel-nav-{{$rand}} .carousel-cell {
                transform: rotate(-90deg);
                width: 180px;
                height: 180px;
                cursor: pointer;
                margin-right: 1rem;
                font-size: 1.4rem;
                /* selected cell */
            }
            .carousel-nav-{{$rand}} .carousel-cell img {
                transform: rotate(-90deg);
            }

            .carousel-nav-{{$rand}} .carousel-cell.is-nav-selected {
                background: #ed2;
            }

            .carousel-nav-{{$rand}} .flickity-prev-next-button {
                width: 40px;
                height: 40px;
                background: transparent;
            }

            .carousel-nav-{{$rand}} .flickity-prev-next-button.previous {
                left: -40px;
            }

            .carousel-nav-{{$rand}} .flickity-prev-next-button.next {
                right: -40px;
            }
        </style>

        <div class="grid grid-cols-12 gap-4">
            <div class="col-span-10">
                <div class="carousel carousel-main-{{$rand}}">
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
            </div>
            <div class="col-span-2">
                <div class="carousel carousel-nav-{{$rand}}">
                    @foreach($sliders as $key => $item)
                        <div class="carousel-cell overflow-hidden border-2 border-black ml-2">
                            <img src="{{$item}}"
                                 alt="Front side of mint cotton t-shirt with wavey lines pattern."
                                 class=" object-center object-fill h-full w-full ">
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>

<script>
    var flkty = new Flickity('.carousel-main-{{$rand}}', {
        "pageDots": false,
        "contain": true,
        "wrapAround": true,
        "autoPlay": true,
        pauseAutoPlayOnHover: false
    });
    var flktyNav = new Flickity('.carousel-nav-{{$rand}}', {
        "asNavFor": ".carousel-main-{{$rand}}",
        "contain": true,
        "pageDots": false,
        prevNextButtons: false,
        "draggable": false,
        "percentPosition": false,
        "groupCells": "100%",
    });
</script>
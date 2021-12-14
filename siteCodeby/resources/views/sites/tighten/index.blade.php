@extends($config->layout.'/master')
@section('main')
    @php
        $homeText = $http->get('/home_text/1')->data();
        $software = $homeText['software_for'];
        $tool = $homeText['tools_of'];
        $engage = $homeText['engage_with'];
        $creator = $homeText['creator_text'];
        $client = $homeText['clients_text'];
    @endphp
    <style>
        .strength {
            font-size: 5.5em;
            font-weight: bold;
            text-shadow: 2px 2px #000000;
            color: #fff;
        }
    </style>
    <div class="content">
        <div class="content home-page">
            <div class="flex flex-col items-center pt-16 pb-16 bg-yellow-600 bg-center background-hero">
                <h1 class="pt-8 mt-8 text-2xl text-center uppercase lg:text-4xl font-knockout-30">
                    {{$software['title']}}
                </h1>
                <div class="strength">
                    {{$software['strength']}}
                </div>
                <div class="px-2 pb-6 font-sans text-xl leading-normal text-center sm:text-3xl text-grey-darkeset my-9">
                    {!! $software['help'] !!}
                </div>
                <div class="mb-9">
                    <button class="btn btn-dark" x-data="{}" @click="$dispatch('open-contact-modal')">
                        {{$software['contact_btn']}}
                    </button>
                </div>
            </div>
            <div class="post-critical">
                <div class="flex flex-col pt-8 mt-2 bg-green-400 bg-center area-of-expertise">
                    <svg class="area-of-expertise__tighten-mark">
                        <use xlink:href="#tighten-mark-lg"></use>
                    </svg>
                </div>

                <div class="py-10 text-center bg-green-400">
                    <h2 class="text-4xl uppercase font-knockout-30">
                        {{$tool['title']}}
                    </h2>

                    <p class="px-2 my-3 text-xl">
                        {{$tool['content']}}
                    </p>
                </div>
                @php
                    $homeTools = $http->get('/home_tools')->data();
                @endphp
                <div class="tile__container">
                    @foreach($homeTools as $key => $item)
                        <a href="/{{$item['id']}}" class="tile a-reset" title="{{$item['title']}}">
                            <div class="tile__image tile__image-laravel">
                                <div class="relative z-10 w-4/5 m-auto">
                                    <img src="{{$media->set($item['image'])->first()}}"/>
                                </div>
                                <div class="tile__image-path">
                                    <svg viewBox="0 0 310 310" xmlns="http://www.w3.org/2000/svg">
                                        <g stroke="none" fill="none" transform="translate(2, 34)">
                                            <path class="path-background" stroke="#BDBDBD" stroke-width="2"
                                                  d="M67,60 C72.5228475,60 77,55.5228475 77,50 C77,44.4771525 72.5228475,40 67,40 L62,40 C50.954305,40 42,31.045695 42,20 C42,8.954305 50.954305,0 62,0 L254,0 L254,0.0987504852 C264.106645,1.10219934 272,9.6293038 272,20 C272,29.3191971 265.626136,37.1496986 257,39.3699126 L257,40 C243.192881,40 232,51.1928813 232,65 C232,78.8071187 243.192881,90 257,90 L275,90 C291.568542,90 305,103.431458 305,120 C305,136.568542 291.568542,150 275,150 L207,150 C198.715729,150 192,156.715729 192,165 C192,173.284271 198.715729,180 207,180 L232,180 C243.045695,180 252,188.954305 252,200 C252,211.045695 243.045695,220 232,220 L207,220 L57,220 C43.1928813,220 32,208.807119 32,195 C32,181.192881 43.1928813,170 57,170 L82,170 C93.045695,170 102,161.045695 102,150 C102,138.954305 93.045695,130 82,130 L35,130 C15.6700338,130 0,114.329966 0,95 C0,75.6700338 15.6700338,60 35,60 L67,60 Z">
                                            </path>
                                            <path class="path-foreground" stroke="#FFFFFF" stroke-width="3"
                                                  stroke-dasharray="3,2"
                                                  d="M67,60 C72.5228475,60 77,55.5228475 77,50 C77,44.4771525 72.5228475,40 67,40 L62,40 C50.954305,40 42,31.045695 42,20 C42,8.954305 50.954305,0 62,0 L254,0 L254,0.0987504852 C264.106645,1.10219934 272,9.6293038 272,20 C272,29.3191971 265.626136,37.1496986 257,39.3699126 L257,40 C243.192881,40 232,51.1928813 232,65 C232,78.8071187 243.192881,90 257,90 L275,90 C291.568542,90 305,103.431458 305,120 C305,136.568542 291.568542,150 275,150 L207,150 C198.715729,150 192,156.715729 192,165 C192,173.284271 198.715729,180 207,180 L232,180 C243.045695,180 252,188.954305 252,200 C252,211.045695 243.045695,220 232,220 L207,220 L57,220 C43.1928813,220 32,208.807119 32,195 C32,181.192881 43.1928813,170 57,170 L82,170 C93.045695,170 102,161.045695 102,150 C102,138.954305 93.045695,130 82,130 L35,130 C15.6700338,130 0,114.329966 0,95 C0,75.6700338 15.6700338,60 35,60 L67,60 Z">
                                            </path>
                                        </g>
                                    </svg>
                                </div>
                            </div>

                            <h3 class="my-3 text-2xl uppercase font-knockout-29 tracking-3x-wide">
                                {{$item['title']}}
                            </h3>

                            <p class="font-normal leading-normal text-md">
                                {{$item['description']}}
                            </p>
                        </a>
                    @endforeach
                </div>
                <div class="py-8 working-with-tighten lg:px-10">
                    <div class="lg:flex">
                        <div class="lg:flex-1 lg:mx-0 xs:mx-6">
                            <h2 class="my-3 text-4xl text-center text-white uppercase font-knockout-30">
                                {{$engage['title']}}
                            </h2>
                        </div>
                    </div>

                    <div class="font-sans working-with-tighten__blurb">
                        {{$engage['content']}}
                    </div>

                    <!-- Copy Only Sm and down -->
                    <div class="px-6 pt-6 text-left lg:hidden lg:mx-0 xs:mx-6">
                        @foreach($engage['list'] as $key => $item)
                            <div class="my-9">
                                <h3 class="text-xl text-white font-knockout-30 tracking-2x-wide uppercase mt-2 mb-1">
                                    {{$item['title']}}
                                </h3>
                                <p class="text-green-300">
                                    {{$item['content']}}
                                </p>
                            </div>
                        @endforeach
                    </div>


                    <!-- Venn Diagram Lg and up -->
                    {{--<div class="relative hidden pt-6 text-left lg:flex lg:flex-wrap lg:mx-0 xs:mx-6">
                        <div class="venn-diagram-content-top-js" style="display: none;">
                            <h3
                                    class="text-xl text-white font-knockout-30 tracking-2x-wide uppercase mt-2 mb-1">
                                Agency Partner 2
                            </h3>

                            <p class="text-green-300">
                                You need a technical partner for a specific discipline. We work closely with
                                your team to help you deliver maximum value for your client.
                            </p>
                        </div>

                        <div class="venn-diagram-content-left-js" style="display: none;">
                            <h3
                                    class="text-xl text-white font-knockout-30 tracking-2x-wide uppercase mt-2 mb-1">
                                Embedded Team
                            </h3>

                            <p class="text-green-300">
                                You've got an idea and you've got some funding, but hiring developers is arduous
                                and expensive. Let Tighten be your dev team.
                            </p>
                        </div>

                        <div class="venn-diagram-content-right-js" style="display: none;">
                            <h3
                                    class="text-xl text-white font-knockout-30 tracking-2x-wide uppercase mt-2 mb-1">
                                Technical Advisor
                            </h3>

                            <p class="text-green-300">
                                You've got a codebase and you're not sure if you're doing it right. We work with
                                your team to level up your development processes.
                            </p>
                        </div>

                        <div class="venn-diagram-content-middle-js" style="display: none;">
                            <h3
                                    class="text-xl text-white font-knockout-30 tracking-2x-wide uppercase mt-2 mb-1">
                                Tighten All of the things!
                            </h3>

                            <p class="text-green-300">
                                In partnership with your team, we own a portion of the technical scope, while
                                consulting on the bigger picture. The whole enchilada.
                            </p>
                        </div>

                        <div class="venn-diagram-content-middle-left-js" style="display: none;">
                            <h3
                                    class="text-xl text-white font-knockout-30 tracking-2x-wide uppercase mt-2 mb-1">
                                Embedded Partner
                            </h3>

                            <p class="text-green-300">
                                We take ownership of a specific part of a broader project for your client. We
                                stay in our lane, but keep our eyes on the road.
                            </p>
                        </div>

                        <div class="venn-diagram-content-middle-right-js" style="display: none;">
                            <h3
                                    class="text-xl text-white font-knockout-30 tracking-2x-wide uppercase mt-2 mb-1">
                                Partner + Advisor
                            </h3>

                            <p class="text-green-300">
                                We handle one aspect of your project while consulting on a wider technical
                                scope. Your client is happy, you look great, and everyone wins.
                            </p>
                        </div>

                        <div class="venn-diagram-content-middle-bottom-js" style="display: none;">
                            <h3
                                    class="text-xl text-white font-knockout-30 tracking-2x-wide uppercase mt-2 mb-1">
                                Embedded Team + Advisor
                            </h3>

                            <p class="text-green-300">
                                We act as the primary developer on your project, while setting your internal
                                team on a path to self-sufficiency and future success.
                            </p>
                        </div>

                    </div>--}}

                    <div class="flex items-center justify-center mx-6">
                        <div class="my-8">
                            <button class="btn btn-light xs:w-full" x-data="{}"
                                    @click="$dispatch('open-contact-modal')">
                                {{$engage['contact_btn']}}
                            </button>
                        </div>
                    </div>
                </div>
                <div class="testimonial-wrapper">
                    <p class="testimonial-quote">
                        “{{$creator['quotes']}}”
                    </p>

                    <div class="testimonial-source">
                        <div class="testimonial-source__headshot">
                            <img class="block ls-is-cached lazyloaded"
                                 data-src="{{$media->set($homeText['creator_image'])->first()}}"
                                 alt="{{$creator['name']}}"
                                 height="68" width="68" src="{{$media->set($homeText['creator_image'])->first()}}"/>
                        </div>
                        <p class="testimonial-source__name">{{$creator['name']}}</p>
                        <p class="testimonial-source__title">{{$creator['role']}}</p>
                    </div>
                </div>
                <div class="our-clients-wrapper">
                    <div class="flex client-logos js-vertical-scroller">
                        @php
                            $files = $media->set($homeText['clients_image'])->files();
                        @endphp
                        @foreach($files as $key => $item)
                            @if($key%2) @continue @endif
                            <div class="client-logos__row">
                                <div class="client-logos__tile">
                                    <img data-src="{{$files[$key]}}" alt="AbleTo"
                                         class="lazyload" width="250" height="150"/>
                                </div>
                                @isset($files[$key+1])
                                <div class="client-logos__tile">
                                    <img data-src="{{$files[$key+1]}}" alt="Amazon"
                                         class="lazyload" width="250" height="150"/>
                                </div>
                                    @endisset
                            </div>
                        @endforeach
                    </div>

                    <div class="flex">
                        <div class="px-16 py-10 text-center lg:text-left">
                            <p class="my-5 text-xl">
                                <img class="hidden px-4 lg:block hang-l"
                                     src="{{$config->static}}/assets/img/arrow-drawn.svg"
                                     alt="Tighten client arrow"/>
                                {{$client['content']}}
                            </p>
{{--
                            <p class="my-5 text-xl">
                                {{$client['content']}}
                                It could be the beginning of a long and fruitful relationship.
                            </p>--}}

                            <button class="btn btn-yellow" x-data="{}"
                                    @click="$dispatch('open-contact-modal');">
                                {{$client['contact_btn']}}
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
@extends($config->layout.'/master')
@section('main')

    <div class="content">
        <header class="header">
            <div class="header-panel-small background-hero">
                <h2 class="header-panel-small__title">Work with us</h2>
            </div>
        </header>
        @php
            $withUs = $http->get('/work_with_us')->data();
            $withUs = collect($withUs)->groupBy('type')->toArray();
            $header = \Illuminate\Support\Arr::first($withUs['header']);
            $culture = $withUs['culture'];
            $benefits = $withUs['benefits'];
            $footer = \Illuminate\Support\Arr::first($withUs['footer']);
        @endphp
        <div class="py-4 content">
            <div class="py-8 constrainer--medium">
                <div class="pt-4 our-culture-wrapper">
                    <div class="culture-icon">
                        <div class="culture-icon__background lazyloaded"
                             data-bg="/assets/img/work-with-us/img_intro.svg"
                             style="background-image: url({{$media->set($header['image'])->first()}});"></div>
                    </div>
                    <div class="our-culture">
                        {!! $header['description'] !!}
                    </div>
                </div>

                <h2 class="py-8 text-center title-2">Tighten Culture</h2>
                @foreach($culture as $key => $item)
                    <div class="our-culture-wrapper">
                        <div class="culture-icon">
                            <div class="culture-icon__background lazyloaded"
                                 data-bg="{{$media->set($item['image'])->first()}}"
                                 style="background-image: url({{$media->set($item['image'])->first()}});"></div>
                        </div>
                        <div class="our-culture">
                            <div class="our-culture__title">{{$item['title']}}</div>
                            {!! $item['description'] !!}
                        </div>
                    </div>
                @endforeach

                <h2 class="pb-8 text-center our-perks-header title-2">Perks and Benefits</h2>
                @foreach($benefits as $key => $item)
                    @if($key%2) @continue @endif

                    <div class="our-perks-wrapper">
                        <div class="our-perk">
                            <div class="perk-icon">
                                <div class="perk-icon__background lazyloaded"
                                     data-bg="{{$media->set($item['image'])->first()}}"
                                     style="background-image: url({{$media->set($item['image'])->first()}});"></div>
                            </div>
                            <div class="our-perk__description">
                                <div class="our-perk__title">{{$item['title']}}</div>
                                {!! $item['description'] !!}
                            </div>
                        </div>
                        @isset($benefits[$key+1])

                            <div class="our-perk">
                                <div class="perk-icon">
                                    <div class="perk-icon__background lazyloaded"
                                         data-bg="{{$media->set($benefits[$key+1]['image'])->first()}}"
                                         style="background-image: url({{$media->set($benefits[$key+1]['image'])->first()}});"></div>
                                </div>
                                <div class="our-perk__description">
                                    <div class="our-perk__title">{{$benefits[$key+1]['title']}}</div>
                                    {!! $benefits[$key+1]['description'] !!}
                                </div>
                            </div>
                        @endisset

                    </div>
                @endforeach

                <div class="justify-center w-full mt-8 ml-auto mr-auto text-center sm:w-3/5">
                    <h2 class="text-5xl uppercase font-knockout-29 sm:text-4xl">{{$footer['title']}}</h2>
                    {!! $footer['description'] !!}
                    <a class="w-3/5 my-8 btn btn-yellow"
                       href="{{$footer['button']['link']}}">{{$footer['button']['text']}}</a>
                </div>
            </div>
        </div>
    </div>
@endsection
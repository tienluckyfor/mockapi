@extends($config->layout.'/master')
@section('main')
    @php
        $companies = $http->get('/company_category')->data();

$i = -1;
$staffs = collect($companies)->map(function($item) use ($media, &$i){
    return collect($item['company_staff'])->map(function($item1) use ($item, $media, &$i){
        $i++;
      return [
            "index"=> $i,
            "short_name"=> $item1['name'],
            "first_name"=> $item1['name'],
            "last_name"=> $item1['name'],
            "full_name"=> $item1['name'],
            "title"=> $item1['role'],
            "leadership"=> $item['name']=='LEADERSHIP'? true : false,
            "twitter"=> @$item1['social_links']['twitter'],
            "linkedin"=> @$item1['social_links']['linkedin'],
            "instagram"=> @$item1['social_links']['instagram'],
            "github"=> @$item1['social_links']['github'],
            "blog"=> @$item1['social_links']['blog'],
            "bio"=> $item1['bio'],
            "image"=> $media->set($item1['image'])->first()
        ];
    });
})->flatten(1)->toArray();
    @endphp
    <div class="content">
        <script>
            window.team_members = {!! json_encode($staffs) !!};
        </script>

        <div class="full-screen show modal-bio employee-bio" x-data="{...modal(), ...bio_modal()}"
             x-spread="{...modalSpreadBindings, ...bioModalSpreadBindings}" style="display: none;">
            <span class="full-screen__close" @click="close">×</span>

            {{--<div class="flex flex-wrap items-center justify-center flex-1">
                <div class="w-4/5 px-4 bio">
                    <div class="bio__pic">
                        <img :src="member().image" />
                    </div>

                    <div class="relative">
                        <template x-if="showNavigation()">
                            <div class="absolute flex justify-between w-full">
                                <button type="button" class="no-outline" @click="navigateBackward">
                                    <img src="{{$config->static}}/assets/img/arrow-modal-left.svg" alt="backward" />
                                </button>

                                <button type="button" class="no-outline" @click="navigateForward">
                                    <img src="{{$config->static}}/assets/img/arrow-modal-right.svg" alt="forward" />
                                </button>
                            </div>
                        </template>

                        <div class="absolute flex justify-between w-full">
                            <button type="button" class="no-outline" @click="navigateBackward">
                                <img src="{{$config->static}}/assets/img/arrow-modal-left.svg" alt="backward" />
                            </button>

                            <button type="button" class="no-outline" @click="navigateForward">
                                <img src="{{$config->static}}/assets/img/arrow-modal-right.svg" alt="forward" />
                            </button>
                        </div>
                        <h3 class="text-2xl text-center uppercase font-knockout-30" x-text="member().full_name">Matt Stauffer</h3>

                        <div class="flex flex-col items-center">
                            <h4 class="mt-2 text-center text-gray-600 uppercase font-knockout-30" x-text="member().title">Partner + Technical Director</h4>

                            <ul class="mt-4">
                                <li x-show="member().twitter" class="mx-2 employee-bio__social-icon">
                                    <a :href="'http://twitter.com/' + member().twitter" href="http://twitter.com/stauffermatt">
                                        <svg class="social-icon-bio">
                                            <use xlink:href="#icon-twitter"></use>
                                        </svg>
                                    </a>
                                </li>

                                <li x-show="member().linkedin" class="mx-2 employee-bio__social-icon">
                                    <a :href="'http://www.linkedin.com/in/' + member().linkedin" href="http://www.linkedin.com/in/mattstauffer">
                                        <svg class="social-icon-bio">
                                            <use xlink:href="#icon-linkedin"></use>
                                        </svg>
                                    </a>
                                </li>

                                <li x-show="member().instagram" class="mx-2 employee-bio__social-icon" style="display: none;">
                                    <a :href="'https://instagram.com/' + member().instagram" href="https://instagram.com/null">
                                        <svg class="social-icon-bio">
                                            <use xlink:href="#icon-instagram"></use>
                                        </svg>
                                    </a>
                                </li>

                                <li x-show="member().github" class="mx-2 employee-bio__social-icon">
                                    <a :href="'https://github.com/' + member().github" href="https://github.com/mattstauffer">
                                        <svg class="social-icon-bio">
                                            <use xlink:href="#icon-github"></use>
                                        </svg>
                                    </a>
                                </li>

                                <li x-show="member().blog" class="mx-2 employee-bio__social-icon">
                                    <a :href="member().blog" href="http://mattstauffer.co">
                                        <svg class="social-icon-bio">
                                            <use xlink:href="#icon-link"></use>
                                        </svg>
                                    </a>
                                </li>
                            </ul>
                        </div>

                        <div class="bio__excerpt">
                            <div x-html="member().bio">
                                <p>
                                    Matt is an accomplished developer, teacher, writer, and communicator. Since the late 90s, Matt has been thinking deeply about coding practices, while continuously refining his craft. He combines an aptitude
                                    for big-picture thinking with serious development chops, honed in his professional practice and through his continuous onslaught of side projects.
                                </p>

                                <p>
                                    In recent years, Matt has become deeply involved in the Laravel community, and his blog at <a target="_blank" href="https://mattstauffer.com/">mattstauffer.com</a> has become required reading for Laravel
                                    developers and responsive designers alike. Matt is a regular speaker at Laracon, and has written a book entitled <a target="_blank" href="https://laravelupandrunning.com/">Laravel: Up and Running</a>,
                                    published by O’Reilly Media in 2016.
                                </p>

                                <p>
                                    As technical director, Matt provides leadership on every client project, directs and mentors our growing development team, and leads all of Tighten’s internal product development efforts. Matt is fiercely
                                    passionate about work and life, and he keeps Tighten and our clients on their toes at all times.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>--}}
            <div class="flex flex-wrap items-center justify-center flex-1">
                <div class="w-4/5 px-4 bio">
                    <div class="bio__pic">
                        <img :src="member().image"/>
                    </div>

                    <div class="relative">
                        <template x-if="showNavigation()">
                            <div class="absolute flex justify-between w-full">
                                <button type="button" class="no-outline" @click="navigateBackward">
                                    <img src="{{$config->static}}/assets/img/arrow-modal-left.svg" alt="backward"/>
                                </button>

                                <button type="button" class="no-outline" @click="navigateForward">
                                    <img src="{{$config->static}}/assets/img/arrow-modal-right.svg" alt="forward"/>
                                </button>
                            </div>
                        </template>

                        <h3 class="text-2xl text-center uppercase font-knockout-30" x-text="member().full_name"></h3>

                        <div class="flex flex-col items-center">
                            <h4 class="mt-2 text-center text-gray-600 uppercase font-knockout-30"
                                x-text="member().title"></h4>

                            <ul class="mt-4">
                                <li x-show="member().twitter" class="mx-2 employee-bio__social-icon">
                                    <a :href="'http://twitter.com/' + member().twitter">
                                        <svg class="social-icon-bio">
                                            <use xlink:href="#icon-twitter"/>
                                        </svg>
                                    </a>
                                </li>

                                <li x-show="member().linkedin" class="mx-2 employee-bio__social-icon">
                                    <a :href="'http://www.linkedin.com/in/' + member().linkedin">
                                        <svg class="social-icon-bio">
                                            <use xlink:href="#icon-linkedin"/>
                                        </svg>
                                    </a>
                                </li>

                                <li x-show="member().instagram" class="mx-2 employee-bio__social-icon">
                                    <a :href="'https://instagram.com/' + member().instagram">
                                        <svg class="social-icon-bio">
                                            <use xlink:href="#icon-instagram"/>
                                        </svg>
                                    </a>
                                </li>

                                <li x-show="member().github" class="mx-2 employee-bio__social-icon">
                                    <a :href="'https://github.com/' + member().github">
                                        <svg class="social-icon-bio">
                                            <use xlink:href="#icon-github"/>
                                        </svg>
                                    </a>
                                </li>

                                <li x-show="member().blog" class="mx-2 employee-bio__social-icon">
                                    <a :href="member().blog">
                                        <svg class="social-icon-bio">
                                            <use xlink:href="#icon-link"/>
                                        </svg>
                                    </a>
                                </li>
                            </ul>
                        </div>

                        <div class="bio__excerpt">
                            <div x-html="member().bio"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <header class="header">
            <div class="header-panel-small background-hero">
                <h2 class="header-panel-small__title">Our Company</h2>
            </div>
        </header>

        <div class="flex flex-col items-stretch lg:flex-row">
            <div class="flex about-people-container">
                <div class="flex flex-wrap justify-center flex-1">
                    @php $i=-1; @endphp
                    @foreach($companies as $key => $item)
                        <h2 class="w-full my-8 text-center title-2">{{$item['name']}}</h2>
                        @foreach($item['company_staff'] as $key1 => $staff)
                            @php $i++; @endphp
                            <div class="flex">
                                <div class="px-6 bio" x-data="{}">
                                    <div class="pt-4 pb-5">
                                        <div class="cursor-pointer bio__pic"
                                             @click="$dispatch('open-bio-modal', { member_bio_index: {{$i}} });">
                                            <img data-src="{{$media->set($staff['image'])->first()}}" alt="{{$staff['name']}}"
                                                 class="ls-is-cached lazyloaded" height="300" width="300"
                                                 src="{{$media->set($staff['image'])->first()}}"/>
                                        </div>

                                        <div>
                                            <h3 class="text-2xl text-center uppercase cursor-pointer font-knockout-30"
                                                @click="$dispatch('open-bio-modal', { member_bio_index: {{$i}} });">
                                                {{$staff['name']}}
                                            </h3>

                                            <div class="flex flex-col items-center">
                                                <h4 class="mt-2 text-center text-gray-700 uppercase font-knockout-30">
                                                    {{$staff['role']}}</h4>

                                                <ul class="mt-4">
                                                    @foreach($staff['social_links'] as $key2 => $item2)
                                                        <li class="inline-block mx-2">
                                                            <a href="{{$item2}}"
                                                               title="{{$staff['name']}} on {{$key2}}">
                                                                <svg class="social-icon-bio">
                                                                    <use xlink:href="#icon-{{$key2}}"></use>
                                                                </svg>
                                                            </a>
                                                        </li>
                                                    @endforeach
                                                </ul>
                                                <button type="button" class="mt-4 btn btn-dark text-md"
                                                        title="{{$staff['name']}}'s Bio"
                                                        @click="$dispatch('open-bio-modal', { member_bio_index: {{$i}} });">
                                                    Read Bio
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach

                        <hr class="w-full my-4"/>
                    @endforeach

                </div>
            </div>
        </div>
    </div>



@endsection
@extends($config->layout.'/master')
@section('main')
    @php
        $blogs = $http->get('/blogs')->data();
        $item = collect($blogs)->where('id', request()->id)->first();
        $author = \Illuminate\Support\Arr::first($item['company_staff']);
        $preId = collect($blogs)->where('id', '<', request()->id)->max('id');
        $previous = collect($blogs)->where('id', $preId)->first();
        $nextId = collect($blogs)->where('id', '>', request()->id)->min('id');
        $next = collect($blogs)->where('id', $nextId)->first();
    @endphp
    <div class="content">
        <header class="header">
            <div class="header-panel-small background-hero">
                <h2 class="header-panel-small__title"><a href="{{$config->base_url}}/blog">Blog</a></h2>
            </div>
        </header>

        <div class="section section--no-padding post-header">
            <div class="post-header__metas">
                <div class="post-meta">
                    <div class="post-meta__label">Posted</div>
                    <div class="post-meta__body">
                        <time datetime="{{$item['createdAt']}}">{{$item['createdAt']}}</time>
                    </div>
                </div>

                <div class="post-meta">
                    <div class="post-meta__label">Length</div>
                    <div class="post-meta__body">{{$item['length']}}</div>
                </div>

                <div class="post-meta">
                    <div class="post-meta__label">Share</div>

                    <div class="post-meta__body">
                        <a href="{{$config->base_url}}/blog-detail?id={{$item['id']}}" class="no-underline">
                            <svg class="post-meta__body-icon display--md-and-above">
                                <use xlink:href="#icon-link"></use>
                            </svg>
                            <div class="post-meta__share-url underline">{{$config->url}}</div>
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <div class="section section--no-padding post">
            <div class="constrainer--medium">
                <h2 class="post__title">
                    {{$item['title']}}
                </h2>

                <div class="post__byline">
                    <div class="post__byline__authors">
                        <div class="post__byline__author">
                            <div class="post__byline__image">
                                <a href="{{$config->base_url}}/authors?id={{$author['id']}}"><img
                                            alt="Photo of {{$author['name']}}"
                                            src="{{$media->set($author['image'])->first()}}"/></a>
                            </div>
                            <div>
                                <a href="{{$config->base_url}}/authors?id={{$author['id']}}"
                                   class="font-semibold no-underline">{{$author['name']}}</a>
                                <span class="post__byline__title">Designer</span>
                            </div>
                        </div>
                    </div>
                </div>

                <h3 class="post__subtitle">
                    {{$item['sub_title']}}
                </h3>

                <img class="w-full post__image" src="{{$media->set($item['image'])->first()}}"
                     alt="{{$item['sub_title']}}"/>

                <div class="post__body" v-pre="">
                    {!! $item['description'] !!}
                </div>
            </div>
        </div>
        @if($previous && $next)
            <div class="section section--no-padding post-footer">
                <div class="constrainer--medium">
                    <div class=" flex-justify ">
                        <div class=" post-footer__previous ">
                            <div class="post-footer__label">Previous</div>
                            <a class="post-footer__link" href="{{$config->base_url}}/blog-detail?id={{$previous['id']}}">{{$previous['title']}}</a>
                        </div>
                        <div class=" post-footer__next ">
                            <div class="post-footer__label">Next</div>
                            <a class="post-footer__link"
                               href="{{$config->base_url}}/blog-detail?id={{$next['id']}}">{{$next['title']}}</a>
                        </div>
                    </div>
                </div>
            </div>
        @elseif($previous)
            <div class="section section--no-padding post-footer">
                <div class="constrainer--medium">
                    <div class="flex items-center justify-center">
                        <div class="post-footer__single">
                            <div class="post-footer__label">Previous</div>
                            <a class="post-footer__link"
                               href="{{$config->base_url}}/blog-detail?id={{$previous['id']}}">{{$previous['title']}}</a>
                        </div>
                    </div>
                </div>
            </div>
        @elseif($next)
            <div class="section section--no-padding post-footer">
                <div class="constrainer--medium">
                    <div class="flex items-center justify-center">
                        <div class="post-footer__single">
                            <div class="post-footer__label">Next</div>
                            <a class="post-footer__link"
                               href="{{$config->base_url}}/blog-detail?id={{$next['id']}}">{{$next['title']}}</a>
                        </div>
                    </div>
                </div>
            </div>
        @endif


    </div>



@endsection
@extends($config->layout.'/master')
@section('main')
    <div class="content">
        <header class="header">
            <div class="header-panel-small background-hero">
                <h2 class="header-panel-small__title">Blog</h2>
            </div>
        </header>

        <div class="section">
            <div class="constrainer--narrow">
                <div class="newsletter-signup">
                    <div class="newsletter-signup__label text-center">
                        Sign up for the Tighten Blog weekly
                    </div>

                    <form action="//tighten.us12.list-manage.com/subscribe/post?u=3abde72ee6ba4dd39cc01bb63&amp;id=24d7253932"
                          method="POST" class="newsletter-signup__form">
                        <input class="newsletter-signup__email" name="EMAIL" type="email"
                               placeholder="Your email address" aria-label="Your email address" required="required"/>

                        <div style="position: absolute; left: -5000px;" aria-hidden="true"><input type="text"
                                                                                                  name="b_3abde72ee6ba4dd39cc01bb63_24d7253932"
                                                                                                  tabindex="-1"
                                                                                                  value=""/></div>

                        <input name="subscribe" class="btn btn-yellow border-0 m-0" type="submit"
                               value="Get it in your inbox"/>
                    </form>
                </div>
            </div>
        </div>
        @php
            $blogs = $http->get('/blogs')->data();
        @endphp
        @foreach($blogs as $key => $item)
            @php
                $author = \Illuminate\Support\Arr::first($item['company_staff']);
            @endphp
            <div class="section section--no-padding">
                <div class="constrainer--medium">
                    <div class="post-preview-wrapper post-preview-wrapper--wide">
                        <div class="post-preview-thumbnail">
                            <div class="post-preview-thumbnail__circle">
                                <div
                                        class="post-preview-thumbnail__background lazyloaded"
                                        data-bg="{{$media->set($item['image'])->first()}}"
                                        style="background-image: url('{{$media->set($item['image'])->first()}}');"
                                ></div>
                            </div>
                        </div>

                        <div class="post-preview">
                            <div class="post-preview__title">
                                <a href="{{$config->base_url}}/blog-detail?id={{$item['id']}}">{{$item['title']}}</a>
                            </div>

                            <div class="post-preview__snippet">
                                {{$item['sub_title']}}
                            </div>

                            <div class="post-preview__metas">
                                <div class="post-meta">
                                    <div class="post-meta__label">Author</div>
                                    <div class="post-meta__body">
                                        <a href="{{$config->base_url}}/authors?id={{$author['id']}}">{{$author['name']}}</a>
                                    </div>
                                </div>

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
                                            <div class="post-meta__share-url underline">{{$config->base_url}}
                                                /blog-detail?id={{$item['id']}}</div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>


@endsection
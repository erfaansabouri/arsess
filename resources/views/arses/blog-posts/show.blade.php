@extends('arses.master')
@section('title', $blog_post->meta_title ?? $blog_post->title)
@section('meta_description', $blog_post->meta_description)
@section('meta_keywords', $blog_post->meta_keywords)
@section('canonical_url')
    <link rel="canonical" href="{{ $blog_post->canonical_url ?? url()->current() }}">
@endsection
@section('content')
    <section class="blogPgSec">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="blogPgBox setMargin">
                        <div class="breadCrumb">
                            <a href="{{ route('home') }}">سرسرای </a>
                            <span class="icon-left"></span>
                            <a href="{{ route('blog-posts.index') }}">نامه‌سرای</a>
                            @if(count($blog_post->categories))
                                <span class="icon-left"></span>
                                @foreach($blog_post->categories as $c)
                                    <a href="{{ route('blog-posts.index', ['category_id' => $c->id]) }}">
                                        {{ $c->title }}
                                    </a>
                                @endforeach
                            @endif
                            <span class="icon-left"></span>
                            @php
                            $agent = new \Jenssegers\Agent\Agent();
                            $is_mobile = $agent->isMobile();
                            @endphp
                            @if($is_mobile && strlen($blog_post->title) > 50)
                                <p>{{ mb_substr($blog_post->title, 0, 50) }}...</p>
                            @else
                                <p>{{ $blog_post->title }}</p>
                            @endif
                        </div>
                        <div class="blogPost">
                            <div class="blgPostImg transitionCls">
                                <img src="{{ $blog_post->getFirstMediaUrl('image') }}" alt="{{ $blog_post->title }}" />
                            </div>
                            <div class="blgPostInfo">
                                <h2>{{ $blog_post->title }}</h2>
                                @if(count($blog_post->categories))
                                <div class="category">
                                    @foreach($blog_post->categories as $c)
                                        <a href="{{ route('blog-posts.index', ['category_title' => $c->slug]) }}">
                                            <span>{{ $c->title }}</span>
                                        </a>
                                    @endforeach
                                </div>
                                @endif
                                <div class="text">
                                    {!! $blog_post->body !!}
                                </div>
                                @if(count($blog_post->hashtags))
                                    <div class="category">
                                        @foreach($blog_post->hashtags as $hashtag)
                                            <a href="{{ route('blog-posts.index', ['hashtag_title' => $hashtag->slug]) }}"><span>#{{ $hashtag->title }}</span></a>
                                        @endforeach
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

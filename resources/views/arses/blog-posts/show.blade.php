@extends('arses.master')
@section('content')
    <section class="blogPgSec">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="blogPgBox">
                        <div class="breadCrumb">
                            <a href="{{ route('blog-posts.index') }}">سرانامه‌سرای</a>
                            @if(count($blog_post->categories))
                                <span class="icon-left"></span>
                                @foreach($blog_post->categories as $c)
                                    <a href="{{ route('blog-posts.index', ['category_id' => $c->id]) }}">
                                        {{ $c->title }}
                                    </a>
                                @endforeach
                            @endif
                            <span class="icon-left"></span>
                            <p>{{ $blog_post->title }}</p>
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
                                        <a href="{{ route('blog-posts.index', ['category_id' => $c->id]) }}">
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
                                            <a href=""><span>#{{ $hashtag->title }}</span></a>
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

@extends('arses.master')
@section('content')
    <section class="blogSec">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h2 class="arsesTitl setMargin position-relative">
                        نامه‌سرای ملزومات آشپزی خاص
                    </h2>
                    <div class="tabBox">
                        <div class="tabHeader">
                            <ul>
                                <li>
                                    <a
                                        href="{{ route('blog-posts.index') }}"
                                        class="tablinks @if(!$category_id) active @endif transitionCls position-relative"
                                        tabId="tabOne"
                                        id="defaultOpen"
                                    >
                                        همه
                                    </a>
                                </li>
                                @foreach($blog_post_categories as $blog_post_category)
                                    <li>
                                        <a
                                            href="{{ route('blog-posts.index', ['category_title' => $blog_post_category->slug]) }}"
                                            class="tablinks  @if($category_id && $category_id == $blog_post_category->id) active @endif transitionCls position-relative"
                                            tabId="tabTwo"
                                        >
                                            {{ $blog_post_category->title }}
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                        <div id="tabOne" class="tabcontent">
                            <div class="blogList">
                                @foreach($blog_posts as $blog_post)
                                    <div class="blogCard">
                                        <a href="{{ route('blog-posts.show', ['slug' => $blog_post->slug])  }}" class="blgCrdImg transitionCls">
                                            <img src="{{ $blog_post->getFirstMediaUrl('image') }}" alt="img"/>
                                        </a>
                                        <div class="blgCrdInfo">
                                            <a href="{{ route('blog-posts.show', ['slug' => $blog_post->slug])  }}">
                                                <h2>{{ $blog_post->title }}</h2>
                                            </a>
                                            <div class="text">
                                                {{ $blog_post->summary }}
                                            </div>
                                            @if($blog_post->categories->count() != 0)
                                                <div class="category">
                                                    <a href="#"><span>دسته بندی ها</span></a>
                                                    @foreach($blog_post->categories as $category)
                                                        <a href="{{ route('blog-posts.index', ['category_title' => $category->slug]) }}">
                                                            <p>{{ $category->title }}</p>
                                                        </a>
                                                    @endforeach
                                                </div>
                                            @endif

                                            @if($blog_post->hashtags->count() != 0)
                                                <div class="category mt-5">
                                                    <a href="#"><span>هشتگ ها</span></a>
                                                    @foreach($blog_post->hashtags as $hashtag)
                                                        <a href="{{ route('blog-posts.index', ['hashtag_title' => $hashtag->slug]) }}">
                                                            <p>#{{ $hashtag->title }}</p>
                                                        </a>
                                                    @endforeach
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                            @if ($blog_posts->lastPage() > 1)
                                <div class="pagination">
                                    @for ($i = 1; $i <= $blog_posts->lastPage(); $i++)
                                        <a href="{{ $blog_posts->url($i) }}" class="{{ $blog_posts->currentPage() == $i ? 'active' : '' }}">
                                            {{ $i }}
                                        </a>
                                    @endfor
                                </div>
                            @endif
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

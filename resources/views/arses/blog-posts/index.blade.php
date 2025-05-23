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
                                            href="{{ route('blog-posts.index', ['category_id' => $blog_post_category->id]) }}"
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
                                    <a href="{{ route('blog-posts.show', ['slug' => $blog_post->slug])  }}" class="blogCard">
                                        <div class="blgCrdImg transitionCls">
                                            <img src="{{ $blog_post->getFirstMediaUrl('image') }}" alt="img"/>
                                        </div>
                                        <div class="blgCrdInfo">
                                            <h2>{{ $blog_post->title }}</h2>
                                            <div class="text">
                                                {{ $blog_post->summary }}
                                            </div>
                                            @if(!empty($blog_post->categories))
                                                <div class="category">
                                                    <span>دسته بندی ها</span>
                                                    @foreach($blog_post->categories as $category)
                                                        <p>{{ $category->title }}</p>
                                                    @endforeach
                                                </div>
                                            @endif

                                            @if(!empty($blog_post->hashtags))
                                                <div class="category mt-5">
                                                    <span>هشتگ ها</span>
                                                    @foreach($blog_post->hashtags as $hashtag)
                                                        <p>{{ $hashtag->title }}</p>
                                                    @endforeach
                                                </div>
                                            @endif
                                        </div>
                                    </a>
                                @endforeach
                            </div>
                            <div class="pagination">
                                @for ($i = 1; $i <= $blog_posts->lastPage(); $i++)
                                    <a href="{{ $blog_posts->url($i) }}" class="{{ $blog_posts->currentPage() == $i ? 'active' : '' }}">
                                        {{ $i }}
                                    </a>
                                @endfor
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

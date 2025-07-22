@extends('arses.master-ii')
@section('title', \App\Models\HomeSeoAttribute::query()->first()->title)
@section('meta_description', \App\Models\HomeSeoAttribute::query()->first()->meta_description)
@section('meta_keywords', \App\Models\HomeSeoAttribute::query()->first()->keywords)
@section('content')
    <section class="homTopSec headerSec">
        <img src="{{ asset('arses/asset/img/home-header.png') }}" class="homeHdrImg" alt="img" />
        @include('arses.partials.search-bar')
    </section>


    <section class="topBnnrSec">
        <div class="topBnnrSwpr">
            <div class="swiper">
                <div class="swiper-wrapper">
                    @foreach($banners as $banner)
                        <div class="swiper-slide">
                            <a href="{{ $banner->url }}" class="topBnrCrd position-relative transitionCls">
                                <div class="image_parent">
                                    <div class="image_inner">
                                        <img src="{{ $banner->getFirstMediaUrl('image') }}" alt="img" />
                                    </div>
                                </div>
                                <div class="topBnrTxt">
                                    <div class="adTag">AD</div>
                                    <img src="{{ $banner->getFirstMediaUrl('brand') }}" alt="brand" />
                                    <h2>{{ $banner->title }}</h2>
                                </div>
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>

    <section class="newestSec position-relative">
        <img src="{{ asset('arses/asset/img/vector02.png') }}" class="newestVctr" alt="img" />
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h2 class="arsesTitl setMargin  position-relative">
                        جدید ترین‌های سرای آرسس
                    </h2>
                </div>
            </div>
        </div>
        <div class="swprContainr">
            <div class="newestSwper newestSwpr1">
                <div class="swiper">
                    <div class="swiper-wrapper">
                        @foreach($newest_products as $np)
                            <div class="swiper-slide">
                                <a href="{{ route('product.show', ['slug' => $np->slug]) }}" class="newestCrd position-relative transitionCls">
                                    <div class="cardImg transitionCls">
                                        <img src="{{ $np->getFirstMediaUrl('image') }}" class="" alt="img" />
                                    </div>
                                    <div class="cardBdy">
                                        <img src="{{ $np->brand->getFirstMediaUrl('image') }}" alt="brand" />
                                        <h2>{{ $np->title }}</h2>
                                        <div class="line transitionCls"></div>
                                        <p>{{ $np->summary }}</p>
                                    </div>
                                </a>
                            </div>
                        @endforeach
                    </div>
                    <div class="swiper-button-next"></div>
                    <div class="swiper-button-prev"></div>
                </div>
            </div>
        </div>
    </section>

    @if($selected_products->count())
        <section class="newestSec position-relative">
            <img src="{{ asset('arses/asset/img/vector02.png') }}" class="newestVctr" alt="img" />
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <h2 class="arsesTitl position-relative">گنجینه شف‌شو</h2>
                    </div>
                </div>
            </div>

            <div class="swprContainr">
                <div class="newestSwper newestSwpr2">
                    <div class="swiper">
                        <div class="swiper-wrapper">
                            @foreach($selected_products as $sp)
                                <div class="swiper-slide">
                                    <a href="{{ route('product.show', $sp->slug) }}" class="newestCrd position-relative transitionCls">
                                        <div class="cardImg transitionCls">
                                            <img src="{{ $sp->getFirstMediaUrl('image') }}" class="" alt="img" />
                                        </div>
                                        <div class="cardBdy">
                                            <img src="{{ $sp->brand->getFirstMediaUrl('image') }}" alt="brand" />
                                            <h2>{{ $sp->title }}</h2>
                                            <div class="line transitionCls"></div>
                                            <p>{{ $sp->summary }}</p>
                                        </div>
                                    </a>
                                </div>
                            @endforeach
                        </div>
                        <div class="swiper-button-next"></div>
                        <div class="swiper-button-prev"></div>
                    </div>
                </div>
            </div>
        </section>
    @endif

    <section class="newestSec position-relative">
        <img src="{{ asset('arses/asset/img/vector02.png') }}" class="newestVctr" alt="img" />
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h2 class="arsesTitl position-relative">تازه‌ترین مواد اولیه</h2>
                </div>
            </div>
        </div>
        <div class="swprContainr">
            <div class="newestSwper newestSwpr3">
                <div class="swiper">
                    <div class="swiper-wrapper">
                        @foreach($newest_mavad_avalie_products as $npp)
                            <div class="swiper-slide">
                                <a href="{{ route('product.show', ['slug' => $npp->slug]) }}" class="newestCrd position-relative transitionCls">
                                    <div class="cardImg transitionCls">
                                        <img src="{{ $npp->getFirstMediaUrl('image') }}" class="" alt="img" />
                                    </div>
                                    <div class="cardBdy">
                                        <img src="{{ $npp->brand->getFirstMediaUrl('image') }}" alt="brand" />
                                        <h2>{{ $npp->title }}</h2>
                                        <div class="line transitionCls"></div>
                                        <p>{{ $npp->summary }}</p>
                                    </div>
                                </a>
                            </div>
                        @endforeach

                    </div>
                    <div class="swiper-button-next"></div>
                    <div class="swiper-button-prev"></div>
                </div>
            </div>
        </div>
    </section>

    <section class="catgorySec position-relative">
        <img src="{{ asset('arses/asset/img/vector01.png') }}" class="ctgryVector" alt="img" />
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h2 class="arsesTitl position-relative">دسته بندی‌ها</h2>
                    <div class="catSecList position-relative">
                        @foreach($categories as $category)
                            <a href="{{ route('product-categories.show', [ 'slug' => $category->slug ]) }}" class="catgryCard transitionCls">
                                <p>{{ $category->title }}</p>
                                <span class="icon-Next"></span>
                            </a>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

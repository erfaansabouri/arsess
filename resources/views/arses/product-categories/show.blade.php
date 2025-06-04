@extends('arses.master-ii')
@section('title', $category->meta_title ?? $category->title )
@section('meta_description', $category->meta_description ?? $category->title)
@section('meta_keywords', $category->meta_keywords ?? $category->title)
@section('canonical_url')
    <link rel="canonical" href="{{ $category->canonical_url ?? url()->current() }}">
@endsection
@section('content')
<section class="searchSec">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="saraTopLnks pb-5">
                    <div class="breadCrumb setMargin">
                        <a href="{{ route('home') }}">سرسرای  </a>
                        <span class="icon-left"></span>
                        <a href="{{ route('product.index') }}">محصولات</a>
                        <span class="icon-left"></span>
                        <strong>{{ $category->title }}</strong>
                    </div>
                </div>
                <h2 class="arsesTitl position-relative">{{ $category->title }}</h2>
                <div class="tabBox">
                    <div class="tabHeader">
                        <ul>

                            @foreach($related_categories as $child)
                                @if($child->id != $category->id)
                                    <li>
                                        <a
                                            href="{{ route('product-categories.show', ['slug' => $child->slug]) }}"
                                            class="tablinks @if($category->id == $child->id) active @endif transitionCls position-relative"
                                            tabId="tabTwo"
                                        >{{ $child->title }}
                                        </a>
                                    </li>
                                @endif
                            @endforeach

                        </ul>
                    </div>
                    <div id="tabOne" class="tabcontent">
                        <div class="srchResult">
                            @foreach($products as $product)
                                <a
                                    href="{{ route('product.show', ['slug' => $product->slug]) }}"
                                    class="newestCrd position-relative transitionCls"
                                >
                                    <div class="cardImg transitionCls">
                                        <img src="{{ $product->getFirstMediaUrl('image') }}" class="" alt="img" />
                                    </div>
                                    <div class="cardBdy">
                                        <img src="{{ $product->brand->getFirstMediaUrl('image') }}" alt="brand" />
                                        <h2>{{ $product->title }}</h2>
                                        <div class="line transitionCls"></div>
                                        <p>{{ $product->summary }}</p>
                                    </div>
                                </a>
                            @endforeach
                        </div>
                    </div>
                    <div id="tabTwo" class="tabcontent">2</div>
                    <div id="tabThree" class="tabcontent">3</div>
                    <div id="tabFour" class="tabcontent">4</div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
@push('upper-content')
    @include('arses.partials.top-moving-logo')
    @include('arses.partials.search-bar', ['hide_logo' => true])
@endpush

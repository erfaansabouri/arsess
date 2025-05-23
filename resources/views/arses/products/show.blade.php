@extends('arses.master-ii')
@section('content')
<section class="productSec">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="breadCrumb">
                    <a href="{{ route('home') }}">سرسرای</a>
                    <span class="icon-left"></span>
                    <a href="{{ route('product.index') }}">محصولات </a>
                    <span class="icon-left"></span>
                    @foreach($product->categories as $c)
                        <a href="{{ route('product-categories.show', ['slug' => $c->slug]) }}">
                            {{ $c->title }}
                        </a>
                    @endforeach

                    <span class="icon-left"></span>
                    <strong>{{ $product->title }}</strong>
                </div>
                <div class="productRow">
                    <div class="productImg position-relative">
                        <img
                            src="{{ $product->getFirstMediaUrl('image') }}"
                            class="position-relative"
                            alt="img"
                        />
                        <div class="imgLeftBx position-absolute"></div>
                        <div class="imgAfter position-absolute"></div>
                    </div>
                    <div class="prodctInfo">
                        <h1>{{ $product->title }}</h1>
                        @if($product->productAttributes->count())
                            <div class="features">
                                <strong> ویژگی‌های کلیدی:</strong>
                                <ul>
                                    @foreach($product->productAttributes as $pa)
                                        <li>{{ $pa->title }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        @if($product->productPurchaseConditions->count())
                            <div class="features">
                                <strong>شرایط خرید:</strong>
                                <ul>
                                    @foreach($product->productPurchaseConditions as $ppc)
                                        <li>{{ $ppc->title }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <div class="price">{{ number_format($product->price) }} تومان</div>
                        <a href="{{ route('cart.add', $product->id) }}" class=""><button class="btn transitionCls">افزودن به سبد خرید</button></a>
                    </div>
                </div>
                <div class="prdctIntro">
                    <h2>معرفی:</h2>
                    <div class="introBox">
                        {!! $product->description !!}
                    </div>
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

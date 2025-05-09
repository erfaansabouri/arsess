@extends('arses.master-ii')
@section('content')
    <section class="searchSec">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="saraTopLnks">
                        <div class="breadCrumb">
                            <a href="{{ route('home') }}">سرا </a>
                            <span class="icon-left"></span>
                            <p>محصولات</p>
                        </div>
                        <ul class="linksList">
                            @foreach($categories as $c)
                                <li>
                                    <a href="{{ route('product-categories.show', ['slug' => $c->slug]) }}" class="transitionCls">{{ $c->title }}</a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                    <h2 class="arsesTitl position-relative">محصولات سرای آرسس</h2>
                    <div class="srchResult">
                        @foreach($products as $p)
                            <a href="{{ route('product.show', ['slug' => $p->slug]) }}" class="newestCrd position-relative transitionCls">
                                <div class="cardImg transitionCls">
                                    <img src="{{ $p->getFirstMediaUrl('image') }}" class="" alt="img" />
                                </div>
                                <div class="cardBdy">
                                    <img src="{{ $p->brand->getFirstMediaUrl('image') }}" alt="brand" />
                                    <h2>{{ $p->title }}</h2>
                                    <div class="line transitionCls"></div>
                                    <p>{{ $p->summary }}</p>
                                </div>
                            </a>
                        @endforeach
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

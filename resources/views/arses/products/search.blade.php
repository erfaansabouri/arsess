@extends('arses.master-ii')
@section('content')
    <section class="searchSec">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h2 class="arsesTitl">نتایج جست و جوی {{ request('search') }}:</h2>
                    @if($products->count() == 0)
                        <div class="noResult">
                            <p>
                                «متاسفانه برای این جست و جوی شما در سرای آرسس نتیجه‌ای
                                نیافتیم. پیشنهاد می‌کنیم با رویکرد دیگری به جست و جو
                                بپردازید.»
                            </p>
                        </div>
                    @else
                        <div class="srchResult">
                            @foreach($products as $p)
                                <a href="{{ route('product.show', ['slug' => $p->slug]) }}" class="newestCrd position-relative transitionCls">
                                    <div class="cardImg transitionCls">
                                        <img src="{{ $p->getFirstMediaUrl('image') }}" class="" alt="img">
                                    </div>
                                    <div class="cardBdy">
                                        <img src="{{ $p->brand->getFirstMediaUrl('image') }}" alt="brand">
                                        <h2>{{ $p->title }}</h2>
                                        <div class="line transitionCls"></div>
                                        <p>{{ $p->summary }}</p>
                                    </div>
                                </a>
                            @endforeach
                        </div>
                    @endif


                </div>
            </div>
        </div>
    </section>
@endsection
@push('upper-content')
    @include('arses.partials.top-moving-logo')
    @include('arses.partials.search-bar', ['hide_logo' => true])
@endpush

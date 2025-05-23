@php use App\Services\CartService; @endphp
@extends('arses.master-ii')
@section('content')
    <section class="cartSec">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="cartPgTitle setMargin">
                        <h2>سبد خرید</h2>
                    </div>
                    <div class="cartRow">
                        <div class="cartRight position-relative">
                            <div class="cartSetlmnt"></div>
                            <div class="cartSvg"></div>
                            <div class="discountCod">کوپن تخفیف دارید؟</div>
                            <div class="discountBx">
                                <div class="discountDiv transitionCls">
                                    <input
                                        type="text"
                                        class="form-control"
                                        placeholder="کد تخفیف"
                                    />
                                    <button class="btn transitionCls">
                                        <span class="icon-Next"></span>
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="cartLeft">
                            <div class="cartEmpty emptyBox whiteEmpty">
                                <p>
                                    سبد خرید شما خالی است؛ ما راضی نیستیم شما دست خالی به خانه
                                    برگردید! از <a href="{{ route('product.index') }}">محصولات ما</a> بازدید فرمایید.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@push('upper-content')
    @include('arses.partials.top-moving-logo')
@endpush


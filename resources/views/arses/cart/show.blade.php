@extends('arses.master-ii')
@section('content')
<section class="cartSec">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="cartPgTitle">
                    <h2>سبد خرید</h2>
                </div>
                <div class="cartRow">
                    <div class="cartRight position-relative">
                        <div class="cartSetlmnt">
                            <ul class="setlmntUl">
                                <li>
                                    <strong>جمع سبد خرید</strong>
                                </li>
                                <li>
                                    <span>جمع محصولات</span>
                                    <p>{{ number_format($user->total_price_of_cart_items) }} تومان</p>
                                </li>
                                <li>
                                    <span>هزینه ارسال</span>
                                    <p>{{ number_format($shipping_price) }} تومان</p>
                                </li>
                                <li>
                                    <a href="#">ارسال به:</a>
                                    <br>
                                    {{-- radio button --}}
                                    <p class="radioBtn">
                                        @foreach($user->addresses as $address)
                                            <input type="radio" id="radio1" name="address_id" value="{{ $address->id }}" checked>
                                            <label for="radio1">{{ $address->address }}</label>
                                            <br>
                                        @endforeach
                                    </p>
                                </li>
                                @if($user->addresses->count() == 0)
                                    <li>
                                        <a href="#">لطفا یک آدرس ثبت نمایید.</a>
                                        <p></p>
                                    </li>
                                @else
                                    <li>
                                        <a href="#">ویرایش آدرس</a>
                                        <p></p>
                                    </li>
                                @endif

                                <li>
                                    <strong>مجموع</strong>
                                    <p>{{ number_format($shipping_price + $user->total_price_of_cart_items) }} تومان</p>
                                </li>
                            </ul>
                            <button class="setlmntBtn btn transitionCls">
                                تسویه حساب
                            </button>
                        </div>
                        <div class="cartSvg"></div>
                        <button class="btn discountCod">کوپن تخفیف دارید؟</button>
                    </div>
                    <div class="cartLeft">
                        <div class="table-responsive">
                            <table class="table align-middle">
                                <thead>
                                <tr>
                                    <th scope="col">جمع جزء</th>
                                    <th scope="col">تعداد</th>
                                    <th scope="col">قیمت</th>
                                    <th scope="col">محصول</th>
                                    <th scope="col"></th>
                                    <th scope="col"></th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($cart_items as $cart_item)
                                    <tr>
                                        <td>
                                            <div class="price">
                                                <span>ت</span>
                                                <p>{{ number_format($cart_item->product->price) }}</p>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="number">x{{ number_format($cart_item->quantity) }}</div>
                                        </td>
                                        <td>
                                            <div class="price">
                                                <span>ت</span>
                                                <p>{{ number_format($cart_item->total_price) }}</p>
                                            </div>
                                        </td>
                                        <td>
                                            <a href="#" class="d-block">
                                                <h2>{{ $cart_item->product->title }}</h2>
                                            </a>
                                        </td>
                                        <td>
                                            <a href="#" class="tblImg d-block">
                                                <img src="{{ $cart_item->product->getFirstMediaUrl('image') }}" alt="img" />
                                            </a>
                                        </td>
                                        <td>
                                            <a href="{{ route('cart.remove', $cart_item->id) }}" class="btn removeBtn">
                                                <span class="icon-Remove"></span>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                        <button class="btn discountCod">کوپن تخفیف دارید؟</button>
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

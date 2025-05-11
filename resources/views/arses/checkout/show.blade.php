@php use App\Services\CartService; @endphp
@extends('arses.master-ii')
@section('content')
    <section class="chkoutSec">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="chkoutHed">
                        <h1>اطلاعات پرداخت</h1>
                    </div>
                    <div class="chkoutRow">
                        <div class="chkoutRght position-relative">
                            <form class="row gx-3 gy-5">
                                <div class="col-xl-6 col-md-6 col-lg-12">
                                    <label for="inpt01" class="form-label">نام</label>
                                    <input
                                        type="text"
                                        class="form-control"
                                        id="inpt01"
                                        placeholder="نام"
                                    />
                                </div>
                                <div class="col-xl-6 col-md-6 col-lg-12">
                                    <label for="inpt02" class="form-label"
                                    >نام خانوادگی</label
                                    >
                                    <input
                                        type="text"
                                        class="form-control"
                                        id="inpt02"
                                        placeholder="نام خانوادگی"
                                    />
                                </div>
                                <div class="col-12">
                                    <label for="inpt04" class="form-label">آدرس</label>
                                    <input
                                        type="text"
                                        class="form-control"
                                        id="inpt04"
                                        placeholder="آدرس"
                                    />
                                </div>
                                <div class="col-12">
                                    <label for="inpt05" class="form-label">کد پستی</label>
                                    <input
                                        type="text"
                                        class="form-control"
                                        id="inpt05"
                                        placeholder="کد پستی"
                                    />
                                </div>
                                <div class="col-12">
                                    <label for="inpt06" class="form-label"
                                    >شماره موبایل</label
                                    >
                                    <input
                                        type="text"
                                        class="form-control"
                                        id="inpt06"
                                        placeholder="شماره موبایل"
                                    />
                                </div>
                                <div class="col-12">
                                    <label for="inpt08" class="form-label">ایمیل</label>
                                    <input
                                        type="email"
                                        class="form-control"
                                        id="inpt08"
                                        placeholder="ایمیل"
                                    />
                                </div>
                                <div class="col-12">
                                    <textarea
                                        name=""
                                        id="inpt09"
                                        rows="3"
                                        class="form-control"
                                        placeholder="می‌خواهید توضیحاتی را به سفارش ضمیمه کنید؟"
                                    ></textarea>
                                </div>
                            </form>
                        </div>
                        <div class="chkoutLft">
                            <div class="leftBox factorBox position-relative">
                                <ul>
                                    <li>
                                        <strong>محصول</strong>
                                        <strong>قیمت</strong>
                                    </li>
                                    @foreach(CartService::getProducts() as $cart_item)
                                        <li>
                                            <div>
                                                <span>{{ $cart_item['product']->title }}</span>
                                                <span></span>
                                            </div>
                                            <p>{{ number_format($cart_item['price']) }} تومان</p>
                                        </li>

                                    @endforeach

                                    <li>
                                        <strong> جمع محصولات </strong>
                                        <strong>{{ number_format(CartService::getTotalPrice()) }} تومان</strong>
                                    </li>
                                    <li>
                                        <strong>ارسال</strong>
                                        <strong>{{ number_format(CartService::getShippingPrice()) }} تومان</strong>
                                    </li>
                                    <li>
                                        <strong>جمع کل</strong>
                                        <strong>{{ number_format(CartService::getTotalPrice() + CartService::getShippingPrice()) }} تومان</strong>
                                    </li>
                                </ul>
                                <div class="leftBoxCvr position-absolute"></div>
                            </div>
                            <div class="leftBox paymentBx">
                                <p>اگر کوپن تخفیف دارید <a href="#">اینجا کلیک</a> کنید.</p>
                                <div class="text">
                                    اطلاعات شخصی شما جهت استفاده در فرایند سفارش استفاده
                                    می‌شود. و برای موارد دیگر صفحه
                                    <a href="#">قوانین استفاده </a> را بخوانید
                                </div>
                                <div class="form-check">
                                    <input
                                        class="form-check-input"
                                        type="checkbox"
                                        value=""
                                        id="payCheck"
                                    />
                                    <label class="form-check-label" for="payCheck">
                                        شرایط و مقررات این سایت را خوانده‌ام و قبول دارم.
                                    </label>
                                </div>
                                <button class="btn transitionCls">پرداخت</button>
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



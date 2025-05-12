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
                            <form id="main-form" method="POST" action="{{ route('checkout.do-checkout') }}" class="row gx-3 gy-5">
                                @csrf
                                <div class="col-xl-6 col-md-6 col-lg-12">
                                    <label for="inpt01" class="form-label">نام</label>
                                    <input
                                        type="text"
                                        class="form-control"
                                        id="inpt01"
                                        placeholder="نام"
                                        name="first_name"
                                        required
                                        value="{{ old('first_name') }}"
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
                                        name="last_name"
                                        required
                                        value="{{ old('last_name') }}"
                                    />
                                </div>
                                <div class="col-12">
                                    <label for="inpt04" class="form-label">آدرس</label>
                                    <input
                                        type="text"
                                        class="form-control"
                                        id="inpt04"
                                        placeholder="آدرس"
                                        name="address"
                                        required
                                        value="{{ old('address') }}"
                                    />
                                </div>
                                <div class="col-12">
                                    <label for="inpt05" class="form-label">کد پستی</label>
                                    <input
                                        type="text"
                                        class="form-control"
                                        id="inpt05"
                                        placeholder="کد پستی"
                                        name="postal_code"
                                        required
                                        value="{{ old('postal_code') }}"
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
                                        name="phone"
                                        required
                                        value="{{ old('phone') }}"

                                    />
                                </div>
                                <div class="col-12">
                                    <label for="inpt08" class="form-label">ایمیل</label>
                                    <input
                                        type="email"
                                        class="form-control"
                                        id="inpt08"
                                        placeholder="ایمیل"
                                        name="email"
                                        value="{{ old('email') }}"
                                    />
                                </div>
                                <div class="col-12">
                                    <textarea
                                        name="description"
                                        id="inpt09"
                                        rows="3"
                                        class="form-control"
                                        placeholder="می‌خواهید توضیحاتی را به سفارش ضمیمه کنید؟"
                                    >{{ old('description') }}</textarea>
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
                                        <strong>تخفیف</strong>
                                        <strong id="discount-amount">{{ number_format(CartService::getDiscountAmount()) }} تومان</strong>
                                    </li>
                                    <li>
                                        <strong>جمع کل</strong>
                                        <strong id="payment-price">{{ number_format(CartService::getPaymentPrice()) }} تومان</strong>
                                    </li>
                                </ul>
                                <div class="leftBoxCvr position-absolute"></div>
                            </div>
                            <div class="leftBox paymentBx">
                                <p class="hasCodeTxt" style="display: block;">
                                    اگر کوپن تخفیف دارید
                                    <a href="#" class="opnDiscntBx">اینجا کلیک</a> کنید.
                                </p>
                                <div class="discntBx" style="display: none;" >
                                    <div class="discountDiv transitionCls">
                                        <input type="text" name="code" class="form-control" placeholder="کد تخفیف">
                                        <button id="check-coupon" class="btn transitionCls">
                                            <span class="icon-Next"></span>
                                        </button>
                                    </div>
                                    <p class="text-danger" id="coupon-error"></p>
                                    <p class="text-success" id="coupon-success"></p>
                                </div>

                                <div class="text">
                                    اطلاعات شخصی شما جهت استفاده در فرایند سفارش استفاده
                                    می‌شود. و برای موارد دیگر صفحه
                                    <a href="#">قوانین استفاده </a> را بخوانید
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" id="payCheck">
                                    <label class="form-check-label" for="payCheck">
                                        شرایط و مقررات این سایت را خوانده‌ام و قبول دارم.
                                    </label>
                                </div>
                                <button type="submit" id="payment-button" class="btn transitionCls">پرداخت</button>
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
@push('scripts')
    {{-- do ajax call for discount --}}
    <script>
        $(document).ready(function () {
            $('#check-coupon').on('click', function (e) {
                e.preventDefault();
                let code = $('input[name=code]').val();
                $.ajax({
                    url: "{{ route('checkout.check-coupon') }}",
                    type: "POST",
                    data: {
                        code: code,
                        _token: '{{ csrf_token() }}'
                    },
                    success: function (response) {
                        if (response.status === 'success') {
                            $('#coupon-success').text('کد تخفیف با موفقیت اعمال شد');
                            $('#coupon-error').text('');
                            // number format and concat toman
                            let discountAmount = new Intl.NumberFormat('fa-IR').format(response.discount);
                            let totalPrice = new Intl.NumberFormat('fa-IR').format(response.total);
                            $('#discount-amount').text(discountAmount + ' تومان');
                            $('#payment-price').text(totalPrice + ' تومان');
                        } else if (response.status === 'error') {
                            $('#coupon-error').text('کد تخفیف نامعتبر است');
                            $('#coupon-success').text('');
                        } else {
                            $('#coupon-error').text('خطا در پردازش درخواست');
                            $('#coupon-success').text('');
                        }
                    },
                    error: function (xhr) {
                        console.log(xhr.responseText);
                    }
                });
            });

            // if payCheck is off then disable payment button
            $('#payCheck').on('change', function () {
                if ($(this).is(':checked')) {
                    $('#payment-button').removeAttr('disabled');
                } else {
                    $('#payment-button').attr('disabled', 'disabled');
                }
            });

            // when payment button clicked then submit the form
            $('#payment-button').on('click', function (e) {
                e.preventDefault();
                if ($('#payCheck').is(':checked')) {
                    $('#main-form').submit();
                } else {
                    alert('لطفا شرایط و مقررات را بپذیرید');
                }
            });
        });
    </script>
@endpush



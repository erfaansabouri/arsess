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
                            <div class="cartSetlmnt">
                                <ul class="setlmntUl">
                                    <li>
                                        <strong>جمع کارت</strong>
                                    </li>
                                    <li>
                                        <span>جمع جزء</span>
                                        <p>{{ number_format(CartService::getTotalPrice()) }} تومان</p>
                                    </li>
                                    <li>
                                        <span>ارسال</span>
                                        <p>پس کرایه</p>
                                    </li>
                                    <li id="discount-li" @if(CartService::getDiscountAmount() == 0) style="display: none"  @endif>
                                        <span>تخفیف</span>
                                        <p id="discount-amount">{{ number_format(CartService::getDiscountAmount()) }} تومان</p>
                                    </li>
                                    <li>
                                        <strong>مجموع</strong>
                                        <p id="payment-price">{{ number_format(CartService::getPaymentPrice()) }} تومان</p>
                                    </li>
                                </ul>
                                <a href="{{ route('checkout.show') }}" class="setlmntBtn">
                                    <button class="setlmntBtn btn transitionCls">
                                        تسویه حساب
                                    </button>
                                </a>
                            </div>
                            <div class="cartSvg"></div>
                            <div class="discountCod">
                                <p>کوپن تخفیف دارید؟</p>
                                <div class="discountBx">
                                    <div class="discountDiv transitionCls">
                                        <input
                                            type="text"
                                            class="form-control"
                                            placeholder="کد تخفیف"
                                            name="code"
                                        />
                                        <button id="check-coupon" class="btn transitionCls">
                                            <span class="icon-Next"></span>
                                        </button>
                                    </div>
                                </div>
                            </div>
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
                                    @foreach($products as $cart_item)
                                        <tr>
                                            <td>
                                                <div class="price">
                                                    <span>ت</span>
                                                    <p>{{ number_format($cart_item['product']->price) }}</p>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="number">x{{ number_format($cart_item['quantity']) }}</div>
                                            </td>
                                            <td>
                                                <div class="price">
                                                    <span>ت</span>
                                                    <p>{{ number_format($cart_item['price']) }}</p>
                                                </div>
                                            </td>
                                            <td>
                                                <a href="{{ route('product.show', $cart_item['product']->slug) }}" class="d-block">
                                                    <h2>{{ $cart_item['product']->title }}</h2>
                                                </a>
                                            </td>
                                            <td>
                                                <a href="{{ route('product.show', $cart_item['product']->slug) }}" class="tblImg d-block">
                                                    <img src="{{ $cart_item['product']->getFirstMediaUrl('image') }}" alt="img"/>
                                                </a>
                                            </td>
                                            <td>
                                                <a href="{{ route('cart.remove', $cart_item['product']->id) }}" class="btn removeBtn">
                                                    <span class="icon-Remove"></span>
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <div class="discountCod">
                                <p>کوپن تخفیف دارید؟</p>
                                <div class="discountBx">
                                    <div class="discountDiv transitionCls">
                                        <input
                                            type="text"
                                            class="form-control"
                                            placeholder="کد تخفیف"
                                            name="code2"
                                        />
                                        <button id="check-coupon-2" class="btn transitionCls">
                                            <span class="icon-Next"></span>
                                        </button>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@push('upper-content')
    <div style="display: none" id="code-fail" class="notif notifBox errorNotif">
        <p>کد تخفیف نا معتبر است</p>
    </div>
    <div style="display: none" id="code-success" class="notif notifBox successNotif">
        <img src="{{ asset('arses/asset/img/white-tick.svg') }}" alt="icon" />
        <p>تخفیف با موفقیت اعمال شد</p>
    </div>
    @include('arses.partials.top-moving-logo')
@endpush

@push('scripts')
    {{-- do ajax call for discount --}}
    <script>
        $(document).ready(function () {
            $('#check-coupon').on('click', function (e) {
                console.log('clicked')
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
                            $('#discount-li').show();
                            $('#code-success').show()
                            // number format and concat toman
                            let discountAmount = new Intl.NumberFormat('fa-IR').format(response.discount);
                            let totalPrice = new Intl.NumberFormat('fa-IR').format(response.total);
                            $('#discount-amount').text(discountAmount + ' تومان');
                            $('#payment-price').text(totalPrice + ' تومان');
                        } else if (response.status === 'error') {
                            $('#code-fail').show();
                        } else {
                            $('#code-fail').show();
                        }
                    },
                    error: function (xhr) {
                        console.log(xhr.responseText);
                    }
                });
            });
            $('#check-coupon-2').on('click', function (e) {
                console.log('clicked')
                e.preventDefault();
                let code = $('input[name=code2]').val();
                $.ajax({
                    url: "{{ route('checkout.check-coupon') }}",
                    type: "POST",
                    data: {
                        code: code,
                        _token: '{{ csrf_token() }}'
                    },
                    success: function (response) {
                        if (response.status === 'success') {
                            $('#discount-li').show();
                            $('#code-success').show()
                            // number format and concat toman
                            let discountAmount = new Intl.NumberFormat('fa-IR').format(response.discount);
                            let totalPrice = new Intl.NumberFormat('fa-IR').format(response.total);
                            $('#discount-amount').text(discountAmount + ' تومان');
                            $('#payment-price').text(totalPrice + ' تومان');
                        } else if (response.status === 'error') {
                            $('#code-fail').show();
                        } else {
                            $('#code-fail').show();
                        }
                    },
                    error: function (xhr) {
                        console.log(xhr.responseText);
                    }
                });
            });
        });
    </script>
@endpush

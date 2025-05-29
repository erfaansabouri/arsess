@php use App\Services\CartService; @endphp
@extends('arses.master-ii')
@section('content')
    <section class="chkoutSec accontSec">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="chkoutRow chkoutRow2 setMargin">
                        <div class="chkoutRght tableSide position-relative">
                            <div class="chkutBxHed">سفارشات</div>
                            <div class="orderTbl">
                                <div class="table-responsive position-relative">
                                    <table class="table align-middle">
                                        <tbody>
                                        @foreach($invoices as $invoice)
                                            @php
                                            $colorClass = 'grayColor';
                                            if ($invoice->paid_at){
                                                $colorClass = '';
                                            }
                                            @endphp
                                            <tr>
                                                <td>
                                                    <p class="{{ $colorClass }}">سفارش شماره {{ $invoice->code }}</p>
                                                </td>
                                                <td>
                                                    <p class="{{ $colorClass }}">{{ verta($invoice->created_at)->formatJalaliDatetime() }}</p>
                                                </td>
                                                <td>
                                                    <p class="{{ $colorClass }}">{{ number_format($invoice->payment_price) }} ت</p>
                                                </td>
                                                <td>
                                                    <p class="{{ $colorClass }}">
                                                        @if($invoice->paid_at)
                                                            پرداخت شده
                                                        @elseif($invoice->failed_at)
                                                            ناموفق
                                                        @else
                                                            در انتظار پرداخت
                                                        @endif
                                                    </p>
                                                </td>
                                            {{--    <td>
                                                    <button class="dwnldBtn {{ $colorClass }} btn transitionCls" disabled="">
                                                        <i>دانلود فاکتور</i>
                                                        <span class="icon-Billing-Factor"></span>
                                                    </button>
                                                </td>--}}
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                <div class="ordersHed">
                                    <span class="icon-Next"></span>
                                </div>
                            </div>
                            <div class="hideTable position-absolute">
                                <button class="cancelBtn btn transitionCls">
                                    <span class="icon-Remove"></span>
                                    <p>لغو</p>
                                </button>
                            </div>
                        </div>
                        <div class="chkoutLft">
                            <div class="chkutBxHed">حساب کاربری</div>
                            <div class="leftBox accountBox position-relative">
                                <div class="accountInfo readonlyInfo">
                                    <div class="accountHed">
                                        <strong>مشخصات حساب کاربری</strong>
                                        <a href="{{ route('my-profile.logout') }}" class="btn transitionCls">خروج</a>
                                    </div>
                                    <strong>نام</strong>
                                    <input name="first_name" type="text" class="mb-3" value="{{ $user->first_name }}" readonly="">

                                    <strong>نام خانوادگی</strong>
                                    <input name="last_name" type="text" class="mb-3" value="{{ $user->last_name }}" readonly="">

                                    <strong>شماره تماس</strong>
                                    <input  type="text" class="mb-3" value="{{ $user->phone }}" readonly="readonly">

                                    <strong>کد ملی</strong>
                                    <input name="national_code" type="text" class="mb-3" value="{{ $user->national_code }}" readonly="">


                                    <strong>آدرس</strong>
                                    <input name="address" type="text" value="{{ $user->address }}" readonly="">
                                    <button id="edit-btn" style="display: block" class="editBtn btn transitionCls">ویرایش</button>
                                    <button id="submit-btn" style="display: none" class="editBtn btn transitionCls">ذخیره</button>
                                </div>
                                <div class="leftBoxCvr position-absolute"></div>
                            </div>
                            <div class="ordrPgPadng"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <input type="hidden" value="not_ready" id="profile-form">
@endsection
@push('upper-content')
    @include('arses.partials.top-moving-logo')
@endpush

@push('scripts')
    <script>
        $(document).ready(function () {
            // when edit-btn clicked
            $('#edit-btn').click(function () {
                // show submit-btn
                $('#submit-btn').show();
                // hide edit-btn
                $(this).hide();
                // make inputs editable
                $(".hideTable").fadeIn(300);
                $(".accountInfo").addClass("editable").removeClass("readonlyInfo");
                $(".accountInfo input").attr("readonly", false);

            });
            $('#submit-btn').click(function (e) {
                e.preventDefault();
                let url = "{{ route('my-profile.update') }}";
                let data = {
                    first_name: $('input[name="first_name"]').val(),
                    last_name: $('input[name="last_name"]').val(),
                    address: $('input[name="address"]').val(),
                    national_code: $('input[name="national_code"]').val(),
                    _token: '{{csrf_token()}}'
                };
                $.ajax({
                    url: url,
                    type: 'POST',
                    data: data,
                    success: function (response) {
                        if (response.status === 'success') {
                            // show success message
                            // hide submit-btn
                            $('#submit-btn').hide();
                            // show edit-btn
                            $('#edit-btn').show();
                            // make inputs readonly
                            $(".hideTable").fadeOut(300);
                            $(".accountInfo").removeClass("editable").addClass("readonlyInfo");
                            $(".accountInfo input").attr("readonly", true);
                        } else {
                            // show error message
                            alert('An error occurred. Please try again.');
                        }
                    },
                    error: function (xhr) {
                        alert('An error occurred. Please try again.');
                    }
                });
            });
        });
    </script>
@endpush

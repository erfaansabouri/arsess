@extends('arses.master')
@section('content')
    <section class="loginSec">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="setMargin">
                        <div class="loginBox">
                            <div class="loginHed">
                                <h1>ورود</h1>
                            </div>
                            <form method="POST" action="{{ route('auth.get-sms') }}">
                                @csrf
                                <label for="input01">شماره موبایل</label>
                                <input
                                    type="text"
                                    id="input01"
                                    placeholder="09"
                                    name="phone"
                                />
                                <button class="btn transitionCls">ارسال</button>
                            </form>
                            @if ($errors->any())
                                @foreach ($errors->all() as $error)
                                    @include('arses.partials.under-input-error', ['error_message' => $error])
                                @endforeach
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

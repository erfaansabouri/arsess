@extends('arses.master')
@section('content')
    <section class="loginSec">
        <div class="container">
            <div class="row">
                <div class="col-12">
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
                            <div class="alert alert-danger mt-3">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

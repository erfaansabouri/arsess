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
                        <form action="{{ route('auth.verify-code') }}" method="POST">
                            @csrf
                            <input type="hidden" name="phone" value="{{ request('phone') }}">
                            <label for="input02">کد تایید</label>
                            <input
                                type="text"
                                id="input02"
                                name="code"
                                placeholder="کد تایید ارسال شده به گوشی شما..."
                            />
                            <button class="btn transitionCls">ورود</button>
                        </form>
                        {{-- error --}}
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

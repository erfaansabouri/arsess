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
                            @foreach ($errors->all() as $error)
                                @include('arses.partials.under-input-error', ['error_message' => $error])
                            @endforeach
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

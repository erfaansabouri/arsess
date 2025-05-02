@extends('arses.master')
@section('content')
    <section class="aboutSec">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="aboutSecBx">
                        <a href="#" class="d-block aboutLogo">
                            <img src="{{ asset('arses/asset/img/footer-logo.svg') }}" alt="logo" />
                        </a>
                        <div class="title">
                            <p>فروشگاه ملزومات آشپزی خاص و حرفه‌ای</p>
                            <h1>آرمــــــان ما خلاقیـــــــــت از اصــــــــــالت است.</h1>
                        </div>
                        <div class="aboutImg">
                            <img src="{{ asset('arses/asset/img/about-img.svg') }}" alt="img" />
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <img src="{{ asset('arses/asset/img/vector01.png') }}" class="aboutVector" alt="img" />
    </section>
@endsection

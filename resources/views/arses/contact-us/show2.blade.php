<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>
        تماس با سرای
    </title>
    <link rel="stylesheet" href="{{ asset('arses/asset/css/bootstrap.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('arses/asset/css/main.css') }}" />
    <link rel="stylesheet" href="{{ asset('arses/asset/css/icomoon.css') }}" />
    <link rel="stylesheet" href="{{ asset('arses/asset/css/swiper-bundle.min.css') }}" />

    <!-- <link rel="icon" href="asset/img/favicon.svg" /> -->
    <link rel="icon" href="{{ asset('arses/asset/img/favicon.png') }}" />
    <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('arses/asset/img/favicon.png') }}" />
    <link rel="apple-touch-icon" sizes="152x152" href="{{ asset('arses/asset/img/favicon.png') }}" />
    <link rel="apple-touch-icon" sizes="167x167" href="{{ asset('arses/asset/img/favicon.png') }}" />
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('arses/asset/img/favicon.png') }}" />
</head>

<body>
<div class="bodyDiv overflow-hidden">
    @include('arses.partials.top-moving-logo')

    <section class="contactSec">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="contactHed setMargin">
                        <h1>تماس با سرای</h1>
                    </div>
                    <div class="contactRow">
                        <div class="contactBox position-relative">
                            <div class="mb-5">
                                <strong>شماره تماس‌های سرای</strong>
                                <p>{{ $contact_us->phone_1 }}</p>
                                <p>{{ $contact_us->phone_2 }}</p>
                            </div>
                            <div>
                                <strong>آدرس‌ها</strong>
                                <p>{{ $contact_us->address }}</p>
                            </div>
                        </div>
                        <div class="contactMap position-relative">
                            <div class="mapBox position-relative">
                                <iframe
                                    width="425"
                                    height="350"
                                    src="{{ $contact_us->openstreet_url }}"
                                ></iframe>
                            </div>
                            <div class="afterMap position-absolute"></div>
                            <div class="mapWhitBx position-absolute"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    @include('arses.partials.footer')
</div>

<script src="{{ asset('arses/asset/js/jquery.min.js') }}"></script>
<script src="{{ asset('arses/asset/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('arses/asset/js/swiper-bundle.min.js') }}"></script>

<script src="{{ asset('arses/asset/js/main.js') }}"></script>
</body>
</html>

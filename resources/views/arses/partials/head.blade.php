<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="description" content="@yield('meta_description')">
    <meta name="keywords" content="@yield('meta_keywords')">
    <meta property="og:image" content="{{ \App\Models\HomeSeoAttribute::first()->getFirstMediaUrl('image') }}" />
    <meta property="og:image:width" content="720" />
    <meta property="og:image:height" content="596" />
    <meta property="og:image:type" content="image/png" />
    <meta name="twitter:card" content="summary_large_image" />
    @yield('canonical_url')
    <title>سرای آرسس | @yield('title')</title>
    <link rel="stylesheet" href="{{ asset('arses/asset/css/bootstrap.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('arses/asset/css/main.css?3') }}" />
    <link rel="stylesheet" href="{{ asset('arses/asset/css/icomoon.css') }}" />
    <link rel="stylesheet" href="{{ asset('arses/asset/css/swiper-bundle.min.css') }}" />

    <!-- <link rel="icon" href="asset/img/favicon.svg" /> -->
    <link rel="icon" href="{{ asset('arses/asset/img/favicon.png') }}" />
    <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('arses/asset/img/favicon.png') }}" />
    <link rel="apple-touch-icon" sizes="152x152" href="{{ asset('arses/asset/img/favicon.png') }}" />
    <link rel="apple-touch-icon" sizes="167x167" href="{{ asset('arses/asset/img/favicon.png') }}" />
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('arses/asset/img/favicon.png') }}" />
</head>

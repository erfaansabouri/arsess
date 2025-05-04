@extends('arses.master-ii')
@section('content')
    <section class="homTopSec headerSec">
        <img src="{{ asset('arses/asset/img/home-header.png') }}" class="homeHdrImg" alt="img" />
        <div class="homHdrCntnt">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <a href="#" class="homHdrLogo d-block">
                            <img src="{{ asset('arses/asset/img/logo.svg') }}" alt="logo" />
                        </a>
                        <div class="topSerch">
                            <div class="cartLink openSide topSrchLnk transitionCls">
                                <span class="icon-Cart"></span>
                            </div>
                            <div class="headerMnu position-relative">
                                <div class="menuLink topSrchLnk transitionCls">
                                    <span class="icon-Frame-15"></span>
                                </div>
                                <div class="subBox">
                                    <div class="mnuBox">
                                        <ul class="hdrMnuUl">
                                            <li class="hdrMnuLi position-relative">
                                                <div class="hdrMnuLiBx">
                                                    <a href="{{ route('home') }}" class="hdrSubLnk">سرسرای</a>
                                                </div>
                                            </li>
                                            <li class="hdrMnuLi havSub position-relative">
                                                <div class="hdrMnuLiBx">
                                                    <a href="#" class="hdrSubLnk">محصولات</a>
                                                    <span
                                                        class="icon-Next openSub transitionCls"
                                                    ></span>
                                                </div>
                                                <ul class="hdrSubUl">
                                                    <li class="hdrSubLi prdctHasSub">
                                                        <div class="prdctLnkBx">
                                                            <a href="#">تجهیزات آشپزی</a>
                                                            <span
                                                                class="icon-Next opnPrdctSub transitionCls"
                                                            ></span>
                                                        </div>
                                                        <div class="prdctSubBx">
                                                            <a href="#">تجهیزات آشپزی</a>
                                                            <a href="#">تجهیزات قنادی و نانوایی</a>
                                                            <a href="#">تجهیزات باریستایی</a>
                                                        </div>
                                                    </li>
                                                    <li class="hdrSubLi prdctHasSub">
                                                        <div class="prdctLnkBx">
                                                            <a href="#">مواد اولیه آشپزی</a>
                                                            <span
                                                                class="icon-Next opnPrdctSub transitionCls"
                                                            ></span>
                                                        </div>
                                                        <div class="prdctSubBx">
                                                            <a href="#"> مواد اولیه آشپزی </a>
                                                            <a href="#"> مواد اولیه قنادی و نانوایی </a>
                                                            <a href="#">مواد اولیه باریستایی</a>
                                                        </div>
                                                    </li>
                                                </ul>
                                            </li>
                                            <li class="hdrMnuLi position-relative">
                                                <div class="hdrMnuLiBx">
                                                    <a href="{{ route('about-us.show') }}" class="hdrSubLnk">درباره ما</a>
                                                </div>
                                            </li>
                                            <li class="hdrMnuLi position-relative">
                                                <div class="hdrMnuLiBx">
                                                    <a href="{{ route('contact-us.show') }}" class="hdrSubLnk">تماس با ما</a>
                                                </div>
                                            </li>
                                            <li class="hdrMnuLi position-relative">
                                                <div class="hdrMnuLiBx">
                                                    <a href="{{ route('blog-posts.index') }}" class="hdrSubLnk">نامه‌سرای</a>
                                                </div>
                                            </li>
                                            <li class="hdrMnuLi position-relative">
                                                <div class="hdrMnuLiBx">
                                                    <a href="#" class="hdrSubLnk">
                                                        حساب کاربری
                                                        @auth('web')
                                                        {{ auth()->user()->phone }}
                                                        @endauth
                                                    </a>
                                                </div>
                                            </li>
                                        </ul>
                                        <a
                                            href="#"
                                            class="minCrtLink openSide topSrchLnk transitionCls"
                                        >
                                            <span class="icon-Cart"></span>
                                        </a>
                                    </div>
                                </div>
                                <div class="menuVector"></div>
                            </div>
                            <div class="topSrchBx">
                                <div class="input-group">
                                    <span class="input-group-text">
                                        <button class="searchBtn btn transitionCls">
                                            <span class="icon-Search"></span>
                                        </button>
                                    </span>
                                    <input
                                        type="text"
                                        class="form-control searchInput"
                                        placeholder="تجهیزات و مواد اولیه آشپزی خاص"
                                    />
                                    <span class="input-group-text">
                                        <button class="nextBtn btn transitionCls">
                                            <span class="icon-Next"></span>
                                        </button>
                                    </span>
                                </div>
                                <div class="afterBox"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="sideMenu transitionCls">
        <span class="icon-Remove closeSide"></span>
        <div class="sideMnuBx">
            <a href="#" class="sideItem transitionCls">
                <div>
                    <strong>ظروف BergHOFF سری لئو</strong>
                    <p>x۲</p>
                </div>
                <img src="asset/img/rec.png" alt="img" />
            </a>
            <a href="#" class="sideItem transitionCls">
                <div>
                    <strong>ظروف BergHOFF سری لئو</strong>
                    <p>x۲</p>
                </div>
                <img src="asset/img/rec.png" alt="img" />
            </a>
            <a href="#" class="sideItem transitionCls">
                <div>
                    <strong>ظروف BergHOFF سری لئو</strong>
                    <p>x۲</p>
                </div>
                <img src="asset/img/rec.png" alt="img" />
            </a>
            <a href="#" class="sideItem transitionCls">
                <div>
                    <strong>ظروف BergHOFF سری لئو</strong>
                    <p>x۲</p>
                </div>
                <img src="asset/img/rec.png" alt="img" />
            </a>
            <div class="subtotal">جمع جزء: ۸۰,۰۰۰,۰۰۰ تومان</div>
            <div class="sideBtns">
                <a href="#" class="cartBtn transitionCls"> سبد خرید </a>
                <a href="#" class="settlmntBtn transitionCls"> تسویه حساب </a>
            </div>
        </div>
    </div>

    <section class="topBnnrSec">
        <div class="topBnnrSwpr">
            <div class="swiper">
                <div class="swiper-wrapper">
                    @foreach($banners as $banner)
                        <div class="swiper-slide">
                            <a href="{{ $banner->url }}" class="topBnrCrd position-relative transitionCls">
                                <div class="image_parent">
                                    <div class="image_inner">
                                        <img src="{{ $banner->getFirstMediaUrl('image') }}" alt="img" />
                                    </div>
                                </div>
                                <div class="topBnrTxt">
                                    <div class="adTag">AD</div>
                                    <img src="{{ $banner->getFirstMediaUrl('brand') }}" alt="brand" />
                                    <h2>{{ $banner->title }}</h2>
                                </div>
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>

    <section class="newestSec position-relative">
        <img src="{{ asset('arses/asset/img/vector02.png') }}" class="newestVctr" alt="img" />
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h2 class="arsesTitl position-relative">
                        جدید ترین‌های سرای آرسس
                    </h2>
                </div>
            </div>
        </div>
        <div class="swprContainr">
            <div class="newestSwper newestSwpr1">
                <div class="swiper">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide">
                            <a href="#" class="newestCrd position-relative transitionCls">
                                <div class="cardImg transitionCls">
                                    <img src="asset/img/img04.jpg" class="" alt="img" />
                                </div>
                                <div class="cardBdy">
                                    <img src="asset/img/Brands/brand01.png" alt="brand" />
                                    <h2>ماهیتابه سری فرایینگ پن ست</h2>
                                    <div class="line transitionCls"></div>
                                    <p>
                                        قابلمه برگهوف سری اسسرتیالز جزو با کیفیت‌ترین و
                                        مرغوب‌ترین قابلمه‌ها جهت پختن تکه گوشت استاکه.
                                    </p>
                                </div>
                            </a>
                        </div>
                        <div class="swiper-slide">
                            <a href="#" class="newestCrd position-relative transitionCls">
                                <div class="cardImg transitionCls">
                                    <img src="asset/img/img05.jpg" class="" alt="img" />
                                </div>
                                <div class="cardBdy">
                                    <img src="asset/img/Brands/brand01.png" alt="brand" />
                                    <h2>ماهیتابه سری فرایینگ پن ست</h2>
                                    <div class="line transitionCls"></div>
                                    <p>
                                        قابلمه برگهوف سری اسسرتیالز جزو با کیفیت‌ترین و
                                        مرغوب‌ترین قابلمه‌ها جهت پختن تکه گوشت استاکه.
                                    </p>
                                </div>
                            </a>
                        </div>
                        <div class="swiper-slide">
                            <a href="#" class="newestCrd position-relative transitionCls">
                                <div class="cardImg transitionCls">
                                    <img src="asset/img/img06.jpg" class="" alt="img" />
                                </div>
                                <div class="cardBdy">
                                    <img src="asset/img/Brands/brand01.png" alt="brand" />
                                    <h2>ماهیتابه سری فرایینگ پن ست</h2>
                                    <div class="line transitionCls"></div>
                                    <p>
                                        قابلمه برگهوف سری اسسرتیالز جزو با کیفیت‌ترین و
                                        مرغوب‌ترین قابلمه‌ها جهت پختن تکه گوشت استاکه.
                                    </p>
                                </div>
                            </a>
                        </div>
                        <div class="swiper-slide">
                            <a href="#" class="newestCrd position-relative transitionCls">
                                <div class="cardImg transitionCls">
                                    <img src="asset/img/img04.jpg" class="" alt="img" />
                                </div>
                                <div class="cardBdy">
                                    <img src="asset/img/Brands/brand01.png" alt="brand" />
                                    <h2>ماهیتابه سری فرایینگ پن ست</h2>
                                    <div class="line transitionCls"></div>
                                    <p>
                                        قابلمه برگهوف سری اسسرتیالز جزو با کیفیت‌ترین و
                                        مرغوب‌ترین قابلمه‌ها جهت پختن تکه گوشت استاکه.
                                    </p>
                                </div>
                            </a>
                        </div>
                        <div class="swiper-slide">
                            <a href="#" class="newestCrd position-relative transitionCls">
                                <div class="cardImg transitionCls">
                                    <img src="asset/img/img05.jpg" class="" alt="img" />
                                </div>
                                <div class="cardBdy">
                                    <img src="asset/img/Brands/brand01.png" alt="brand" />
                                    <h2>ماهیتابه سری فرایینگ پن ست</h2>
                                    <div class="line transitionCls"></div>
                                    <p>
                                        قابلمه برگهوف سری اسسرتیالز جزو با کیفیت‌ترین و
                                        مرغوب‌ترین قابلمه‌ها جهت پختن تکه گوشت استاکه.
                                    </p>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="swiper-button-next"></div>
                    <div class="swiper-button-prev"></div>
                </div>
            </div>
        </div>
    </section>

    <section class="newestSec position-relative">
        <img src="{{ asset('arses/asset/img/vector02.png') }}" class="newestVctr" alt="img" />
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h2 class="arsesTitl position-relative">گنجینه شف‌شو</h2>
                </div>
            </div>
        </div>

        <div class="swprContainr">
            <div class="newestSwper newestSwpr2">
                <div class="swiper">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide">
                            <a href="#" class="newestCrd position-relative transitionCls">
                                <div class="cardImg transitionCls">
                                    <img src="asset/img/img04.jpg" class="" alt="img" />
                                </div>
                                <div class="cardBdy">
                                    <img src="asset/img/Brands/brand01.png" alt="brand" />
                                    <h2>ماهیتابه سری فرایینگ پن ست</h2>
                                    <div class="line transitionCls"></div>
                                    <p>
                                        قابلمه برگهوف سری اسسرتیالز جزو با کیفیت‌ترین و
                                        مرغوب‌ترین قابلمه‌ها جهت پختن تکه گوشت استاکه.
                                    </p>
                                </div>
                            </a>
                        </div>
                        <div class="swiper-slide">
                            <a href="#" class="newestCrd position-relative transitionCls">
                                <div class="cardImg transitionCls">
                                    <img src="asset/img/img05.jpg" class="" alt="img" />
                                </div>
                                <div class="cardBdy">
                                    <img src="asset/img/Brands/brand01.png" alt="brand" />
                                    <h2>ماهیتابه سری فرایینگ پن ست</h2>
                                    <div class="line transitionCls"></div>
                                    <p>
                                        قابلمه برگهوف سری اسسرتیالز جزو با کیفیت‌ترین و
                                        مرغوب‌ترین قابلمه‌ها جهت پختن تکه گوشت استاکه.
                                    </p>
                                </div>
                            </a>
                        </div>
                        <div class="swiper-slide">
                            <a href="#" class="newestCrd position-relative transitionCls">
                                <div class="cardImg transitionCls">
                                    <img src="asset/img/img06.jpg" class="" alt="img" />
                                </div>
                                <div class="cardBdy">
                                    <img src="asset/img/Brands/brand01.png" alt="brand" />
                                    <h2>ماهیتابه سری فرایینگ پن ست</h2>
                                    <div class="line transitionCls"></div>
                                    <p>
                                        قابلمه برگهوف سری اسسرتیالز جزو با کیفیت‌ترین و
                                        مرغوب‌ترین قابلمه‌ها جهت پختن تکه گوشت استاکه.
                                    </p>
                                </div>
                            </a>
                        </div>
                        <div class="swiper-slide">
                            <a href="#" class="newestCrd position-relative transitionCls">
                                <div class="cardImg transitionCls">
                                    <img src="asset/img/img04.jpg" class="" alt="img" />
                                </div>
                                <div class="cardBdy">
                                    <img src="asset/img/Brands/brand01.png" alt="brand" />
                                    <h2>ماهیتابه سری فرایینگ پن ست</h2>
                                    <div class="line transitionCls"></div>
                                    <p>
                                        قابلمه برگهوف سری اسسرتیالز جزو با کیفیت‌ترین و
                                        مرغوب‌ترین قابلمه‌ها جهت پختن تکه گوشت استاکه.
                                    </p>
                                </div>
                            </a>
                        </div>
                        <div class="swiper-slide">
                            <a href="#" class="newestCrd position-relative transitionCls">
                                <div class="cardImg transitionCls">
                                    <img src="asset/img/img05.jpg" class="" alt="img" />
                                </div>
                                <div class="cardBdy">
                                    <img src="asset/img/Brands/brand01.png" alt="brand" />
                                    <h2>ماهیتابه سری فرایینگ پن ست</h2>
                                    <div class="line transitionCls"></div>
                                    <p>
                                        قابلمه برگهوف سری اسسرتیالز جزو با کیفیت‌ترین و
                                        مرغوب‌ترین قابلمه‌ها جهت پختن تکه گوشت استاکه.
                                    </p>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="swiper-button-next"></div>
                    <div class="swiper-button-prev"></div>
                </div>
            </div>
        </div>
    </section>

    <section class="newestSec position-relative">
        <img src="asset/img/vector02.png" class="newestVctr" alt="img" />
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h2 class="arsesTitl position-relative">تازه‌ترین مواد اولیه</h2>
                </div>
            </div>
        </div>
        <div class="swprContainr">
            <div class="newestSwper newestSwpr3">
                <div class="swiper">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide">
                            <a href="#" class="newestCrd position-relative transitionCls">
                                <div class="cardImg transitionCls">
                                    <img src="asset/img/img04.jpg" class="" alt="img" />
                                </div>
                                <div class="cardBdy">
                                    <img src="asset/img/Brands/brand01.png" alt="brand" />
                                    <h2>ماهیتابه سری فرایینگ پن ست</h2>
                                    <div class="line transitionCls"></div>
                                    <p>
                                        قابلمه برگهوف سری اسسرتیالز جزو با کیفیت‌ترین و
                                        مرغوب‌ترین قابلمه‌ها جهت پختن تکه گوشت استاکه.
                                    </p>
                                </div>
                            </a>
                        </div>
                        <div class="swiper-slide">
                            <a href="#" class="newestCrd position-relative transitionCls">
                                <div class="cardImg transitionCls">
                                    <img src="asset/img/img05.jpg" class="" alt="img" />
                                </div>
                                <div class="cardBdy">
                                    <img src="asset/img/Brands/brand01.png" alt="brand" />
                                    <h2>ماهیتابه سری فرایینگ پن ست</h2>
                                    <div class="line transitionCls"></div>
                                    <p>
                                        قابلمه برگهوف سری اسسرتیالز جزو با کیفیت‌ترین و
                                        مرغوب‌ترین قابلمه‌ها جهت پختن تکه گوشت استاکه.
                                    </p>
                                </div>
                            </a>
                        </div>
                        <div class="swiper-slide">
                            <a href="#" class="newestCrd position-relative transitionCls">
                                <div class="cardImg transitionCls">
                                    <img src="asset/img/img06.jpg" class="" alt="img" />
                                </div>
                                <div class="cardBdy">
                                    <img src="asset/img/Brands/brand01.png" alt="brand" />
                                    <h2>ماهیتابه سری فرایینگ پن ست</h2>
                                    <div class="line transitionCls"></div>
                                    <p>
                                        قابلمه برگهوف سری اسسرتیالز جزو با کیفیت‌ترین و
                                        مرغوب‌ترین قابلمه‌ها جهت پختن تکه گوشت استاکه.
                                    </p>
                                </div>
                            </a>
                        </div>
                        <div class="swiper-slide">
                            <a href="#" class="newestCrd position-relative transitionCls">
                                <div class="cardImg transitionCls">
                                    <img src="asset/img/img04.jpg" class="" alt="img" />
                                </div>
                                <div class="cardBdy">
                                    <img src="asset/img/Brands/brand01.png" alt="brand" />
                                    <h2>ماهیتابه سری فرایینگ پن ست</h2>
                                    <div class="line transitionCls"></div>
                                    <p>
                                        قابلمه برگهوف سری اسسرتیالز جزو با کیفیت‌ترین و
                                        مرغوب‌ترین قابلمه‌ها جهت پختن تکه گوشت استاکه.
                                    </p>
                                </div>
                            </a>
                        </div>
                        <div class="swiper-slide">
                            <a href="#" class="newestCrd position-relative transitionCls">
                                <div class="cardImg transitionCls">
                                    <img src="asset/img/img05.jpg" class="" alt="img" />
                                </div>
                                <div class="cardBdy">
                                    <img src="asset/img/Brands/brand01.png" alt="brand" />
                                    <h2>ماهیتابه سری فرایینگ پن ست</h2>
                                    <div class="line transitionCls"></div>
                                    <p>
                                        قابلمه برگهوف سری اسسرتیالز جزو با کیفیت‌ترین و
                                        مرغوب‌ترین قابلمه‌ها جهت پختن تکه گوشت استاکه.
                                    </p>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="swiper-button-next"></div>
                    <div class="swiper-button-prev"></div>
                </div>
            </div>
        </div>
    </section>

    <section class="catgorySec position-relative">
        <img src="{{ asset('arses/asset/img/vector01.png') }}" class="ctgryVector" alt="img" />
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h2 class="arsesTitl position-relative">دسته بندی‌ها</h2>
                    <div class="catSecList position-relative">
                        <a href="#" class="catgryCard transitionCls">
                            <p>تجهیزات آشپزی</p>
                            <span class="icon-Next"></span>
                        </a>
                        <a href="#" class="catgryCard transitionCls">
                            <p>تجهیزات قنادی/نانوایی</p>
                            <span class="icon-Next"></span>
                        </a>
                        <a href="#" class="catgryCard transitionCls">
                            <p>تجهیزات باریستایی</p>
                            <span class="icon-Next"></span>
                        </a>
                        <a href="#" class="catgryCard transitionCls">
                            <p>مواد اولیه آشپزی</p>
                            <span class="icon-Next"></span>
                        </a>
                        <a href="#" class="catgryCard transitionCls">
                            <p>مواد اولیه قنادی/نانوایی</p>
                            <span class="icon-Next"></span>
                        </a>
                        <a href="#" class="catgryCard transitionCls">
                            <p>مواد اولیه باریستایی</p>
                            <span class="icon-Next"></span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

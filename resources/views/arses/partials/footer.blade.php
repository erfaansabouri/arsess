<footer class="position-relative">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="footerRow">
                    <div class="footerMenu">
                        <a href="{{ route('home') }}" class="d-block transitionCls"> سرسرای </a>
                        <a href="{{ route('product.index') }}" class="d-block transitionCls"> محصولات </a>
                        <a href="{{ route('about-us.show') }}" class="d-block transitionCls"> درباره ما </a>
                        <a href="{{ route('contact-us.show') }}" class="d-block transitionCls"> تماس با ما </a>
                        <a href="{{ route('blog-posts.index') }}" class="d-block transitionCls"> نامه‌سرای </a>
                        <a href="{{ route('my-profile.show') }}" class="d-block transitionCls"> حساب کاربری </a>
                    </div>
                    <div class="footerLeft">
                        <a href="#" class="d-block footerLogo">
                            <img src="{{ asset('arses/asset/img/footer-logo.svg') }}" alt="logo" />
                        </a>
                   {{--     <a href="#" class="d-block foterNamad">
                            <img src="{{ asset('arses/asset/img/namad.jpg') }}" alt="img" />
                        </a>--}}
                        <a class="d-block foterNamad" referrerpolicy='origin' target='_blank' href='https://trustseal.enamad.ir/?id=614896&Code=bOcg7aCwsHZqPQENmkQgJerk8HNWBJME'><img referrerpolicy='origin' src='https://trustseal.enamad.ir/logo.aspx?id=614896&Code=bOcg7aCwsHZqPQENmkQgJerk8HNWBJME' alt='' style='cursor:pointer' code='bOcg7aCwsHZqPQENmkQgJerk8HNWBJME'></a>
                        <div class="copyright">
                            تمام حقوق متعلق به <a href="{{ route('home') }}">سرای آرسس</a> است.
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>

@php use App\Services\CartService; @endphp
@php use App\Models\ProductCategory; @endphp
<div class="sideMenu transitionCls">
    <span class="icon-Remove closeSide"></span>
    <div class="sideMnuBx">
        @foreach(CartService::getProducts() as $cart_item)
            <a href="{{ route('product.show', $cart_item['product']->id) }}" class="sideItem transitionCls">
                <div>
                    <strong>{{ $cart_item['product']->title }}</strong>
                    <p>x{{ $cart_item['quantity'] }}</p>
                </div>
                <img src="{{ $cart_item['product']->getFirstMediaUrl('image') }}" alt="img"/>
            </a>
        @endforeach
        <div class="subtotal">جمع کل: {{ number_format(CartService::getTotalPrice()) }} تومان</div>
        <div class="sideBtns">
            <a href="{{ route('cart.show') }}" class="cartBtn transitionCls"> سبد خرید</a>
            <a href="#" class="settlmntBtn transitionCls"> تسویه حساب</a>
        </div>
    </div>
</div>

<section class="headerSec position-relative">
    <div class="hdrCntnt">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="topSerch">
                        <div class="cartLink openSide topSrchLnk transitionCls">
                            <i class="numberTag position-absolute">{{ CartService::getTotalQuantity() }}</i>
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
                                                <a href="{{ route('product.index') }}" class="hdrSubLnk">محصولات</a>
                                                <span class="icon-Next openSub transitionCls"></span>
                                            </div>

                                            <ul class="hdrSubUl">
                                                @foreach(ProductCategory::query()->parent()->get() as $pc)
                                                    <li class="hdrSubLi prdctHasSub">
                                                        <div class="prdctLnkBx">
                                                            <a href="{{ route('product-categories.show', ['slug' => $pc->slug]) }}">{{ $pc->title }}</a>
                                                            <span class="icon-Next opnPrdctSub transitionCls"></span>
                                                        </div>
                                                        <div class="prdctSubBx">
                                                            @foreach($pc->children as $child)
                                                                <a href="{{ route('product-categories.show', ['slug' => $child->slug]) }}">{{ $child->title }}</a>
                                                            @endforeach
                                                        </div>
                                                    </li>
                                                @endforeach
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
                                                <a href="{{ route('my-profile.show') }}" class="hdrSubLnk">حساب کاربری</a>
                                            </div>
                                        </li>
                                    </ul>
                                    <a href="{{ route('cart.show') }}" class="minCrtLink openSide topSrchLnk transitionCls">
                                        <i class="numberTag position-absolute">{{ CartService::getTotalQuantity() }}</i>
                                        <span class="icon-Cart"></span>
                                    </a>
                                </div>
                            </div>
                            <div class="menuVector"></div>
                        </div>
                        <form class="topSrchBx" action="{{ route('product.search') }}" method="GET">
                            <div class="input-group">
                                <span class="input-group-text">
                                    <button class="searchBtn btn transitionCls">
                                        <span class="icon-Search"></span>
                                    </button>
                                </span>
                                <input name="search" type="text" class="form-control searchInput" placeholder="تجهیزات و مواد اولیه آشپزی خاص">
                                <span class="input-group-text">
                                    <button class="nextBtn btn transitionCls">
                                        <span class="icon-Next"></span>
                                    </button>
                                </span>
                            </div>
                            <div class="afterBox"></div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

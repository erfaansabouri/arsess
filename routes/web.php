<?php

use App\Http\Controllers\Arses\AboutUsController;
use App\Http\Controllers\Arses\AuthController;
use App\Http\Controllers\Arses\BlogPostController;
use App\Http\Controllers\Arses\CartController;
use App\Http\Controllers\Arses\CheckoutController;
use App\Http\Controllers\Arses\ContactUsController;
use App\Http\Controllers\Arses\HomeController;
use App\Http\Controllers\Arses\MyProfileController;
use App\Http\Controllers\Arses\ProductCategoryController;
use App\Http\Controllers\Arses\ProductController;
use Illuminate\Support\Facades\Route;

Route::prefix('blog-posts')->group(function (){
    Route::get('/', [ BlogPostController::class, 'index' ])->name('blog-posts.index');
    Route::get('/{slug}', [ BlogPostController::class, 'show' ])->name('blog-posts.show');
});


Route::prefix('about-us')->group(function (){
    Route::get('/', [ AboutUscontroller::class, 'show' ])->name('about-us.show');
});

Route::prefix('contact-us')->group(function (){
    Route::get('/', [ ContactUsController::class, 'show' ])->name('contact-us.show');
});

Route::prefix('auth')->group(function (){
    Route::get('/get-sms', [ AuthController::class, 'getSmsForm' ])->name('auth.get-sms-form');
    Route::post('/get-sms', [ AuthController::class, 'getSms' ])->name('auth.get-sms');
    Route::get('/verify-code', [ AuthController::class, 'verifyCodeForm' ])->name('auth.verify-code-form');
    Route::post('/verify-code', [ AuthController::class, 'verifyCode' ])->name('auth.verify-code');
});

Route::middleware([])->group(function (){
    Route::get('/', [ HomeController::class, 'index' ])->name('home');
});

Route::middleware([])->prefix('products')->group(function (){
    Route::get('/', [ ProductController::class, 'index' ])->name('product.index');
    Route::get('/search', [ ProductController::class, 'search' ])->name('product.search');
    Route::get('/{slug}', [ ProductController::class, 'show' ])->name('product.show');
});

Route::middleware([])->prefix('product-categories')->group(function (){
    Route::get('/{slug}', [ ProductCategoryController::class, 'show' ])->name('product-categories.show');
});

Route::middleware([])->prefix('cart')->group(function (){
    Route::get('/', [ CartController::class, 'show' ])->name('cart.show');
    Route::get('/remove/{product_id}', [ CartController::class, 'remove' ])->name('cart.remove');
    Route::get('/add/{product_id}', [ CartController::class, 'add' ])->name('cart.add');
});

Route::middleware(['auth:web'])->prefix('checkout')->group(function (){
    Route::get('/show', [ CheckoutController::class, 'show' ])->name('checkout.show');
    Route::any('/check-coupon', [ CheckoutController::class, 'checkCoupon' ])->name('checkout.check-coupon');
    Route::post('/do-checkout', [ CheckoutController::class, 'doCheckout' ])->name('checkout.do-checkout');
    Route::any('/verify', [ CheckoutController::class, 'verify' ])->name('checkout.verify')->withoutMiddleware(['auth:web']);
});

Route::middleware(['auth:web'])->prefix('my-profile')->group(function (){
    Route::get('/', [ MyProfileController::class, 'show' ])->name('my-profile.show');
    Route::any('/update', [ MyProfileController::class, 'update' ])->name('my-profile.update');
    Route::any('/logout', [ MyProfileController::class, 'logout' ])->name('my-profile.logout');
});

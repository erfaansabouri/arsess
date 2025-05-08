<?php

use App\Http\Controllers\Arses\AboutUsController;
use App\Http\Controllers\Arses\AuthController;
use App\Http\Controllers\Arses\BlogPostController;
use App\Http\Controllers\Arses\ContactUsController;
use App\Http\Controllers\Arses\HomeController;
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
    Route::get('/{slug}', [ ProductController::class, 'show' ])->name('product.show');
});

Route::middleware([])->prefix('product-categories')->group(function (){
    Route::get('/{slug}', [ ProductCategoryController::class, 'show' ])->name('product-categories.show');
});

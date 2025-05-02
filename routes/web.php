<?php

use App\Http\Controllers\Arses\AboutUsController;
use App\Http\Controllers\Arses\BlogPostController;
use App\Http\Controllers\Arses\ContactUsController;
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

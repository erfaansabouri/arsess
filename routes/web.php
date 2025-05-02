<?php

use App\Http\Controllers\Arses\BlogPostController;
use Illuminate\Support\Facades\Route;

Route::prefix('blog-posts')->group(function (){
    Route::get('/', [ BlogPostController::class, 'index' ])->name('blog-posts.index');
});

<?php

namespace App\Http\Controllers\Arses;

use App\Http\Controllers\Controller;
use App\Models\BlogPost;
use App\Models\BlogPostCategory;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class BlogPostController extends Controller {
    public function index ( Request $request ) {
        $category_id = $request->get('category_id');
        $category_title = $request->get('category_title');
        $hashtag_title = $request->get('hashtag_title');
        if ($category_title){
            $category_id = BlogPostCategory::query()
                ->where('title', $category_title)
                ->orWhere('slug', $category_title)
                ->first()?->id;
            dd($category_id);
        }
        $blog_posts = BlogPost::query()
                              ->latest()
                              ->when($category_id , function ( Builder $query ) {
                                  $query->whereHas('categories' , function ( Builder $query ) {
                                      $query->where('blog_post_categories.id' , request('category_id'));
                                  });
                              })
                              ->when($category_title , function ( Builder $query ) {
                                  $query->whereHas('categories' , function ( Builder $query ) {
                                      $query->where('blog_post_categories.title' , request('category_title'))
                                            ->orWhere('blog_post_categories.slug' , request('category_title'));
                                  });
                              })
                              ->when($hashtag_title , function ( Builder $query ) {
                                  $query->whereHas('hashtags' , function ( Builder $query ) {
                                      $query->where('blog_post_hashtags.title' , request('hashtag_title'))
                                            ->orWhere('blog_post_hashtags.slug' , request('hashtag_title'));
                                  });
                              })
                              ->paginate(5);
        $blog_post_categories = BlogPostCategory::query()
                                                ->latest()
                                                ->take(4)
                                                ->get();

        return view('arses.blog-posts.index' , compact('blog_posts' , 'blog_post_categories' , 'category_id'));
    }

    public function show ( $slug ) {
        $blog_post = BlogPost::query()
                             ->where('slug' , $slug)
                             ->firstOrFail();

        return view('arses.blog-posts.show' , compact('blog_post'));
    }
}

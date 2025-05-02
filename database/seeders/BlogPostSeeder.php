<?php

namespace Database\Seeders;

use App\Models\BlogPost;
use App\Models\BlogPostCategory;
use App\Models\BlogPostHashtag;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BlogPostSeeder extends Seeder {
    /**
     * Run the database seeds.
     */
    public function run (): void {
        BlogPostHashtag::factory()
                       ->count(30)
                       ->create();
        BlogPostCategory::factory()
                        ->count(5)
                        ->create();
        BlogPost::factory()
                ->has(BlogPostHashtag::factory()
                                     ->count(3) , 'hashtags')
                ->has(BlogPostCategory::factory()
                                      ->count(3) , 'categories')
                ->count(30)
                ->create();
    }
}

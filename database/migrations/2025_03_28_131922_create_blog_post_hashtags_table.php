<?php

use App\Models\BlogPostHashtag;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up (): void {
        Schema::create('blog_post_hashtags' , function ( Blueprint $table ) {
            $table->id();
            $table->string('title');
            $table->timestamps();
        });
        Schema::create('blog_post_hashtag_mapping' , function ( Blueprint $table ) {
            $table->id();
            $table->unsignedBigInteger('blog_post_id')
                  ->index();
            $table->unsignedBigInteger('blog_post_hashtag_id')
                  ->index();
            $table->timestamps();
        });
        $items = [
            'جدید' ,
            'تازه' ,
            'مهم' ,
        ];
        foreach ( $items as $item ) {
            BlogPostHashtag::query()
                                       ->firstOrCreate([
                                                           'title' => $item ,
                                                       ]);
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down (): void {
        Schema::dropIfExists('blog_post_hashtags');
    }
};

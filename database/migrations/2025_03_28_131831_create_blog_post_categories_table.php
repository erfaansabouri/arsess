<?php

use App\Models\BlogPostCategory;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up (): void {
        Schema::create('blog_post_categories' , function ( Blueprint $table ) {
            $table->id();
            $table->string('title')
                  ->nullable();
            $table->timestamps();
        });
        Schema::create('blog_post_category_mapping' , function ( Blueprint $table ) {
            $table->id();
            $table->unsignedBigInteger('blog_post_id')
                  ->index();
            $table->unsignedBigInteger('blog_post_category_id')
                  ->index();
            $table->timestamps();
        });
        $items = [
            'آموزشی' ,
            'معرفی' ,
            'تکنولوژی' ,
        ];
        foreach ( $items as $item ) {
            BlogPostCategory::query()
                                        ->firstOrCreate([
                                                     'title' => $item ,
                                                 ]);
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down (): void {
        Schema::dropIfExists('blog_post_categories');
    }
};

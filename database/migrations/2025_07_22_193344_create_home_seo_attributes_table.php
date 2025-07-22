<?php

use App\Models\HomeSeoAttribute;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up (): void {
        Schema::create('home_seo_attributes' , function ( Blueprint $table ) {
            $table->id();
            //عنوان سئو، متادسکریپشن، تصویر سئو، کلمه کلیدی
            $table->text('title')
                  ->nullable();
            $table->text('meta_description')
                  ->nullable();
            $table->text('keywords')
                  ->nullable();
            $table->timestamps();
        });
        HomeSeoAttribute::query()
                                    ->firstOrCreate([]);
    }

    /**
     * Reverse the migrations.
     */
    public function down (): void {
        Schema::dropIfExists('home_seo_attributes');
    }
};

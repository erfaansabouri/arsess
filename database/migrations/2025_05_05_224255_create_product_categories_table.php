<?php

use App\Models\ProductCategory;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up (): void {
        Schema::create('product_categories' , function ( Blueprint $table ) {
            $table->id();
            $table->string('title')
                  ->nullable();
            $table->timestamps();
        });
        Schema::create('product_category_mapping' , function ( Blueprint $table ) {
            $table->id();
            $table->unsignedBigInteger('product_id')
                  ->index();
            $table->unsignedBigInteger('product_category_id')
                  ->index();
            $table->timestamps();
        });
        $items = [
            'تجهیزات آشپزی' ,
            'تجهیزات قنادی/نانوایی' ,
            'تجهیزات باریستایی' ,
            'مواد اولیه آشپزی' ,
            'تستی 1' ,
            'تستی 2' ,
        ];
        foreach ( $items as $item ) {
            ProductCategory::query()
                                       ->firstOrCreate([
                                                           'title' => $item ,
                                                       ]);
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down (): void {
        Schema::dropIfExists('product_categories');
    }
};

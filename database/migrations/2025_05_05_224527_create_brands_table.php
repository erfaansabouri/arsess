<?php

use App\Models\Brand;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up (): void {
        Schema::create('brands' , function ( Blueprint $table ) {
            $table->id();
            $table->string('title')
                  ->nullable();
            $table->timestamps();
        });
        Brand::query()
                         ->create([
                                      'title' => 'BergHoff',
                                  ])
                         ->addMediaFromUrl(asset('seed-storage/brand01.png'))
                         ->toMediaCollection('image');
    }

    /**
     * Reverse the migrations.
     */
    public function down (): void {
        Schema::dropIfExists('brands');
    }
};

<?php

use App\Models\ContactUs;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up (): void {
        Schema::create('contact_us' , function ( Blueprint $table ) {
            $table->id();
            $table->string('phone_1')
                  ->nullable();
            $table->string('phone_2')
                  ->nullable();
            $table->text('address')
                  ->nullable();
            $table->text('openstreet_url')
                  ->nullable();
            $table->timestamps();
        });
        ContactUs::query()
                             ->create([
                                          'phone_1' => '+98 912 345 6789' ,
                                          'phone_2' => '+98 912 345 6789' ,
                                          'address' => 'Tehran, Iran' ,
                                          'openstreet_url' => 'https://www.openstreetmap.org/export/embed.html?bbox=50.79322814941407%2C35.54172500018384%2C51.55952453613282%2C35.855109217391785&amp;layer=mapnik',
                                      ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down (): void {
        Schema::dropIfExists('contact_us');
    }
};

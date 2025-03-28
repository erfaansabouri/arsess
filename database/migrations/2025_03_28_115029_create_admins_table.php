<?php

use App\Models\Admin;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up (): void {
        Schema::create('admins' , function ( Blueprint $table ) {
            $table->id();
            $table->string('name')
                  ->nullable();
            $table->string('email')
                  ->unique();
            $table->string('remember_token')
                  ->nullable();
            $table->string('password');
            $table->timestamps();
        });
        // Create Admin
        Admin::query()
                         ->create([
                                      'name' => 'Admin' ,
                                      'email' => 'admin@mail.com' ,
                                      'password' => bcrypt('1') ,
                                  ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down (): void {
        Schema::dropIfExists('admins');
    }
};

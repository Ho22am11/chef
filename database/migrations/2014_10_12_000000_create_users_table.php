<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name' , 25); 
            $table->string('phone' , 15);
            $table->string('email' ,100)->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password' , 64);
            $table->decimal('latitude' , 10 , 8);
            $table->decimal('longitude' , 11 , 8);
            $table->string('img')->nullable();
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};

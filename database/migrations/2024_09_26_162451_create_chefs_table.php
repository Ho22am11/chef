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
        Schema::disableForeignKeyConstraints();

        Schema::create('chefs', function (Blueprint $table) {
            $table->id();
            $table->string('first_name', 15);
            $table->string('last_name', 15);
            $table->string('email', 100)->unique();
            $table->string('password', 64);
            $table->string('whats_app', 15);
            $table->string('phone', 15);
            $table->boolean('gender')->nullable();
            $table->timestamps();
        });

        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('chefs');
    }
};

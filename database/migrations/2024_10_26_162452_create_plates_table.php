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

        Schema::create('plates', function (Blueprint $table) {
            $table->id();
            $table->string('name', 55);
            $table->string('category', 20);
            $table->foreignId('cuisine_id')->references('id')->on('cuisines');
            $table->foreignId('chef_id')->references('id')->on('chefs');
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('plates');
    }
};

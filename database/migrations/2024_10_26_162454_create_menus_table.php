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
        
        Schema::create('menus', function (Blueprint $table) {
            $table->id();
            $table->foreignId('chef_id')->references('id')->on('chefs');
            $table->string('name', 20);
            $table->foreignId('cuisine_id')->references('id')->on('cuisines');
            $table->tinyInteger('min')->default(0);
            $table->tinyInteger('max')->default(0);
            $table->decimal('average_price_two_guests', 5, 2);
            $table->decimal('average_price_six_guests', 5, 2);
            $table->decimal('average_price_twenty_guests', 5, 2);
      

        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('menus');
    }
};

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

        Schema::create('offers', function (Blueprint $table) {
            $table->id();
            $table->foreignId('chef_id')->references('id')->on('chefs');
            $table->foreignId('order_id')->references('id')->on('orders');
            $table->enum('state', ["pending","accepted","rejected"]);
            $table->foreignId('menu_id')->references('id')->on('chef_menus');
            $table->decimal('price', 5, 2);
            // datetime
        });

        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('offers');
    }
};

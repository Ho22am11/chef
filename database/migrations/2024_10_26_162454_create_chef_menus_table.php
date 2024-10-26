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
        
        Schema::create('chef_menus', function (Blueprint $table) {
            $table->id();
            $table->foreignId('chef_id')->references('id')->on('chefs');
            $table->string('name', 20);
            $table->string('cuisine', 20);
            $table->tinyInteger('min')->default(0);
            $table->tinyInteger('max')->default(0);
            $table->decimal('average_price', 5, 2);
      

        });

        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('chef_menus');
    }
};

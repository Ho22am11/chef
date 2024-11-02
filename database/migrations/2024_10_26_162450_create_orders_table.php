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

        Schema::create('orders', function (Blueprint $table) {
            $table->id();
        
            $table->foreignId('service_id')->constrained();
            $table->foreignId('cuisine_id')->references('id')->on('cuisines');
            $table->foreignId('chef_id')->nullable()->references('id')->on('chefs')->default(null);
            $table->foreignId('user_id')->nullable()->references('id')->on('users');
            $table->foreignId('package_id')->references('id')->on('packages'); 
            $table->tinyInteger('adult')->nullable()->default(0);
            $table->tinyInteger('teen')->nullable()->default(0);
            $table->tinyInteger('children')->nullable()->default(0);
            $table->enum('meal', ["breakfast","lunch","dinner"]);
            $table->date('day');
            $table->enum('addition_service', ["waiter","bartender","other"]);
            $table->text('details', 500)->nullable();
            $table->enum('state', ["open","inprocess","accepted","paid","canceled","expired"]);
            $table->decimal('cost', 4, 2)->nullable();
            $table->timestamps();
            $table->softDeletes(); 
            // datetime
        });

        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};

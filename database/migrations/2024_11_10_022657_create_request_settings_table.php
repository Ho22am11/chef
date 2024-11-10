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
        Schema::create('request_settings', function (Blueprint $table) {
            $table->id();
            $table->foreignId('chef_id')->constrained();
            $table->foreignId('package_id')->constrained();
            $table->foreignId('cuisine_id')->constrained();
            $table->integer('people_max');
            $table->integer('people_main');
            $table->decimal('max_price' , 5 , 2 );
            $table->decimal('min_price' , 5 , 2);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('request_settings');
    }
};

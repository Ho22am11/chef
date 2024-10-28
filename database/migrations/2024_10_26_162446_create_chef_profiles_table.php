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

        Schema::create('chef_profiles', function (Blueprint $table) {
            $table->id();
            $table->string('img', 30)->nullable();
            $table->foreignId('chef_id')->references('id')->on('chefs');
            $table->string('bio', 160)->nullable();
            $table->json('language')->nullable();
            $table->text('about', 500)->nullable();
            $table->text('experience', 500)->nullable();
            $table->text('learned_at', 500)->nullable();
            $table->text('tips', 500)->nullable();
            $table->string('web')->nullable();
            $table->string('facebook')->nullable();
            $table->string('instagram')->nullable();
            $table->string('twitter')->nullable();
            $table->string('youtube')->nullable();
            $table->string('linkedin')->nullable();
        });

        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('chef_profiles');
    }
};

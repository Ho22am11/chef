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

        Schema::create('chef_payments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('chef_id')->references('id')->on('chefs');
            $table->char('currency', 3);
            $table->string('bank_name', 30);
            $table->string('account_type', 20);
            $table->string('account_number', 20);
            $table->char('SWIFT', 11)->nullable();
            $table->string('account_branch', 20)->nullable();
            $table->string('IBAN', 34)->nullable();
        });

        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('chef_payments');
    }
};

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
        Schema::create('cart_promocode', function (Blueprint $table) {
            $table->foreignId('promocode_id')->references('id')->on('promocodes')->cascadeOnDelete();
            $table->foreignId('cart_id')->references('id')->on('cart')->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cart_promocode');
    }
};

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
        Schema::create('clothing_item_size', function (Blueprint $table) {
            $table->id();
            $table->foreignId('clothing_item_id')->constrained('clothing_items')->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreignId('size_id')->constrained('sizes')->cascadeOnUpdate()->cascadeOnDelete();
            $table->integer('stock');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('clothing_item_size');
    }
};
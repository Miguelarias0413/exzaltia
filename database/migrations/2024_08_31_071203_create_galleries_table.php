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
        Schema::create('galleries', function (Blueprint $table) {
            $table->id();
            $table->string('front_image');
            $table->string('back_image')->nullable();
            $table->string('first_bonus_image')->nullable();
            $table->string('second_bonus_image')->nullable();
            $table->string('third_bonus_image')->nullable();
            $table->foreignId('clothing_item_id')->constrained('clothing_items')->cascadeOnDelete()->cascadeOnUpdate();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('galleries');
    }
};

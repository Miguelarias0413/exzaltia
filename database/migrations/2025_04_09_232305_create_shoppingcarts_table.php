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
        Schema::create('shoppingcarts', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->foreignId('user_id')->unique()->constrained()->onDelete('cascade');
        });
        Schema::create('clothing_itemsshoppingcarts', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->foreignId('shoppingcart_id')->constrained()->onDelete('cascade');
            $table->foreignId('clothing_item_id')->constrained()->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('shoppingcarts');
        Schema::dropIfExists('clothing_itemsshoppingcarts');

    }
};

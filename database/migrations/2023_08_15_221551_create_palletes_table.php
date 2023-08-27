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
        Schema::create('palletes', function (Blueprint $table) {
            $table->id();
            $table->string('pallete_name');
            $table->string('pallete_image');
            $table->string('pallete_description')->nullable();
            $table->decimal('suggested_price');
            $table->boolean('promotion')->default(false);
            $table->decimal('promotion_price')->default(10.00);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('palletes');
    }
};

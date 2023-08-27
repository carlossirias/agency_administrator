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
        Schema::create('prices_palletes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('agency_id')->references('id')->on('agencies');
            $table->foreignId('pallete_id')->references('id')->on('palletes');
            $table->decimal('added_price')->default(env('ADEDD_PRICE'));
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('prices_palletes');
    }
};

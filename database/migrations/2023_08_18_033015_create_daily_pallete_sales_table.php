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
        Schema::create('daily_pallete_sales', function (Blueprint $table) {
            $table->id();
            $table->foreignId('daily_record_id')->references('id')->on('daily_records');
            $table->foreignId('pallete_id')->references('id')->on('palletes');
            $table->decimal('price');
            $table->integer('quantity_send');
            $table->integer('quantity_sold')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('daily_pallete_sales');
    }
};

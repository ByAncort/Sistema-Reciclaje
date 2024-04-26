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
        Schema::create('recyclable_items', function (Blueprint $table) {
            $table->id();
            $table->float('quantity')->nullable();
            $table->unsignedBigInteger('recycling_type_id')->nullable();
            $table->foreign('recycling_type_id')->references('id')->on('recycling_types')->onDelete('set null');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('recyclable_items');
    }
};

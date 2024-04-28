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
        DB::table('recycling_types')->insert([
            ['name' => 'Plástico'],
            ['name' => 'Papel'],
            ['name' => 'Vidrio'],
            // Agrega más tipos de reciclaje según sea necesario
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('recycling_types');
    }
};

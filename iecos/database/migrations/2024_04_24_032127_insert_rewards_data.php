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
        DB::table('rewards')->insert([
            [
                'nombre' => 'Entrada cine (1 persona)',
                'descripcion' => 'Válida para una película.',
                'cantidad' => 50,
                'points_required' => 200,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nombre' => 'Pase VIP cine (2 personas)',
                'descripcion' => 'Incluye entrada, palomitas y bebidas.',
                'cantidad' => 20,
                'points_required' => 500,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rewards');
    }
};

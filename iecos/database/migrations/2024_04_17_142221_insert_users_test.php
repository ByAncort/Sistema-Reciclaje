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
        for ($i = 1; $i <= 5; $i++) {
            DB::table('users')->insert([
                'role_id' => 2,
                'name' => 'Usuario' . $i,
                'email' => 'usuario' . $i . '@example.com',
                'email_verified_at' => now(),
                'password' => bcrypt('password123'), // Asegúrate de establecer una contraseña segura
                'phone' => '123456789' . $i,
                'location' => 'Ciudad' . $i,
                'about' => 'Acerca de Usuario' . $i,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
    

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
        Schema::dropIfExists('users');
    }
};

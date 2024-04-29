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
       // Insertar un usuario de cada tipo
       $roles = [
        ['id' => 1, 'name' => 'owner'],
        ['id' => 2, 'name' => 'admin'],
        ['id' => 3, 'name' => 'jobs'],
        ['id' => 4, 'name' => 'guest'],
        ['id' => 5, 'name' => 'users'],
    ];

    foreach ($roles as $role) {
        DB::table('users')->insert([
            'role_id' => $role['id'],
            'name' => ucfirst($role['name']), // Puedes cambiar esto si deseas
            'email' => $role['name'] . '@iecos.com',
            'password' => bcrypt('secret'), // Puedes cambiar la contraseña si deseas
            // 'phone' => '1234567890',
            // 'location' => 'New York',
            // 'about' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.',
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
        // Eliminar los usuarios insertados
        DB::table('users')->whereIn('email', ['owner@iecos.com', 'admin@iecos.com', 'jobs@iecos.com', 'guest@iecos.com', 'users@iecos.com'])->delete();
    }
};

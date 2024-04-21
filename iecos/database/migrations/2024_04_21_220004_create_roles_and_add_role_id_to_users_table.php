<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Hash;

class CreateRolesAndAddRoleIdToUsersTable extends Migration
{
    public function up()
    {
        if (!Schema::hasTable('roles')) {
            Schema::create('roles', function (Blueprint $table) {
                
                $table->id();
            $table->string('name');
            $table->timestamps();
            });
        }
     
        // Agregar columna role_id a la tabla de usuarios
        Schema::table('users', function (Blueprint $table) {
            $table->foreignId('role_id')->constrained()->onDelete('cascade');
        });
        // Insertar información de roles
        DB::table('roles')->insert([
            ['name' => 'guest'],
            ['name' => 'user'],
            ['name' => 'admin'],
        ]);

        // Agregar usuario administrador
        DB::table('users')->insert([
            'name' => 'Admin',
            'email' => 'admin@softui.com',
            'password' => Hash::make('secret'),
            'role_id' => DB::table('roles')->where('name', 'admin')->value('id'),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

       
    }

    public function down()
    {
        // Eliminar la columna role_id de la tabla de usuarios
        Schema::table('users', function (Blueprint $table) {
            $table->dropForeign(['role_id']);
            $table->dropColumn('role_id');
        });

        // Eliminar la tabla de roles
        Schema::dropIfExists('roles');
    }
}

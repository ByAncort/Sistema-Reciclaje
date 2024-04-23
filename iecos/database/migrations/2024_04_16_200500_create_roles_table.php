<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreateRolesTable extends Migration
{
    public function up()
    {
        Schema::create('roles', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('description')->nullable();
            $table->timestamps();
        });
        // Insertar datos de roles
        DB::table('roles')->insert([
            ['name' => 'owner', 'description' => 'Dueño'],
            ['name' => 'admin', 'description' => 'Administrador'],
            ['name' => 'jobs', 'description' => 'Trabajos'],
            ['name' => 'guest', 'description' => 'Invitado'],
            ['name' => 'users', 'description' => 'Usuarios'],
        ]);
    }

    public function down()
    {
        Schema::dropIfExists('roles');
    }
}

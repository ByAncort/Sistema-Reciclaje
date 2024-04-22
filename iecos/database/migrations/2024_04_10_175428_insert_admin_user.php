<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Hash;

class InsertAdminUser extends Migration
{
    public function up()
    {
        DB::table('users')->insert([
            'role_id'=> '1',
            'name' => 'Admin',
            'email' => 'admin@softui.com',
            'password' => bcrypt('secret'),
            'phone' => '1234567890',
            'location' => 'New York',
            'about' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }

    public function down()
    {
       
    }
}
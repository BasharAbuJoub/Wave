<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Carbon\Carbon;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password');
            $table->boolean('role')->default(0); // 0: Normal, 1:Instructor, 2: still , 3: Admin
            $table->string('bio')->default('');
            $table->unsignedInteger('uid');
            $table->rememberToken();
            $table->timestamps();
        });

        DB::table('users')->insert([
            'name'      => 'Super Admin',
            'email'     => 'admin@admin.com',
            'password'  => bcrypt('admin'),
            'role'     => 3,
            'created_at'=> Carbon::now(),
            'updated_at'=> Carbon::now()
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}

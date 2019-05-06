<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->bigIncrements('id');
<<<<<<< HEAD
            $table->string('username',100);
            $table->string('password');
            $table->string('phone',15)->nullable();
            $table->string('address',100)->nullable();
            $table->string('email',100);
            $table->string('name')->nullable();
=======
            $table->string('username',100)->unique();
            $table->string('password');
            $table->string('phone', 11);
            $table->string('email',100)->unique();
            $table->string('address',250)->nullable();
            $table->string('name',250);
>>>>>>> origin/trung-admin
            $table->rememberToken();
            $table->timestamps();
        });
       
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

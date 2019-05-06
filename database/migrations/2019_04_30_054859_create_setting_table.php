<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSettingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
<<<<<<< HEAD:database/migrations/2014_10_12_100000_create_password_resets_table.php
        Schema::create('password_resets', function (Blueprint $table) {
            $table->string('emails',100)->index();
            $table->string('token');
            $table->timestamp('created_at')->nullable();
=======
        Schema::create('Setting', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title');
            $table->longText('description');
            $table->enum('sort_product',['best sell','newest']);
            $table->timestamps();
>>>>>>> origin/trung-admin:database/migrations/2019_04_30_054859_create_setting_table.php
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('Setting');
    }
}

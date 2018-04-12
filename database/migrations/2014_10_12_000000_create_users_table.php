<?php

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
            $table->increments('id');
            $table->string('key');
            $table->string('name');
            $table->string('email')->nullable()->unique();
            $table->string('contact')->unique();
            $table->string('fcm_id')->nullable();
            $table->string('address')->nullable();
            $table->string('city_id')->nullable();
            $table->string('password');
            $table->string('otp');
            $table->tinyInteger('status')->default(0);
            $table->tinyInteger('is_verify')->default(0);
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
        Schema::drop('users');
    }
}

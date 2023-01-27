<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('firstname');
            $table->string('lastname');
            $table->string('skin_allergy')->nullable();
            $table->string('phone')->unique();
            $table->string('address')->nullable();
            $table->string('age')->nullable();
            $table->string('avatar')->nullable();
            $table->string('email')->unique();
            $table->string('password');
            $table->string('level') -> default("patient");
            $table->string('facebook')->nullable();
            $table->string('snapchat')->nullable();
            $table->string('instagram')->nullable();
            $table->string('tiktok')->nullable();
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
};

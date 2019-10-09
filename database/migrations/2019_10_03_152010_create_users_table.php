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
            $table->string('name');
            $table->string('email')->unique();
            $table->string('class');

            $table->string('token');
            $table->string('user_id')->unique();
            $table->string('password');
    
            $table->string('dob')->nullable();
            $table->string('pob')->nullable();
            $table->string('lga')->nullable();
    
            $table->string('state')->nullable();
            $table->string('level')->nullable();
            $table->string('phone')->nullable();
    
            $table->string('gender')->nullable();
            $table->string('avater')->nullable();
            $table->string('address')->nullable();
    
            $table->string('occupation')->nullable();
            $table->string('nationality')->nullable();
            $table->string('marital_status')->nullable();
    
            $table->string('email_verified_at')->nullable();            
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

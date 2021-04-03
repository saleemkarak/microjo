<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->id();
            $table->string('full_name');
            $table->string('username')->nullable();
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('photo')->nullable();
            $table->string('phone')->nullable();
            $table->enum('role',['admin' , 'seller' , 'customer'])->default('customer');
            $table->enum('status',['active' , 'inactive' ])->default('active');

            $table->text('country')->nullable();
            $table->text('city')->nullable();
            $table->integer('postcode')->nullable();
            $table->text('state')->nullable();
            $table->text('address')->nullable();

            $table->text('scountry')->nullable();
            $table->text('scity')->nullable();
            $table->integer('spostcode')->nullable();
            $table->text('sstate')->nullable();
            $table->text('saddress')->nullable();

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

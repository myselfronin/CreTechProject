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
        Schema::create('users', function(Blueprint $table) {
            $table->engine = 'InnoDB';

            $table->increments('user_id');
            $table->string('name', 45)->nullable();
            $table->string('email', 45)->nullable();
            $table->string('password', 45)->nullable();
            $table->integer('role')->unsigned()->nullable();
            $table->string('phone_no', 15)->nullable();
            $table->dateTime('email_created_at')->nullable();
            $table->integer('email_verified_by')->unsigned()->nullable();
            $table->dateTime('email_verified_at')->nullable();
            $table->enum('user_status', ['requested',  'verified',  'approved',  'suspended',  'deleted'])->nullable();
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

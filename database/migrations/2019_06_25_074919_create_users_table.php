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
            $table->bigIncrements('user_id');
            $table->string('name', 45);
            $table->string('email', 45);
            $table->string('password', 45);
            $table->integer('role_id');
            $table->string('phone_no', 15);
            $table->integer('email_verified_by')->nullable();
            $table->dateTime('email_verified_at')->nullable();
            $table->enum('user_status', ['requested',  'verified',  'approved',  'suspended',  'deleted'])->default('requested');
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

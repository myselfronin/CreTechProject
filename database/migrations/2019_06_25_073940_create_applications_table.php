<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateApplicationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('applications', function(Blueprint $table) {
            $table->engine = 'InnoDB';

            $table->increments('application_id');
            $table->integer('product')->unsigned()->nullable();
            $table->integer('user')->unsigned()->nullable();
            $table->dateTime('applied_date')->nullable();
            $table->string('status', 45)->nullable();
            $table->dateTime('approved_at')->nullable();
            $table->integer('approved_by')->nullable();
            $table->enum('applications_status', ['pending',  'approved',  'rejected'])->nullable();
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
        Schema::dropIfExists('applications');
    }
}

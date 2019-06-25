<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function(Blueprint $table) {
            $table->engine = 'InnoDB';

            $table->increments('product_id');
            $table->integer('product_owned_by')->unsigned()->nullable();
            $table->integer('amount')->nullable();
            $table->dateTime('product_valid_from')->nullable();
            $table->integer('min_credit_amount')->nullable();
            $table->string('region_of_interest', 45)->nullable();
            $table->text('interested_domain')->nullable();
            $table->dateTime('product_create_at')->nullable();
            $table->dateTime('product_verified_at')->nullable();
            $table->integer('product_verified_by')->nullable();
            $table->enum('product_state', ['requested',  'approved',  'suspended',  'canceled',  'expired',  'accepted'])->nullable();
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
        Schema::dropIfExists('products');
    }
}

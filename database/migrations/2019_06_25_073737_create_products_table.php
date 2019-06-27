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

            $table->bigIncrements('product_id');
            $table->text('body')->nullable();
            $table->integer('product_owned_by');
            $table->integer('amount');
            $table->dateTime('product_valid_from')->nullable();
            $table->integer('min_credit_amount');
            $table->string('region_of_interest', 45)->nullable();
            $table->text('interested_domain')->nullable();
            $table->dateTime('product_verified_at')->nullable();
            $table->integer('product_verified_by')->nullable();
            $table->enum('product_state', ['requested',  'approved',  'suspended',  'canceled',  'expired',  'accepted'])->default('requested');
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

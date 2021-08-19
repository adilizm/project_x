<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRequestRefundsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('request_refunds', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('status');
            $table->bigInteger('order_id');
            $table->json('products_refunded');
            $table->double('price');
            $table->text('reason');
            $table->string('reason_file')->nullable();
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
        Schema::dropIfExists('request_refunds');
    }
}

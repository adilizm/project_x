<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained(); // the customer id
            $table->foreignId('city_id')->constrained(); // the customer id
            $table->string('status')->default('new_arrivale'); // new_arrivale - confirmed - cancled - returned - successed
            $table->string('delivery_status')->default('not-assigned'); // not_assigned - in_the_way - successed - returned 
            $table->double('price_total'); 
            $table->double('price_shipping'); 
            $table->double('delivery_price_shipping'); 
            $table->double('lat'); 
            $table->double('lng'); 
            $table->foreignId('Livreur_id')->constrained('users')->default(null); // the customer id
            $table->string('number')->default(null); // not_assigned - in_the_way - successed - returned 
            $table->string('Business')->default(null); // not_assigned - in_the_way - successed - returned 
            $table->string('floor')->default(null); // not_assigned - in_the_way - successed - returned 
            $table->string('Zone')->default(null); // not_assigned - in_the_way - successed - returned 
            $table->string('address_more_info')->default(null); // not_assigned - in_the_way - successed - returned 
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
}

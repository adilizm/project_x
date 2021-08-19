<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->foreignId('shop_id')->constrained();
            $table->foreignId('category_id')->constrained();
            $table->string('name');
            $table->string('slug');
            $table->string('description')->nullable()->default(null);
            $table->string('prix');
            $table->string('unite')->nullable()->default(null);
            $table->integer('min_quantity');
            $table->text('keywords')->nullable()->default(null);
            $table->json("variants")->nullable()->default(null);
            $table->boolean('published')->default(0);
            $table->boolean('confirmed')->default(0);
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
        Schema::dropIfExists('products');
    }
}

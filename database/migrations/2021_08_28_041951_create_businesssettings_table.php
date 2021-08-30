<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBusinesssettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('businesssettings', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('value');
            $table->boolean('is_active')->default(1);
            $table->timestamp('from')->nullable();
            $table->timestamp('to')->nullable();
            $table->text('link')->nullable();
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
        Schema::dropIfExists('businesssettings');
    }
}

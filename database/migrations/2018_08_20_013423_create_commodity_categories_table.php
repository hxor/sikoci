<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCommodityCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('commodity_categories', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('type_commodity_id')->unsigned();
            $table->foreign('type_commodity_id')->references('id')->on('type_commodities');
            $table->string('slug')->unique();
            $table->string('title');
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
        Schema::dropIfExists('commodity_categories');
    }
}

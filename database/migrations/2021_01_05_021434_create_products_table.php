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
            $table->timestamps();
            $table->string('name',300);
            $table->string('images',500);
            $table->integer('stock');
            $table->float('price');
            $table->string('barcode',500);

            $table->bigInteger('id_brand')->unsigned();
            $table->foreign('id_brand')->references('id')->on('brand');

            $table->bigInteger('id_categories')->unsigned();
            $table->foreign('id_categories')->references('id')->on('categories');

            $table->bigInteger('id_usuario')->unsigned();
            $table->foreign('id_usuario')->references('id')->on('users');

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

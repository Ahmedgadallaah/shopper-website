<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTblProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_products', function (Blueprint $table) {
            $table->bigIncrements('id');
            
            $table->integer('category_id');
            $table->integer('brand_id');
            $table->string('product_name');
            $table->longText('product_short_describtion');
            $table->longText('product_long_describtion');
            $table->float('product_price');
            $table->string('product_image');
            $table->string('product_size');
            $table->string('product_color');
            $table->integer('publication_status');

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
        Schema::dropIfExists('tbl_products');
    }
}

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
            $table->bigIncrements('id');
            $table->unsignedInteger('product_category_id');
            $table->unsignedInteger('sub_category_id');
            $table->string('name');
            $table->string('modal');
            $table->text('description');
            $table->string('price');
            $table->string('discount')->default(0);
            $table->string('quantity');
            $table->string('color');
            $table->string('image');
            $table->string('image2')->nullable();
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

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
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
            $table->string('name')->unique();
            $table->foreignId('category_id');
            $table->foreignId('sub_category_id')->nullable();
            $table->foreignId('brand_id')->nullable();
            $table->string('product_highLight');
            $table->string('product_code');
            $table->string('ordering')->nullable();
            $table->string('ingredient')->nullable();
            $table->string('nutrient')->nullable();
            $table->string('product_dynamicLink')->nullable();
            $table->text('product_specifications')->nullable();
            $table->float('original_price');
            $table->integer('min_order');
            $table->integer('max_order');
            $table->float('product_unit_value');
            $table->string('prd_unit');
            $table->string('search_keyword');//search||Tab keyword
            $table->text('description');
            $table->longText('image')->nullable();
            $table->enum('published',[true,false])->default(true);




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
};

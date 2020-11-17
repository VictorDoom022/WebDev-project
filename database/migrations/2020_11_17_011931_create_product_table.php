<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product', function (Blueprint $table) {
            $table->id();
            $table->string('prdt_code')->unique();
            $table->string('prdt_name');
            $table->string('prdt_oriPrice');
            $table->string('prdt_sellPrice');
            $table->string('prdt_type');
            $table->string('prdt_quantity');
            $table->string('prdt_image')->nullable();
            $table->string('prdt_desc');
            $table->integer('prdt_available');
            $table->string('prdt_seller');
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
        Schema::dropIfExists('product');
    }
}

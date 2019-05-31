<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableDataProducts extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('data_products', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->integer('category_id')->default(1)->nullable()->unsigned();
            $table->string('title');
            $table->string('color')->nullable();
            $table->string('sku')->unique();
            $table->integer('quantity')->default(0);
            $table->decimal('price')->default(0);
            $table->longText('description')->nullable();
            $table->integer('status')->default(1);
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
        Schema::dropIfExists('data_products');
    }
}

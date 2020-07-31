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
            $table->increments('id');
            $table->string('name',150);
            $table->text('description')->nullable();
            $table->string('image')->default('images/products/fake.jpg');
            $table->integer('stock')->default(0);
            $table->integer('min_stock')->default(0);
            $table->text('compatibility')->nullable();

            $table->integer('departament_id')->unsigned();
            $table->foreign('departament_id')->references('id')->on('departaments');

            $table->tinyInteger('status')->default(0);

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

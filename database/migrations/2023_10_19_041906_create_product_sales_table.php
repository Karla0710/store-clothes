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
        Schema::create('product_sales', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('idProducto');
            $table->unsignedBigInteger('idVenta');
            $table->integer('cantidad');
            $table->decimal('precioVenta', 8, 2);
            $table->timestamps();

            $table->foreign('idProducto')->references('id')->on('products');
            $table->foreign('idVenta')->references('id')->on('sales');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('product_sales');
    }
};

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
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('idVenta');
            $table->unsignedBigInteger('idMetodoPago');
            $table->decimal('monto', 8, 2);
            $table->dateTime('fechaPago')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamps();
    
            $table->foreign('idVenta')->references('id')->on('sales');
            $table->foreign('idMetodoPago')->references('id')->on('payment_methods');
    
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('payments');
    }
};

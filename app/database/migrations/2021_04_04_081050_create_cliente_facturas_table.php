<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClienteFacturasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cliente_facturas', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->foreignId("factura_id")
                ->references("id")
                ->on("facturas")
                ->cascadeOnDelete();
            $table->foreignId("cliente_id")
                ->references("id")
                ->on("clientes")
                ->cascadeOnDelete();
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cliente_facturas');
    }
}

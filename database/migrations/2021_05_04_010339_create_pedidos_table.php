<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePedidosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pedidos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedInteger('person_id');
            $table->unsignedInteger('pharmacy_id');
            $table->string('meds')->nullable();
            $table->string('address', 50);
            $table->string('phone', 10);
            $table->string('prescription', 100)->nullable();
            $table->string('payment', 20);
            $table->unsignedInteger('state_id');
            $table->double('total')->nullable();
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
        Schema::dropIfExists('pedidos');
    }
}

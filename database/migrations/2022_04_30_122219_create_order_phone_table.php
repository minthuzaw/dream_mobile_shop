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
        Schema::create('order_phone', function (Blueprint $table) {
            $table->foreignId('order_id')->constrained();
            $table->foreignId('phone_id')->constrained();
            $table->float('unit_price');
            $table->integer('quantity');
            $table->float('sub_total');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('order_phone');
    }
};

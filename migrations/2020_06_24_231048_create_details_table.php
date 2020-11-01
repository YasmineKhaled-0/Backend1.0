<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('details', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('product_id')->nullable()->index();
            $table->unsignedBigInteger('order_id')->nullable()->index();
            $table->float('price');
            $table->Integer('quantity');
            $table->float('total');
            $table->timestamps();
            $table->foreign('product_id')
            ->on('products')
            ->references('id')
            ->cascadeOnDelete()
        ;
        $table->foreign('order_id')
            ->on('orders')
            ->references('id')
            ->cascadeOnDelete()
        ;
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('details');
    }
}

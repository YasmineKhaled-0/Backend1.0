<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStocksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stocks', function (Blueprint $table) {
            $table->id();
            $table->unsignedinteger('quantity');
            $table->unsignedinteger('min-quantity');
            $table->unsignedinteger('price');
            $table->unsignedBigInteger('product_id')->nullable()->index();
            $table->timestamps();
            $table->foreign('product_id')
                ->on('products')
                ->references('id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('stocks');
    }
}

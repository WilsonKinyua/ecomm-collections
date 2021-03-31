<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('customer_name');
            $table->string('customer_phone');
            $table->string('product');
            $table->integer('quantity');
            $table->decimal('product_price', 15, 2);
            $table->timestamps();
            $table->softDeletes();
        });
    }
}

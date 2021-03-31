<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->decimal('price_before', 15, 2);
            $table->decimal('price_after', 15, 2);
            $table->longText('description');
            $table->timestamps();
            $table->softDeletes();
        });
    }
}

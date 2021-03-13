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
            $table->string('name')->nullable();
            $table->longText('description')->nullable();
            $table->decimal('price_before', 15, 2)->nullable();
            $table->decimal('price_now', 15, 2)->nullable();
            $table->integer('comment')->nullable();
            $table->text("photo")->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToOrdersTable extends Migration
{
    public function up()
    {
        Schema::table('orders', function (Blueprint $table) {
            $table->unsignedBigInteger('product_name_id')->nullable();
            $table->foreign('product_name_id', 'product_name_fk_3382776')->references('id')->on('products');
            $table->unsignedBigInteger('customer_id')->nullable();
            $table->foreign('customer_id', 'customer_fk_3382777')->references('id')->on('users');
            $table->unsignedBigInteger('address_id')->nullable();
            $table->foreign('address_id', 'address_fk_3382779')->references('id')->on('users');
            $table->unsignedBigInteger('phone_id')->nullable();
            $table->foreign('phone_id', 'phone_fk_3382780')->references('id')->on('users');
        });
    }
}

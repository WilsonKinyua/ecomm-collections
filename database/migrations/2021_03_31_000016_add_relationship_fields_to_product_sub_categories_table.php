<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToProductSubCategoriesTable extends Migration
{
    public function up()
    {
        Schema::table('product_sub_categories', function (Blueprint $table) {
            $table->unsignedBigInteger('main_category_id');
            $table->foreign('main_category_id', 'main_category_fk_3570016')->references('id')->on('product_main_categories');
        });
    }
}

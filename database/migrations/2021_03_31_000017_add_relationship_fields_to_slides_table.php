<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToSlidesTable extends Migration
{
    public function up()
    {
        Schema::table('slides', function (Blueprint $table) {
            $table->unsignedBigInteger('product_category_id');
            $table->foreign('product_category_id', 'product_category_fk_3570349')->references('id')->on('product_main_categories');
        });
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToSubSlideAdTwosTable extends Migration
{
    public function up()
    {
        Schema::table('sub_slide_ad_twos', function (Blueprint $table) {
            $table->unsignedBigInteger('product_category_id')->nullable();
            $table->foreign('product_category_id', 'product_category_fk_3570361')->references('id')->on('product_sub_categories');
        });
    }
}

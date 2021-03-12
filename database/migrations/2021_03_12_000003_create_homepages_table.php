<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHomepagesTable extends Migration
{
    public function up()
    {
        Schema::create('homepages', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->longText('short_description');
            $table->integer('phone');
            $table->string('email');
            $table->string('address');
            $table->string('working_days')->nullable();
            $table->string('facebook')->nullable();
            $table->string('twitter')->nullable();
            $table->string('instagram')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBlogPagesTable extends Migration
{
    public function up()
    {
        Schema::create('blog_pages', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title');
            $table->string('caption');
            $table->longText('description');
            $table->timestamps();
            $table->softDeletes();
        });
    }
}

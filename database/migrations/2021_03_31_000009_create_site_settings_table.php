<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSiteSettingsTable extends Migration
{
    public function up()
    {
        Schema::create('site_settings', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title');
            $table->longText('caption');
            $table->string('open_hours');
            $table->integer('support_phone_1');
            $table->integer('support_phone_2')->nullable();
            $table->string('location');
            $table->string('facebook');
            $table->string('email');
            $table->string('instagram')->nullable();
            $table->string('whatsapp');
            $table->timestamps();
            $table->softDeletes();
        });
    }
}

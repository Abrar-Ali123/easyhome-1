<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLandsTable extends Migration
{
    public function up()
    {
        Schema::create('lands', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('location');
            $table->text('description');
            $table->decimal('price', 10, 2);
            $table->integer('area')->nullable();
            $table->string('property_usage')->nullable();
            $table->string('property_type')->nullable();
            $table->unsignedBigInteger('city_id')->nullable();
            $table->unsignedBigInteger('neighborhood_id')->nullable();
            $table->string('image')->nullable();
            $table->timestamps();

            $table->foreign('city_id')->references('id')->on('cities')->onDelete('set null');
            $table->foreign('neighborhood_id')->references('id')->on('cities')->onDelete('set null');
        });
    }

    public function down()
    {
        Schema::dropIfExists('lands');
    }
}

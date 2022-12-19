<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMotelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('motels', function (Blueprint $table) {
            $table->id();
            $table->string('title')->nullable();
            $table->string('description')->nullable();
            $table->string('price')->nullable();
            $table->integer('area')->nullable();
            $table->integer('count_view')->default(0)->nullable();
            $table->string('address')->nullable();
            $table->string('latlng')->nullable();
            $table->string('images')->nullable();
            $table->bigInteger('user_id')->unsigned()->nullable();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->integer('category_id')->nullable();
            $table->bigInteger('district_id')->unsigned()->nullable();
            $table->string('utilities')->nullable();
            $table->string('phone')->nullable();
            $table->integer('approve')->default(0)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('motels');
    }
}

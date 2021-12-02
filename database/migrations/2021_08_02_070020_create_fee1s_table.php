<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFee1sTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fee1s', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->integer('fees')->unsigned();
            $table->string('years');
            $table->unsignedBigInteger('gard_id');
            $table->unsignedBigInteger('class_id');
            $table->integer('type')->default(1)->unsigned();
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
        Schema::dropIfExists('fee1s');
    }
}

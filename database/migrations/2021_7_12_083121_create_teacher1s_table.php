<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTeacher1sTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('teacher1s', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email');
            $table->string('password');
            $table->unsignedBigInteger('Specialzation_id');
            $table->foreign('Specialzation_id')->references('id')->on('specialzations')->onDelete('cascade');
            $table->unsignedBigInteger('gander_id');
            $table->foreign('gander_id')->references('id')->on('genders')->onDelete('cascade');
            $table->string('join_data');
            $table->string('Address');
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
        Schema::dropIfExists('teacher1s');
    }
}
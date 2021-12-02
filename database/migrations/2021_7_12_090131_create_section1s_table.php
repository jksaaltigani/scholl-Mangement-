<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSection1sTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('section1s', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('notes')->unllable();
            $table->unsignedBigInteger('gard_id');
            $table->unsignedBigInteger('class_id');
            $table->foreign('gard_id')->references('id')->on('gard1s')->onDelete('cascade');
            $table->foreign('class_id')->references('id')->on('clas')->onDelete('cascade');
            $table->foreignId('teacher_id')->references('id')->on('teacher1s')->onDelete('cascade');
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
        Schema::dropIfExists('section1s');
    }
}
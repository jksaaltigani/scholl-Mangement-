<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePromotionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('promotions', function (Blueprint $table) {
            $table->id();

            $table->foreignId('student_id')->references('id')->on('student1s')->onDelete('cascade');
            $table->foreignId('gard_from')->references('id')->on('gard1s')->onDelete('cascade');
            $table->foreignId('gard_to')->references('id')->on('gard1s')->onDelete('cascade');
            $table->foreignId('class_from')->references('id')->on('clas')->onDelete('cascade');
            $table->foreignId('class_to')->references('id')->on('clas')->onDelete('cascade');
            $table->foreignId('section_from')->references('id')->on('section1s')->onDelete('cascade');
            $table->foreignId('section_to')->references('id')->on('section1s')->onDelete('cascade');

            $table->string('academy_year')->nullable();
            $table->string('academy_new_year')->nullable();
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
        Schema::dropIfExists('promotions');
    }
}
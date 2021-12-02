<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudent1sTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('student1s', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password');
            // realtionshep
            $table->foreignId('gender_id')->references('id')->on('genders')->onDelate('cascade');
            $table->foreignId('international_id')->references('id')->on('internationals')->onDelate('cascade');
            $table->foreignId('blood_id')->references('id')->on('bloods')->onDelate('cascade');
            $table->foreignId('relagin_id')->references('id')->on('religions')->onDelate('cascade');
            $table->foreignId('gard_id')->references('id')->on('gard1s')->onDelate('cascade');
            $table->foreignId('class_id')->references('id')->on('clas')->onDelate('cascade');
            $table->foreignId('section_id')->references('id')->on('section1s')->onDelate('cascade');
            $table->foreignId('parent_id')->references('id')->on('parent1s')->onDelate('cascade');

            $table->string('join_date')->nullable();
            $table->softDeletes();
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
        Schema::dropIfExists('student1s');
    }
}
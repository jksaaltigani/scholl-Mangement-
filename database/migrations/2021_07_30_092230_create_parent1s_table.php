<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateParent1sTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('parent1s', function (Blueprint $table) {
            $table->id();
            $table->string('Email')->unique();
            $table->string('Password');


            //Fatherinformation
            $table->string('Name_Father');
            // $table->string('National_ID_Father');
            $table->string('Passport_ID_Father');
            $table->string('Phone_Father');
            $table->string('Job_Father');
            // $table->unsignedBigInteger('Nationality_Father_id')->unsigned();
            // $table->unsignedBigInteger('Blood_Type_Father_id');
            // $table->unsignedBigInteger('Religion_Father_id');
            $table->string('Address_Father');

            //Mother information
            $table->string('Name_Mother');
            $table->string('National_ID_Mother');
            $table->string('Passport_ID_Mother');
            $table->string('Phone_Mother');
            $table->string('Job_Mother');
            // $table->unsignedBigInteger('Nationality_Mother_id')->unsigned();
            // $table->unsignedBigInteger('Blood_Type_Mother_id')->unsigned();
            // $table->unsignedBigInteger('Religion_Mother_id');
            $table->string('Address_Mother');

            //realtion model
            $table->foreignId('Nationality_Mother_id')->references('id')->on('internationals');
            $table->foreignId('National_ID_Father')->references('id')->on('internationals');

            $table->foreignId('Blood_Type_Mother_id')->references('id')->on('bloods');
            $table->foreignId('Blood_Type_Father_id')->references('id')->on('bloods');


            $table->foreignId('Religion_Mother_id')->references('id')->on('religions');
            $table->foreignId('Religion_Father_id')->references('id')->on('religions');


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
        Schema::dropIfExists('parent1s');
    }
}
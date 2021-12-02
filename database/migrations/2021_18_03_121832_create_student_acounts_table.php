<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentAcountsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('student_acounts', function (Blueprint $table) {
            $table->id();
            $table->string('insert_date');
            $table->foreignId('student_id')->references('id')->on('student1s')->onDelete('cascade');
            $table->string('type')->default('fee');
            $table->foreignId('fee_id')->nullable()->references('id')->on('fee1s')->onDelete('cascade');
            $table->foreignId('recept_id')->nullable()->references('id')->on('recept_students')->onDelete('cascade');
            $table->decimal('debit')->default(0.00);
            $table->decimal('credit')->default(0.00);
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
        Schema::dropIfExists('student_acounts');
    }
}
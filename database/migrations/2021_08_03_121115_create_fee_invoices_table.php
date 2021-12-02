<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFeeInvoicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fee_invoices', function (Blueprint $table) {
            $table->id();
            $table->string('invoice_date');
            $table->foreignId('student_id')->references('id')->on('student1s')->onDelete('cascade');
            $table->foreignId('class_id')->references('id')->on('clas')->onDelete('cascade');
            $table->foreignId('gard_id')->references('id')->on('gard1s')->onDelete('cascade');
            $table->foreignId('fee_id')->references('id')->on('fee1s')->onDelete('cascade');
            $table->decimal('amount');
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
        Schema::dropIfExists('fee_invoices');
    }
}
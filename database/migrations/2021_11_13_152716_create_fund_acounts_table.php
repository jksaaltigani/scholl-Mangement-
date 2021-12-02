<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFundAcountsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fund_acounts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('recept_id')->references('id')->on('recept_students')->onDelete('cascade');
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
        Schema::dropIfExists('fund_acounts');
    }
}

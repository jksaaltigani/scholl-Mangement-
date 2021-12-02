<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateParentAttachments extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('parent_attachments', function (Blueprint $table) {
            $table->id();
		  	  $table->string('file_name');
		  $table->unsignedBigInteger('parent_id')->unsign();
		  $table->foreign('parent_id')->references('id')->on('my_parents')->onDelete('cascade');
          
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
        Schema::dropIfExists('parent_attachments');
    }
}

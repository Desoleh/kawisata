<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRegulationFilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('regulation_files', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('regulation_id');
            $table->uuid('uuid');
            $table->string('name');
            $table->string('path');
            $table->timestamps();

            $table->foreign('regulation_id')->references('id')->on('regulations')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('regulation_files');
    }
}

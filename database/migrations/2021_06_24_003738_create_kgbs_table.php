<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKgbsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kgbs', function (Blueprint $table) {
            $table->id();
            $table->string('nip');
            $table->date('startdate');
            $table->date('enddate');
            $table->date('prevkgb');
            $table->date('tmtkgb');
            $table->date('nextkgb');
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
        Schema::dropIfExists('kgbs');
    }
}

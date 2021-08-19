<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUpdateCovidsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('update_covids', function (Blueprint $table) {
            $table->id();
            $table->date('tgl_kemarin');
            $table->date('tgl_sekarang');
            $table->integer('positif1');
            $table->integer('positif2');
            $table->integer('sembuh1');
            $table->integer('sembuh2');
            $table->integer('kasusbaru');
            $table->integer('isoman');
            $table->integer('rumkit');
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
        Schema::dropIfExists('update_covids');
    }
}

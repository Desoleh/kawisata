<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRegulationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('regulations', function (Blueprint $table) {
            $table->id();
            $table->uuid('uuid');
            $table->string('kode')->nullable();
            $table->string('judul')->nullable();
            $table->string('judul_singkat')->nullable();
            $table->foreignId('category_id')->nullable();
            $table->integer('nomor')->nullable();
            $table->integer('tahun')->nullable();
            $table->string('grade')->nullable();
            $table->date('tgl_penetapan')->nullable();
            $table->date('tgl_efektif')->nullable();
            $table->string('konseptor')->nullable();
            $table->string('diubah')->nullable();
            $table->string('status')->nullable();
            $table->string('keterangan')->nullable();
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
        Schema::dropIfExists('regulations');
    }
}

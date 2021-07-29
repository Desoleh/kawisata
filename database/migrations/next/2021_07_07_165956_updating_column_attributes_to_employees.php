<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdatingColumnAttributesToEmployees extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('employees', function (Blueprint $table) {
            $table->string('nama',70)->nullable()->change();
            $table->string('gelar',15)->nullable()->change();
            $table->string('tempat_lahir',70)->nullable()->change();
            $table->integer('umur_thn')->nullable()->change();
            $table->integer('umur_bln')->nullable()->change();
            $table->integer('mk_tahun')->nullable()->change();
            $table->integer('mk_bulan')->nullable()->change();
            $table->string('gol_ruang',6)->nullable()->change();
            $table->integer('mk_pkt_th')->nullable()->change();
            $table->integer('mk_pkt_bl')->nullable()->change();
            $table->string('jenis_pangkat',10)->nullable()->change();
            $table->integer('mkg_thn')->nullable()->change();
            $table->integer('mkg_bln')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('employees', function (Blueprint $table) {
            //
        });
    }
}

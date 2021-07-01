<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOffcyclesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('offcycles', function (Blueprint $table) {
            $table->string('nama')->nullable();
            $table->string('nip')->nullable();
            $table->string('nama_bank')->nullable();
            $table->string('nomor_rekening')->nullable();
            $table->integer('tunjangan_transport')->default('0');
            $table->integer('tunjangan_komunikasi')->default('0');
            $table->integer('tunjangan_jabatan')->default('0');
            $table->integer('tunjangan_kinerja_pegawai')->default('0');
            $table->integer('tunjangan_kemahalan')->default('0');
            $table->integer('tunjangan_cuti')->default('0');
            $table->integer('tunjangan_profesi')->default('0');
            $table->integer('tunjangn_tidak_tetap_pkwt')->default('0');
            $table->integer('bruto')->default('0');
            $table->integer('potongan_lain')->default('0');
            $table->integer('bruto1')->default('0');
            $table->integer('admin_bank')->default('0');
            $table->integer('netpay')->default('0');
            $table->integer('tunjangan_keahlian')->default('0');
            $table->integer('prestasi')->default('0');
            $table->integer('shift_allowance')->default('0');
            $table->integer('best_performance')->default('0');
            $table->integer('lembur')->default('0');
            $table->integer('penalty')->default('0');
            $table->integer('netpaycc121')->nullable();
            $table->string('bulan')->nullable();
            $table->string('idoffcycle')->nullable();
            $table->id();
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
        Schema::dropIfExists('offcycles');
    }
}

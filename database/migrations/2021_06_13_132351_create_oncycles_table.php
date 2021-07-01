<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOncyclesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('oncycles', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('nama')->nullable();
            $table->string('nip')->nullable();
            $table->string('nama_jabatan')->nullable();
            $table->string('bank_gaji')->nullable();
            $table->string('no_rekening')->nullable();
            $table->integer('upah_pokok')->default('0');
            $table->integer('honorarium_pkwt')->default('0');
            $table->integer('bpjs_base')->default('0');
            $table->integer('tunj_perumahan')->default('0');
            $table->integer('tunj_adm_bank')->default('0');
            $table->integer('tunj_kurang_bayar')->default('0');
            $table->integer('tht_taspen_iur_pekerja_3_25')->default('0');
            $table->integer('jht_jwasraya_iur_persh_12_5')->default('0');
            $table->integer('jht_jwasraya_iur_pekerja_4_75')->default('0');
            $table->integer('jht_bpjs_iur_persh_3_7')->default('0');
            $table->integer('jht_bpjs_iur_pekerja_2')->default('0');
            $table->integer('jp_bpjs_iur_persh_2')->default('0');
            $table->integer('jp_bpjs_iur_pekerja_1')->default('0');
            $table->integer('jkk_bpjs_iur_persh_1_27')->default('0');
            $table->integer('jk_bpjs_iur_persh_0_3')->default('0');
            $table->integer('jpk_bpjs_mand_iur_persh')->default('0');
            $table->integer('jpk_bpjs_mand_iur_pekerja')->default('0');
            $table->integer('jpk_bpjs_iur_persh_4')->default('0');
            $table->integer('jpk_bpjs_iur_pekerja_1')->default('0');
            $table->integer('jpk_uk_iur_pekerja_1')->default('0');
            $table->integer('jpk_pensiunan_iur_persh_2')->default('0');
            $table->integer('jpk_pensiunan_iur_pekerja_2')->default('0');
            $table->integer('iur_spka')->default('0');
            $table->integer('pot_lain')->default('0');
            $table->integer('pot_sewa_rumah_dinas')->default('0');
            $table->integer('simpanan_baitul_ridho')->default('0');
            $table->integer('cicilan_baitul_ridho')->default('0');
            $table->integer('pot_kelebihan_bayar')->default('0');
            $table->integer('total_pajak')->default('0');
            $table->integer('bruto')->default('0');
            $table->integer('admin_oncycle')->default('0');
            $table->integer('netpay')->default('0');
            $table->string('bulan')->nullable();
            $table->string('idoncycle')->nullable();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('oncycles');
    }
}

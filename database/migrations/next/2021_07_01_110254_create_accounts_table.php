<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAccountsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('accounts', function (Blueprint $table) {
            $table->id();
            $table->string('nip');
            $table->string('ktp',16)->nullable();
            $table->string('npwp',15)->nullable();
            $table->string('jamsostek',20)->nullable();
            $table->string('alamat1')->nullable();
            $table->string('alamat2')->nullable();
            $table->string('District')->nullable();
            $table->string('City')->nullable();
            $table->integer('Postal')->nullable();
            $table->timestamps();

            $table->foreign('nip')->references('nip')->on('employees');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('accounts');
    }
}

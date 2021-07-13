<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSalarySlipsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('salary_slips', function (Blueprint $table) {
            $table->string('type',8);
            $table->uuid('uuid')->primary();
            $table->string('filename');
            $table->string('monthyear');
            $table->string('nip');
            $table->foreign('nip')->references('nip')->on('employees');
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
        Schema::dropIfExists('salary_slips');
    }
}

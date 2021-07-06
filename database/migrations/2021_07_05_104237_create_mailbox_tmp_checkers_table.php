<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMailboxTmpCheckersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mailbox_tmp_checkers', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('mailbox_id');
            $table->string('checker_id',10);
            $table->integer('sequence')->default(0);
            $table->timestamps();

            $table->foreign('mailbox_id')->references('id')->on('mailboxes');
            $table->foreign('checker_id')->references('position_id')->on('positions');
            });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mailbox_tmp_checkers');
    }
}

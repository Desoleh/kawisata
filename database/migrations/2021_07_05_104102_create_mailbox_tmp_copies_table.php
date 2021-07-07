<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMailboxTmpCopiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mailbox_tmp_copies', function (Blueprint $table) {
            $table->id();
            $table->string('mailbox_id',36);
            $table->string('copy_id',10);
            $table->timestamps();

            $table->foreign('mailbox_id')->references('id')->on('mailboxes');
            $table->foreign('copy_id')->references('position_id')->on('positions');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mailbox_tmp_copies');
    }
}

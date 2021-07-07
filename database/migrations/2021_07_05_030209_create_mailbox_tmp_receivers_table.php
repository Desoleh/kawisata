<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMailboxTmpReceiversTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mailbox_tmp_receivers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('mailbox_id',36);
            $table->string('receiver_id',10);
            $table->timestamps();

            $table->foreign('mailbox_id')->references('id')->on('mailboxes');
            $table->foreign('receiver_id')->references('position_id')->on('positions');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mailbox_tmp_receivers');
    }
}
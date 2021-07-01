<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMailboxHoldersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mailbox__holders', function (Blueprint $table) {
            $table->id();
            $table->string('mailbox_id');
            $table->string('holder_id',10);
            $table->timestamps();

            $table->foreign('mailbox_id')->references('id')->on('mailboxes');
            $table->foreign('holder_id',10)->references('position_id')->on('positions');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mailbox__holders');
    }
}

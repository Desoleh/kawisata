<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMailboxAttachmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mailbox_attachments', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("mailbox_id");
            $table->string('attachment');
            $table->timestamps();

            $table->foreign('mailbox_id')->references('id')->on('mailboxes');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mailbox_attachments');
    }
}

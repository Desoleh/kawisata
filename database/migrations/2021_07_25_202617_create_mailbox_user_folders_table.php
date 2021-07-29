<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMailboxUserFoldersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mailbox_user_folders', function (Blueprint $table) {
            $table->id();
            $table->string('position_id',10);
            $table->unsignedBigInteger("mailbox_id");
            $table->unsignedBigInteger("folder_id");
            $table->timestamps();

            $table->foreign('position_id')->references('position_id')->on('positions');
            $table->foreign('mailbox_id')->references('id')->on('mailbox')->onDelete('cascade');
            $table->foreign('folder_id')->references('id')->on('mailbox_folder');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mailbox_user_folders');
    }
}

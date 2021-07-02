<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMailboxesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mailboxes', function (Blueprint $table) {
            $table->id();
            $table->string('document_id')->unique()->nullable();
            $table->string('perihal',225);
            $table->longText('body');
            $table->smallInteger('is_draft')->default(1);
            $table->dateTime('draft_created_at');
            $table->string('approver_id',10);
            $table->string('drafter_id',10);
            $table->timestamps();

            $table->foreign('approver_id')->references('position_id')->on('positions');
            $table->foreign('drafter_id')->references('position_id')->on('positions');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mailboxes');
    }
}

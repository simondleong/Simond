<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMessagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('messages', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('chat_id');
            $table->unsignedInteger('sender_id');
            $table->unsignedInteger('receiver_id');
            $table->text('message');
            $table->timestamps();
        });

        Schema::table('messages', function (Blueprint $table) {
            $table->foreign('chat_id')
                ->references('id')->on('chats')
                ->onDelete('cascade')->onUpdate('cascade');

            $table->foreign('sender_id')
                ->references('id')->on('users')
                ->onDelete('cascade')->onUpdate('cascade');

            $table->foreign('receiver_id')
                ->references('id')->on('users')
                ->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('messages');
    }
}

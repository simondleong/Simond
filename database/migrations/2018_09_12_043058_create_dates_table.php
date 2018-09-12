<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dates', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('sender_id');
            $table->unsignedInteger('receiver_id');
            $table->unsignedInteger('status');
            $table->unsignedInteger('sender_confirmation');
            $table->unsignedInteger('receiver_confirmation');
            $table->timestamps();
        });

        Schema::table('dates', function (Blueprint $table) {
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
        Schema::dropIfExists('dates');
    }
}

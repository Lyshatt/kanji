<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWordKanjiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('word_kanji', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->unsignedBigInteger('word_id');
            $table->unsignedBigInteger('kanji_id');

            $table->foreign('word_id')->references('id')->on('words')->onDelete('cascade');
            $table->foreign('kanji_id')->references('id')->on('kanjis')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('word_kanji');
    }
}

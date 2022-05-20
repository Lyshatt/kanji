<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommonWordKanjiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('common_word_kanji', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->unsignedBigInteger('common_word_id');
            $table->unsignedBigInteger('kanji_id');

            $table->foreign('common_word_id')->references('id')->on('common_words')->onDelete('cascade');
            $table->foreign('kanji_id')->references('id')->on('kanji')->onDelete('cascade');
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

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUncommonWordKanjiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('uncommon_word_kanji', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->unsignedBigInteger('uncommon_word_id');
            $table->unsignedBigInteger('kanji_id');

            $table->foreign('uncommon_word_id')->references('id')->on('uncommon_words')->onDelete('cascade');
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
        Schema::dropIfExists('uncommon_word_kanji');
    }
};

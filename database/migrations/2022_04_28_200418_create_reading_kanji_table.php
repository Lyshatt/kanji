<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReadingKanjiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reading_kanji', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            $table->unsignedBigInteger('reading_id');
            $table->unsignedBigInteger('kanji_id');

            $table->foreign('reading_id')->references('id')->on('readings')->onDelete('cascade');
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
        Schema::dropIfExists('reading_kanji');
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKunReadingKanjiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kun_reading_kanji', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            $table->unsignedBigInteger('kun_reading_id');
            $table->unsignedBigInteger('kanji_id');

            $table->foreign('kun_reading_id')->references('id')->on('kun_readings')->onDelete('cascade');
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
        Schema::dropIfExists('kun_reading_kanji');
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOnreadingKanjiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('onreading_kanji', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            $table->foreign('onreading_id')->references('id')->on('onreadings')->onDelete('cascade');
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
        Schema::dropIfExists('onreading_kanji');
    }
}

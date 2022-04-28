<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKunreadingKanjiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kunreading_kanji', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            $table->foreign('kunreading_id')->references('id')->on('kunreadings')->onDelete('cascade');
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
        Schema::dropIfExists('kunreading_kanji');
    }
}

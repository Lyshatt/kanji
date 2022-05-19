<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKanjiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kanji', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('symbol', 1)->unique();
            $table->text('on_meaning')->nullable();
            $table->text('kun_meaning')->nullable();
            $table->text('mnemonic')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('kanji');
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUnCommonWordsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('uncommon_words', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('word')->unique();
            $table->text('meaning')->nullable();
            $table->text('reading')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('uncommon_words');
    }
};

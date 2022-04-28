<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKanjisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kanjis', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('symbol', 1);
            $table->text('meaning');
            $table->text('mnemonic');
        });
    }

//    protected $fillable = [
//        'symbol',
//        'meaning'
//    ];
//
//    public function kunReadings()
//    {
//        return $this->hasMany(KunReading::class);
//    }
//
//    public function onReadings()
//    {
//        return $this->hasMany(OnReading::class);
//    }
//
//    public function words()
//    {
//        return $this->hasMany(Word::class);
//    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('kanjis');
    }
}

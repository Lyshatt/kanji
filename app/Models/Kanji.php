<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kanji extends Model
{
    use HasFactory;
    protected $table = 'Kanji';

    protected $fillable = [
        'symbol',
        'meaning',
        'mnemonic'
    ];

    public function kunReadings()
    {
        return $this->belongsToMany(KunReading::class, 'kun_reading_kanji');
    }

    public function onReadings()
    {
        return $this->belongsToMany(OnReading::class, 'on_reading_kanji');
    }

    public function words()
    {
        return $this->belongsToMany(Word::class, 'word_kanji');
    }


}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kanji extends Model
{
    use HasFactory;

    protected $fillable = [
        'symbol',
        'meaning',
        'mnemonic'
    ];

    public function kunReadings()
    {
        return $this->hasMany(KunReading::class);
    }

    public function onReadings()
    {
        return $this->hasMany(OnReading::class);
    }

    public function words()
    {
        return $this->hasMany(Word::class);
    }


}

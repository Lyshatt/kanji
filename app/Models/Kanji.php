<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kanji extends Model
{
    use HasFactory;
    protected $table = 'kanji';

    protected $fillable = [
        'symbol',
        'on_meaning',
        'kun_meaning',
        'mnemonic'
    ];

    public function tags()
    {
        return $this->belongsToMany(Tag::class, 'tag_kanji');
    }

    public function readings()
    {
        return $this->belongsToMany(Reading::class, 'reading_kanji');
    }

    public function words()
    {
        return $this->belongsToMany(Word::class, 'word_kanji');
    }


}

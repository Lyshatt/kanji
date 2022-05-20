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
        'mnemonic',
        'is_fully_imported'
    ];

    public function tags()
    {
        return $this->belongsToMany(Tag::class, 'tag_kanji');
    }

    public function readings()
    {
        return $this->belongsToMany(Reading::class, 'reading_kanji');
    }

    public function commonWords()
    {
        return $this->belongsToMany(CommonWord::class, 'common_word_kanji');
    }

    public function uncommonWords()
    {
        return $this->belongsToMany(UncommonWord::class, 'uncommon_word_kanji');
    }

}

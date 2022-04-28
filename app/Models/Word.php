<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Word extends Model
{
    use HasFactory;

    protected $fillable = [
        'meaning',
        'reading'
    ];

    public function kanjis()
    {
        return $this->belongsToMany(Kanji::class);
    }
}

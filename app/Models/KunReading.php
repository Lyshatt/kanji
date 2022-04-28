<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KunReading extends Model
{
    use HasFactory;

    protected $fillable = [
        'reading'
    ];

    public function kanjis()
    {
        return $this->belongsToMany(Kanji::class);
    }
}

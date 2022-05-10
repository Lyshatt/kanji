<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OnReading extends Model
{
    use HasFactory;

    protected $fillable = [
        'reading'
    ];

    public function kanji()
    {
        return $this->belongsToMany(Kanji::class);
    }
}

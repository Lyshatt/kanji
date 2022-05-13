<?php

namespace App\Http\Controllers;

use App\Models\Kanji;
use App\Models\Word;
use Illuminate\Http\Request;

class BackendController extends Controller
{
    public function index() {
        $allKanji = Kanji::all();
        $wordsWithMissingData = Word::where('meaning', null)->orWhere('reading', null)->get();

        return view('pages.backend.index')->with(
            [
                'allKanji' => $allKanji,
                'wordsWithMissingData' => $wordsWithMissingData
            ]
        );
    }
}

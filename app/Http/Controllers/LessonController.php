<?php

namespace App\Http\Controllers;

use App\Models\Kanji;
use App\Models\Tag;
use Illuminate\Http\Request;

class LessonController extends Controller
{
    /**
     * Receive list of tags and initialize lesson
     *
     */
    public function index(Request $request)
    {
        $allKanji = [];
        foreach ($request->tags as $tag) {
            $kanjiArray = Kanji::whereHas('tags', function($query) use ($tag) {
                $query->where('name', $tag);
            })->with('tags')->get()->toArray();

            $allKanji = array_merge($allKanji, $kanjiArray);
        }

        return view('pages.lesson.index')->with(
            ['kanjiByTag' => $allKanji]
        );

    }
}

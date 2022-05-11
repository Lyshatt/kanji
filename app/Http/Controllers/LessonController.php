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
        $kanjiByTag = [];
        foreach ($request->tags as $tag) {
            $dbTag = Tag::where('name', $tag)->with('kanji')->first();
            $kanjiByTag[] = $dbTag;
        }

        return view('pages.lesson.index')->with(
            ['kanjiByTag' => $kanjiByTag]
        );

    }
}

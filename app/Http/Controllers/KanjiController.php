<?php

namespace App\Http\Controllers;

use App\Models\Kanji;
use App\Models\KunReading;
use App\Models\OnReading;
use App\Models\Tag;
use App\Models\Word;
use Illuminate\Http\Request;
use Illuminate\View\View;

class KanjiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     */
    public function create()
    {
        return view('pages.kanji.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     */
    public function store(Request $request)
    {
        $request->validate([
            'symbol' => 'required|unique:kanji',
            'meaning' => 'required',
            'kunreadings' => 'required',
            'onreadings' => 'required'
        ]);

        $kanji = new Kanji();
        $kanji->symbol = $request->symbol;
        $kanji->meaning = $request->meaning;
        $kanji->mnemonic = $request->mnemoinc;

        $kanji->save();

        $kunReadings = explode(',', $request->kunreadings);
        $onReadings = explode(',', $request->onreadings);
        $words = explode(',', $request->words);
        $tags = explode(',', $request->tags);

        foreach ($kunReadings as $kunReading) {
            $existingKunReading = KunReading::where('reading', $kunReading)->first();

            if(!$existingKunReading) {
                $existingKunReading = new KunReading();
                $existingKunReading->reading = $kunReading;
                $existingKunReading->save();
            }

            $kanji->kunReadings()->save($existingKunReading);
        }

        foreach ($onReadings as $onReading) {
            $existingOnReading = OnReading::where('reading', $onReading)->first();

            if(!$existingOnReading) {
                $existingOnReading = new OnReading();
                $existingOnReading->reading = $onReading;
                $existingOnReading->save();
            }

            $kanji->onReadings()->save($existingOnReading);
        }

        foreach ($words as $word) {
            $existingWord = Word::where('word', $word)->first();

            if(!$existingWord) {
                $existingWord = new Word();
                $existingWord->word = $word;
                $existingWord->save();
            }

            $kanji->words()->save($existingWord);
        }

        foreach ($tags as $tag) {
            $existingTag = Tag::where('name', $tag)->first();

            if(!$existingTag) {
                $existingTag = new Tag();
                $existingTag->name = $tag;
                $existingTag->save();
            }

            $kanji->tags()->save($existingTag);
        }

        return view('pages.kanji.create');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

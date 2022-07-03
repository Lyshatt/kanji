<?php

namespace App\Http\Controllers;

use App\CsvImports\KanjiImport;
use App\Models\Kanji;
use App\Models\Reading;
use App\Models\Tag;
use App\Models\CommonWord;
use App\Models\UncommonWord;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;
use Maatwebsite\Excel\Facades\Excel;

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
            'readings' => '',
        ]);

        $kanji = new Kanji();
        $this->saveKanji($kanji, $request);

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
     */
    public function edit($symbol)
    {
        $kanji = Kanji::where('symbol', $symbol)->with('tags', 'readings', 'commonWords', 'uncommonWords')->first();

        if($kanji) {
            return view('pages.kanji.edit')->with(
                ['kanji' => $kanji]
            );
        } else {
            return redirect('/');
            //return redirect()->back()->withErrors(['msg' => 'Kanji not found']);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     */
    public function update(Request $request, $symbol)
    {

        $request->validate([
            'meaning' => '',
            'readings' => ''
        ]);

        $kanji = Kanji::where('symbol', $symbol)->first();

        if($kanji) {
            $this->saveKanji($kanji, $request);
        }


        return redirect('/kanji/edit/' . $request->symbol);
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

    private function saveKanji($kanji, $request) {

        $kanji->symbol = $request->symbol;
        $kanji->on_meaning = $request->onmeaning;
        $kanji->kun_meaning = $request->kunmeaning;
        $kanji->mnemonic = $request->mnemonic;

        $kanji->save();

        $kanji->readings()->detach();
        $kanji->commonWords()->detach();
        $kanji->uncommonWords()->detach();
        $kanji->tags()->detach();

        $readings = array_filter(explode(',', $request->readings));
        $commonWords = array_filter(explode(',', $request->commonwords));
        $uncommonWords = array_filter(explode(',', $request->uncommonwords));
        $tags = array_filter(explode(',', $request->tags));

        foreach ($readings as $reading) {
            $existingReading = Reading::where('reading', $reading)->first();

            if($existingReading) {
                $kanji->readings()->attach($existingReading);
            } else {
                $existingReading = new Reading();
                $existingReading->reading = $reading;
                $existingReading->save();
                $kanji->readings()->save($existingReading);
            }
        }

        foreach ($commonWords as $commonWord) {
            $existingWord = CommonWord::where('word', $commonWord)->first();

            if($existingWord) {
                $kanji->commonWords()->attach($existingWord);
            } else {
                $existingWord = new CommonWord();
                $existingWord->word = $commonWord;
                $existingWord->save();
                $kanji->commonWords()->save($existingWord);
            }
        }

        foreach ($uncommonWords as $uncommonWord) {
            $existingWord = UncommonWord::where('word', $uncommonWord)->first();

            if($existingWord) {
                $kanji->uncommonWords()->attach($existingWord);
            } else {
                $existingWord = new UncommonWord();
                $existingWord->word = $uncommonWord;
                $existingWord->save();
                $kanji->uncommonWords()->save($existingWord);
            }
        }

        foreach ($tags as $tag) {
            $existingTag = Tag::where('name', $tag)->first();

            if($existingTag) {
                $kanji->tags()->attach($existingTag);
            } else {
                $existingTag = new Tag();
                $existingTag->name = $tag;
                $existingTag->save();
                $kanji->tags()->save($existingTag);
            }
        }
    }
}

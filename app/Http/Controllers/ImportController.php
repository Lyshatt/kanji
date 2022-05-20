<?php

namespace App\Http\Controllers;

use App\Imports\KanjiImport;
use App\Models\Kanji;
use App\Models\Word;
use Illuminate\Http\Request;
use App\Spiders\JishoKanjiSpider;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Facades\Excel;
use RoachPHP\Roach;

class ImportController extends Controller
{
    public function index() {
        Roach::startSpider(JishoKanjiSpider::class);
    }

    public function importCsv()
    {
        Excel::import(new KanjiImport, Storage::path('Kanji_20220519_205706.csv'));
    }

    public function importFronJisho()
    {
        $allKanji = Kanji::all();

        $i = 1;
        foreach ($allKanji as $kanji) {
            var_dump($i);
            $i++;

            // response is now an array with two entries, the first one being meta, the 2nd one being actual data
            $response = Http::get('https://jisho.org/api/v1/search/words?keyword=' . $kanji->symbol)->json();

            if($response['meta']['status'] === 200) {
                foreach ($response['data'] as $keyWordDataEntry) {

                    // I only want common entries where the word includes the kanji (sometimes only a variant is present, which I don't want)
                    if(array_key_exists('is_common', $keyWordDataEntry) && $keyWordDataEntry['is_common'] && str_contains($keyWordDataEntry['japanese'][0]['word'], $kanji->symbol)) {

                        $existingWord = Word::where('word', $keyWordDataEntry['japanese'][0]['word'])->first();
                        if($existingWord) {
                            $kanji->words()->attach($existingWord);
                        } else {
                            $word = new Word();
                            $word->word = $keyWordDataEntry['japanese'][0]['word'];
                            $word->reading = $keyWordDataEntry['japanese'][0]['reading'];
                            $word->meaning = implode(', ', $keyWordDataEntry['senses'][0]['english_definitions']);
                            $kanji->words()->save($word);
                        }
                    }
                }
            }
        }
    }
}

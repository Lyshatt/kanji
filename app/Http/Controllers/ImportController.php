<?php

namespace App\Http\Controllers;

use App\CsvImports\KanjiImport;
use App\Models\Kanji;
use App\Models\Tag;
use App\Models\CommonWord;
use App\Models\UncommonWord;
use Illuminate\Http\Request;
use App\Spiders\JishoKanjiSpider;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Facades\Excel;
use RoachPHP\Roach;

class ImportController extends Controller
{

    // This can import thorough scraping websites. It is not in use right now
    public function index() {
        Roach::startSpider(JishoKanjiSpider::class);
    }

    public function importCsv()
    {
        Excel::import(new KanjiImport, Storage::path('Kanji_20220519_205706.csv'));
    }

    public function importFronJisho()
    {
        $allKanji = Kanji::where('is_fully_imported', false)->get();

        $i = 1;
        foreach ($allKanji as $kanji) {
            echo 'Kanji ' .$i . ' (' . $kanji->symbol . '): ';
            $i++;

            // response is now an array with two entries, the first one being meta, the 2nd one being actual data
            $response = Http::get('https://jisho.org/api/v1/search/words?keyword=' . $kanji->symbol)->json();

            if($response['meta']['status'] === 200) {
                foreach ($response['data'] as $keyWordDataEntry) {

                    // I only want common entries where the word includes the kanji (sometimes only a variant is present, which I don't want)
                    if(array_key_exists('is_common', $keyWordDataEntry)
                        && array_key_exists('word', $keyWordDataEntry['japanese'][0])
                        && str_contains($keyWordDataEntry['japanese'][0]['word'], $kanji->symbol)) {
                        echo '[' .$keyWordDataEntry['japanese'][0]['word'] . '] ';

                        if($keyWordDataEntry['is_common']) {
                            $existingWord = CommonWord::where('word', $keyWordDataEntry['japanese'][0]['word'])->first();
                            if($existingWord) {
                                $kanji->commonWords()->attach($existingWord);
                            } else {
                                $word = new CommonWord();
                                $word->word = $keyWordDataEntry['japanese'][0]['word'];
                                $word->reading = $keyWordDataEntry['japanese'][0]['reading'];
                                $word->meaning = implode(', ', $keyWordDataEntry['senses'][0]['english_definitions']);
                                $kanji->commonWords()->save($word);
                            }
                        } else {
                            $existingWord = UncommonWord::where('word', $keyWordDataEntry['japanese'][0]['word'])->first();
                            if($existingWord) {
                                $kanji->uncommonWords()->attach($existingWord);
                            } else {
                                $word = new UncommonWord();
                                $word->word = $keyWordDataEntry['japanese'][0]['word'];
                                $word->reading = $keyWordDataEntry['japanese'][0]['reading'];
                                $word->meaning = implode(', ', $keyWordDataEntry['senses'][0]['english_definitions']);
                                $kanji->uncommonWords()->save($word);
                            }
                        }
                    }
                }
            }
            $kanji->is_fully_imported = true;
            $kanji->save();
            print "\xA";
        }
    }

    public  function importTags() {
        $kanjiByTags = [
            'Lesson 1' => [],
            'Lesson 2' => [],
            'Lesson 3' => [],
            'Lesson 4' => [],
            'Lesson 5' => [],
            'Lesson 6' => [],
            'Lesson 7' => [],
            'Lesson 8' => [],
            'Lesson 9' => [],
            'Lesson 10' => [],
            'Lesson 11' => [],
            'Lesson 12' => [],
            'Lesson 13' => [],
            'Lesson 14' => [],
            'Lesson 15' => [],
            'Lesson 16' => [],
            'Lesson 17' => [],
            'Lesson 18' => [],
            'Lesson 19' => [],
            'Lesson 20' => [],
            'Lesson 21' => [],
            'Lesson 22' => [],
            'Lesson 23' => [],
            'Lesson 24' => [],
            'Lesson 25' => [],
            'Lesson 26' => [],
            'Lesson 27' => [],
            'Lesson 28' => [],
            'Lesson 29' => [],
            'Lesson 30' => [],
            'Lesson 31' => [],
            'Lesson 32' => [],
            'Lesson 33' => [],
            'Lesson 34' => [],
            'Lesson 35' => [],
            'Lesson 36' => [],
            'Lesson 37' => [],
            'Lesson 38' => [],
            'Lesson 39' => [],
            'Lesson 40' => [],
            'Lesson 41' => [],
            'Lesson 42' => [],
            'Lesson 43' => [],
            'Lesson 44' => [],
            'Lesson 45' => [],
            'Lesson 46' => [],
            'Lesson 47' => [],
            'Lesson 48' => [],
            'Lesson 49' => [],
            'Lesson 50' => ['由', '油', '界', '異', '港', '温', '在', '存', ],
            'Lesson 51' => ['育', '流', '暖', '援', '緩', '媛', '姫', '好', '以', '能', '態', '熊'],
        ];

        foreach ($kanjiByTags as $tagName => $kanjiArray) {
            if(sizeof($kanjiArray) > 0) {
                $tag = Tag::where('name', $tagName)->first();
                if(!$tag) {
                    $tag = new Tag();
                    $tag->name = $tagName;
                    $tag->save();
                }

                foreach ($kanjiArray as $kanji) {
                    $kanji = Kanji::where('symbol', $kanji)->first();

                    if($kanji) {
                        $kanji->tags()->attach($tag);
                    }
                }

            }
        }
    }
}

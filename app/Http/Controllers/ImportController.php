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
            'Lesson 1' => ['言','語','話','読','誰'],
            'Lesson 2' => ['主','住','全','会','合','答'],
            'Lesson 3' => ['物','家','発','族','旅','週'],
            'Lesson 4' => ['来','未','味','末','夫','楽'],
            'Lesson 5' => ['市','姉','妹','婦','帰'],
            'Lesson 6' => ['食','良','飲','飯','館','友'],
            'Lesson 7' => ['屋','昼','毎','海','元','光'],
            'Lesson 8' => ['書','筆','事','仕','任'],
            'Lesson 9' => ['立','泣','新','部','音','暗'],
            'Lesson 10' => ['力','切','勉','晩','風','強'],
            'Lesson 11' => ['社','神','祖','買','員'],
            'Lesson 12' => ['雨','雪','雲','曇','雷','電'],
            'Lesson 13' => ['車','東','束','朝','動','働'],
            'Lesson 14' => ['者','都','暑','空','青','晴'],
            'Lesson 15' => ['門','間','簡','開','閉'],
            'Lesson 16' => ['問','関','取','聞','聴'],
            'Lesson 17' => ['糸','続','約','終','絵','級'],
            'Lesson 18' => ['紙','特','持','待','使','便'],
            'Lesson 19' => ['心','性','忙','忘','思','意','億'],
            'Lesson 20' => ['悪','想','恋','変','愛','悲'],
            'Lesson 21' => ['情','徳','必','秘','恥'],
            'Lesson 22' => ['感','惑','志','窓','息','憩'],
            'Lesson 23' => ['起','超','趣','知','痴','病'],
            'Lesson 24' => ['夕','多','名','外','夜','死'],
            'Lesson 25' => ['何','可','回','同','歌','次'],
            'Lesson 26' => ['首','道','導','寝','番','勇','節','季','春','夏','秋','冬'],
            'Lesson 27' => ['無','米','料','理','客','様','予','野','菜','果','肉','魚','皿','箸'],
            'Lesson 28' => ['頭','顔','題','頂','原','願','頃','自','己','介','紹','最','当'],
            'Lesson 29' => ['違','近','遠','園','所','場','古','苦','居','店','若','有'],
            'Lesson 30' => ['結','婚','嫁','郎','妻','奥','兄','弟','親','娘','婿','伯','叔'],
            'Lesson 31' => ['信','早','速','遅','送','受','高','低','長','短','広','狭'],
            'Lesson 32' => ['鳥','島','然','地','池','他','山','出','谷','林','森','湖','川','田'],
            'Lesson 33' => ['遊','勝','負','敗','幸','運','申','用','午','牛','生','星'],
            'Lesson 34' => ['沢','訳','説','馬','駅','教','始','止','正','活','民','眠'],
            'Lesson 35' => ['央','映','英','面','画','両','満','犬','猫','描','先','洗'],
            'Lesson 36' => ['単','戦','弾','常','堂','覚','付','村','符','的','明','服'],
            'Lesson 37' => ['争','浄','清','静','角','解','色','茶','赤','緑','黒','白','黄'],
            'Lesson 38' => ['美','実','業','卒','僕','俺','注','羊','洋','和','利','別'],
            'Lesson 39' => ['成','城','誠','盛','盟','益','俗','欲','浴','少','歩','省'],
            'Lesson 40' => ['重','軽','転','官','館','管','学','字','文','交','校','公'],
            'Lesson 41' => ['式','試','我','義','儀','議','弓','引','張','矢','医','疾'],
            'Lesson 42' => ['去','法','行','街','術','衝','石','工','周','案','位','倍'],
            'Lesson 43' => ['竹','笑','等','売','寒','塞','品','平','天','里','作','昨'],
            'Lesson 44' => ['衣','表','裏','制','製','初','点','毛','礼','札','相','戸'],
            'Lesson 45' => ['数','類','漢','難','務','霧','列','裂','系','紫','素','麦'],
            'Lesson 46' => ['命','令','冷','零','霜','震','株','各','格','通','路','露'],
            'Lesson 47' => ['度','席','渡','共','供','選','化','種','傘','草'],
            'Lesson 48' => ['区','丁','郡','県','州','京','虫','独','触','貝'],
            'Lesson 49' => ['羽','習','翌','弱','世','葉','宅','宿','局','労','協','故'],
            'Lesson 50' => ['由','油','界','異','港','温','在','存',],
            'Lesson 51' => ['育','流','暖','援','緩','媛','姫','好','以','能','態','熊'],
            'Lesson 52' => ['決','快','隣','舞','踊','夢','急','科','失','支','伎','代'],
            'Lesson 53' => ['商','産','示','祝','祭','禁','歴','価','要','票','標','漂'],
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

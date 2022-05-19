<?php

namespace App\Imports;

use App\Models\Kanji;
use Maatwebsite\Excel\Concerns\ToModel;

class KanjiImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Kanji([
            'symbol' => $row[1],
            'meaning' => $row[14]
        ]);
    }
}

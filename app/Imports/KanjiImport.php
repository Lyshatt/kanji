<?php

namespace App\Imports;

use App\Models\Kanji;
use App\Models\Reading;
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
        $kanji = new Kanji([
            'symbol' => $row[1],
            'on_meaning' => $row[14],
            'kun_meaning' => $row[19]
        ]);

        $kanji->save();

        $readings = array_filter(explode('、', trim($row[8])));

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

        return $kanji;

    }
}

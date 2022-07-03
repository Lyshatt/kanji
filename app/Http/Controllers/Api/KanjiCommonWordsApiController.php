<?php

namespace App\Http\Controllers\Api;

use App\Models\Kanji;
use Orion\Http\Controllers\RelationController;
use Orion\Concerns\DisableAuthorization;

class KanjiCommonWordsApiController extends RelationController
{
    use DisableAuthorization;

    /**
     * Fully-qualified model class name
     */
    protected $model = Kanji::class;

    /**
     * Name of the relationship as it is defined on the Post model
     */
    protected $relation = 'commonWords';
}

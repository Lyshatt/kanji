<?php

namespace App\Http\Controllers\Api;

use App\Models\Kanji;
use Orion\Http\Controllers\Controller;
use Orion\Concerns\DisableAuthorization;

class KanjiApiController extends Controller
{
    use DisableAuthorization;

    protected $model = Kanji::class;


    public function alwaysIncludes() : array
    {
        return ['readings'];
    }


    public function searchableBy(): array {
        return ['symbol', 'on_meaning', 'kun_meaning'];
    }

    public function filterableBy(): array
    {
        return ['symbol', 'on_meaning', 'kun_meaning'];
    }

    public function sortableBy(): array
    {
        return ['created_at'];
    }

    public function exposedScopes(): array
    {
        return ['fullyImported'];
    }
}

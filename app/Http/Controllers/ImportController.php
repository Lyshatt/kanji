<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Spiders\JishoKanjiSpider;
use RoachPHP\Roach;

class ImportController extends Controller
{
    public function index() {
        Roach::startSpider(JishoKanjiSpider::class);
    }
}

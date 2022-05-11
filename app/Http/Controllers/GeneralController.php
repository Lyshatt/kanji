<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use Illuminate\Http\Request;

class GeneralController extends Controller
{
    /**
     * Display the landing page
     *
     */
    public function index()
    {
        $tags = Tag::all();

        return view('pages.index')->with(
            ['tags' => $tags]
        );
    }
}

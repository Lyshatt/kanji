<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GeneralController extends Controller
{
    /**
     * Display the landing page
     *
     */
    public function index()
    {
        return view('pages.index');
    }
}

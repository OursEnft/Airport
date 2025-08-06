<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Faq extends Controller
{
    public function index()
    {
        return view('faq');
    }
}

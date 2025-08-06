<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Mentions extends Controller
{
    public function index()
    {
        return view('mentions');
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BusTaxisController extends Controller
{
    public function index()
    {
        return view('bustaxis');
    }
}

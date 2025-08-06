<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DestinationsController extends Controller
{
    public function index()
    {
        return view('destinations');
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ConfidentialiteController extends Controller
{
    public function index()
    {
        return view('confidentialite');
    }
}

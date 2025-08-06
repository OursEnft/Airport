<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LocalisationController extends Controller
{
    public function index()
    {
        return view('localisation');
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AssistanceController extends Controller
{
    public function index()
    {
        return view('assistance');  // Renders the "accueil" view
    }
}

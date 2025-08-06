<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ObjetRetrouveController extends Controller
{
    public function index()
    {
        return view('objetretrouve');  // Renders the "accueil" view
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ReserverController extends Controller
{
    public function index()
    {
        return view('reserver');  // Renders the "accueil" view
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ConnexionController extends Controller
{
    public function index()
    {
        return view('connexion');  // Renders the "connexion" view
    }
}

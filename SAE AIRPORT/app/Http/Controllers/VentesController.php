<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class VentesController extends Controller
{
    public function index()
    {
        return view('ventes');
    }
}

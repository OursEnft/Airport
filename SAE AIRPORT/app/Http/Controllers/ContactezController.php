<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContactezController extends Controller
{
    public function index()
    {
        return view('contactez');
    }
}

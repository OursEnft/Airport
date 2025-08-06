<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class AirlineController extends Controller
{
    public function index()
    {
        // Récupérer les compagnies aériennes via une requête brute
        $airlines = DB::table('airlines')
            ->orderBy('airline_name')
            ->get();

        // Retourner la vue avec les données
        return view('airlines', compact('airlines'));
    }
}

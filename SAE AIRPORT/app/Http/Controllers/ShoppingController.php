<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ShoppingController extends Controller
{
    public function index()
    {
        // Récupérer les magasins via une requête brute
        $stores = DB::table('stores')
            ->orderBy('store_name')
            ->get();

        // Retourner la vue avec les données
        return view('shopping', compact('stores'));
    }
}

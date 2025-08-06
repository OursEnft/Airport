<?php

namespace App\Http\Controllers;

use App\Models\Vol;
use App\Models\Compagnie;
use Illuminate\Http\Request;

class VolController extends Controller
{
    public function rechercher(Request $request)
    {
        // Validation des données (facultatif, mais recommandé)
        $validated = $request->validate([
            'depart' => 'required|string|max:255',
            'destination' => 'required|string|max:255',
            'date' => 'required|date',
            'compagnie' => 'nullable|exists:compagnies,id',
        ]);

        // Recherche des vols selon les critères
        $vols = Vol::query();

        if ($request->filled('depart')) {
            $vols->where('depart', 'like', '%' . $request->depart . '%');
        }

        if ($request->filled('destination')) {
            $vols->where('destination', 'like', '%' . $request->destination . '%');
        }

        if ($request->filled('date')) {
            $vols->whereDate('date', $request->date);
        }

        if ($request->filled('compagnie')) {
            $vols->where('compagnie_id', $request->compagnie);
        }

        // Récupérer les résultats de la recherche
        $vols = $vols->get();

        // Renvoyer la vue avec les résultats
        return view('vols.resultats', compact('vols'));
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Flight;
use App\Models\Airport;
use Illuminate\Support\Facades\DB;

class DepartArriveeController extends Controller
{
    // Méthode pour afficher la page d'accueil (avec ou sans résultats)
    public function index(Request $request)
    {
        // Récupération des paramètres de recherche
        $origin = $request->input('origin'); // Aéroport de départ
        $destination = $request->input('destination'); // Aéroport de destination
        $flight_number = $request->input('flight_number'); // Numéro de vol
        $date = $request->input('date'); // Date de départ
        $flight_status = $request->input('flight_status'); // Statut du vol

        // Si aucun critère n'est spécifié, on retourne une vue avec un formulaire vide
        $flights = collect(); // Initialise un ensemble de résultats vide
        if ($origin || $destination || $flight_number || $date || $flight_status) {
            // Construction de la requête
            $query = Flight::query();

            if ($origin) {
                if ($origin === 'Aéroport de Provence')
                    $origin = 'Fréjus';
                $query->where('origin', 'LIKE', "%{$origin}%");
            }
            if ($destination) {
                if ($destination === 'Aéroport de Provence')
                    $destination = 'Fréjus';
                $query->where('destination', 'LIKE', "%{$destination}%");
            }
            if ($flight_number) {
                $query->where('flight_number', 'LIKE', "%{$flight_number}%");
            }
            if ($date) {
                $query->whereDate('departure_time', $date); // Filtre basé sur la date de départ
            }
            if ($flight_status) {
                $query->where('flight_status', $flight_status); // Filtre basé sur le statut
            }

            $flights = $query->get(); // Exécute la requête et récupère les résultats
        }

        // Récupération des compagnies aériennes triées par ordre alphabétique
        $airlines = DB::table('airlines')
            ->select('airline_name')
            ->orderBy('airline_name', 'asc')
            ->get();

        $airports = DB::table('airports')
            ->select('airport_name')
            ->orderBy('airport_name', 'asc')
            ->get();

        // Retourne les résultats et la liste des compagnies à la vue
        return view('departarrivee', compact('flights', 'airlines', 'airports'));
    }
}

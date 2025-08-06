<?php

namespace App\Http\Controllers;
use App\Models\Flight;
use Illuminate\Http\Request;

class TicketsController extends Controller
{
    public function search(Request $request)
    {
        // Valider les critères de recherche
        $validated = $request->validate([
            'origin' => 'nullable|string',
            'destination' => 'nullable|string',
            'departure_date' => 'nullable|date',
            'status' => 'nullable|string',
        ]);

        // Construire la requête
        $query = Flight::query();

        if (!empty($validated['origin'])) {
            $query->where('origin', 'like', '%' . $validated['origin'] . '%');
        }

        if (!empty($validated['destination'])) {
            $query->where('destination', 'like', '%' . $validated['destination'] . '%');
        }

        if (!empty($validated['departure_date'])) {
            $query->whereDate('departure_time', '=', $validated['departure_date']);
        }

        if (!empty($validated['status'])) {
            $query->where('flight_status', '=', $validated['status']);
        }

        // Récupérer les résultats
        $flights = $query->get();

        // Retourner les résultats à une vue
        return view('tickets', compact('flights'));
    }
}

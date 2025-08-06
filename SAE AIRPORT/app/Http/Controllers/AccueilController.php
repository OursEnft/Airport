<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Flight;
use Illuminate\Support\Facades\DB;

class AccueilController extends Controller
{
    public function index()
    {
        $flights_depart = DB::table('flights')
            ->join('details', 'flights.flight_id', '=', 'details.id_flight')
            ->join('aircrafts', 'details.id_aircraft', '=', 'aircrafts.aircraft_id')
            ->join('airlines', 'aircrafts.id_airline', '=', 'airlines.airline_id')
            ->select(
                'flights.flight_number',
                'flights.origin',
                'flights.destination',
                'flights.departure_time',
                'flights.arrival_time',
                'flights.flight_status',
                'airlines.airline_name as company'
            )
            ->where('flights.origin', 'Fréjus')
            ->orderBy('flights.departure_time', 'asc')
            ->take(10)
            ->get();

        $flights_arrive = DB::table('flights')
            ->join('details', 'flights.flight_id', '=', 'details.id_flight')
            ->join('aircrafts', 'details.id_aircraft', '=', 'aircrafts.aircraft_id')
            ->join('airlines', 'aircrafts.id_airline', '=', 'airlines.airline_id')
            ->select(
                'flights.flight_number',
                'flights.origin',
                'flights.destination',
                'flights.departure_time',
                'flights.arrival_time',
                'flights.flight_status',
                'airlines.airline_name as company'
            )
            ->where('flights.destination', 'Fréjus')
            ->orderBy('arrival_time', 'asc')
            ->take(10)
            ->get();

        $news = DB::table('news')
            ->select('title',
                'description',
                'url_image',
                'published_date',
                'news_status')
            ->get();

        return view('accueil',  compact('flights_depart', 'flights_arrive', 'news'));  // Renders the "accueil" view
    }
}

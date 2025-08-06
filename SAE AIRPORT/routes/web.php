<?php

use App\Http\Controllers\AccueilController;
use App\Http\Controllers\AssistanceController;
use App\Http\Controllers\BusTaxisController;
use App\Http\Controllers\CguController;
use App\Http\Controllers\ConfidentialiteController;
use App\Http\Controllers\ContactezController;
use App\Http\Controllers\DestinationsController;
use App\Http\Controllers\FaqController;
use App\Http\Controllers\InfosController;
use App\Http\Controllers\InscriptionController;
use App\Http\Controllers\ConnexionController;
use App\Http\Controllers\LocalisationController;
use App\Http\Controllers\MentionsController;
use App\Http\Controllers\ObjetRetrouveController;
use App\Http\Controllers\ParkingController;
use App\Http\Controllers\PassController;
use App\Http\Controllers\PanierController;
use App\Http\Controllers\ReserverController;
use App\Http\Controllers\ShoppingController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VeloMotoController;
use App\Http\Controllers\VentesController;
use App\Http\Controllers\VoitureController;
use App\Http\Controllers\AirlineController;
use App\Http\Controllers\DepartArriveeController;
use App\Http\Controllers\TicketsController;
use Illuminate\Support\Facades\Route;


// Changement de langue
Route::get('/lang/{locale}', function ($locale) {
    // Stocke la langue choisie dans la session
    session(['locale' => $locale]);

    // Redirige l'utilisateur vers la page précédente ou la page d'accueil
    return redirect()->back();
})->name('lang.switch');

// Page d'accueil
Route::get('/accueil', [AccueilController::class, 'index'])->name('accueil');

// Page inscription
Route::get('/inscription', [InscriptionController::class, 'index'])->name('inscription');

// Page connexion
Route::get('/connexion', [ConnexionController::class, 'index'])->name('connexion');

// Interface utilisateur
Route::get('/user', [UserController::class, 'index'])->name('user');

// Page pass
Route::get('/pass', [PassController::class, 'index'])->name('pass');

// Page panier
Route::get('/panier', [PanierController::class, 'index'])->name('panier');

// Page vol

Route::get('/vol/compagnies', [AirlineController::class, 'index'])->name('airlines');

Route::get('/vol/departs-arrivees', [DepartArriveeController::class, 'index'])->name('departarrrivee');
Route::get('/vol/departs-arrivees/search-flights', [DepartArriveeController::class, 'index'])->name('flights.search');

Route::get('/vol/destinations', [DestinationsController::class, 'index'])->name('destinations');

// Pages Accès
Route::get('/acces/localisation', [LocalisationController::class, 'index'])->name('localisation');
Route::get('/acces/voiture', [VoitureController::class, 'index'])->name('voiture');
Route::get('/acces/velo-moto', [VeloMotoController::class, 'index'])->name('velomoto');
Route::get('/acces/bus-taxi', [BusTaxisController::class, 'index'])->name('bustaxis');

// Page Parking
Route::get('/parking', [ParkingController::class, 'index'])->name('parking');

// Pages Services
Route::get('/services/assistance', [AssistanceController::class, 'index'])->name('assistance');
Route::get('/services/objets-trouves', [ObjetRetrouveController::class, 'index'])->name('objetretrouve');

//Page Shopping
Route::get('/shopping', [ShoppingController::class, 'index'])->name('shopping');

//Page Infos Pratiques
Route::get('/infos', [InfosController::class, 'index'])->name('infos');

//Page Réserver
Route::get('/reserver', [ReserverController::class, 'index'])->name('reserver');

// Page VentesController
Route::get('/ventes', [VentesController::class, 'index'])->name('ventes');

// Page Confidentialité
Route::get('/confidentialite', [ConfidentialiteController::class, 'index'])->name('confidentialite');

// Page ContactezController
Route::get('/contactez', [ContactezController::class, 'index'])->name('contactez');

// Page FAQ
Route::get('/faq', [FaqController::class, 'index'])->name('faq');

// Page MentionsController
Route::get('/mentions', [MentionsController::class, 'index'])->name('mentions');

// Page CguController
Route::get('/cgu', [CguController::class, 'index'])->name('cgu');

Route::get('/vol/recherche', [TicketsController::class, 'search'])->name('tickets.search');

// Page par défaut (redirection vers la page d'accueil)
Route::get('/', function () {
    return redirect()->route('accueil');
});

// Ajoute ici d'autres routes selon ton besoin

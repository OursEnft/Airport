@extends('layout')

@section('content')
    <div class="row" id="flights">
        <div class="col-2"></div>
        <div class="col-5" id="divtitre">
            <h3 class="titre" id="titrepage">Résultats des vols</h3>
            <p>Trouvez ici les vols disponibles selon vos critères de recherche.</p>
        </div>
        <div class="col-4" id="divpicto">
            <img id="picto" src="{{ asset('media/img/pictovol.png') }}" alt="Pictogramme Vols">
        </div>
    </div>

    <div id="containerflights">
        @if ($flights->isEmpty())
            <p class="text-muted">Aucun vol trouvé pour les critères donnés.</p>
        @else
            <h3 id="titreflights">Liste des vols</h3>
            @foreach ($flights as $flight)
                <div class="flight" data-flight="{{ htmlspecialchars($flight->flight_number) }}">
                    <!-- Section Logo (exemple : ajouter un avion ou un pictogramme générique) -->
                    <div class="section-logo">
                        <img src="{{ asset('media/img/flight-icon.png') }}" alt="Flight Icon">
                    </div>
                    <!-- Section Informations -->
                    <div class="section-infos">
                        <h3>{{ htmlspecialchars($flight->flight_number) }}</h3>
                        <p><strong>Origine :</strong> {{ htmlspecialchars($flight->origin) }}</p>
                        <p><strong>Destination :</strong> {{ htmlspecialchars($flight->destination) }}</p>
                        <p><strong>Départ :</strong> {{ \Carbon\Carbon::parse($flight->departure_time)->format('d M Y, H:i') }}</p>
                        <p><strong>Arrivée :</strong> {{ \Carbon\Carbon::parse($flight->arrival_time)->format('d M Y, H:i') }}</p>
                        <p><strong>Statut :</strong>
                            <span class="{{ $flight->flight_status === 'On Time' ? 'status-on-time' : ($flight->flight_status === 'Delayed' ? 'status-delayed' : 'status-cancelled') }}">
                                {{ htmlspecialchars($flight->flight_status) }}
                            </span>
                        </p>
                        <p><strong>Places disponibles :</strong> {{ htmlspecialchars($flight->total_avaible_seats) }}</p>
                    </div>
                    <!-- Section Lien -->
                    <div class="section-link">
                        <a href="" class="btn btn-primary">Voir les détails</a>
                    </div>
                </div>
            @endforeach
        @endif
    </div>
@endsection

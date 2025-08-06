@extends('layout')

@section('content')
    <div class="row" id="compagnies">
        <div class="col-2">

        </div>
        <div class="col-5" id="divtitre">
            <h3 class="titre" id="titrepage">Compagnies Aériennes</h3>
            <p>Retrouvez ici toutes les informations pratiques concernant nos compagnies aériennes qui assurent des vols réguliers depuis Fréjus.</p>
        </div>
        <div class="col-4" id="divpicto">
            <img id="picto" src="{{ asset('media/img/pictocompagnies.png') }}" alt="Pictogramme">
        </div>
    </div>


    <div id="containercompagnie">
        <div class="search-container">
            <h3 id="titrecompagnies">Nos compagnies</h3>
            <input type="text" placeholder="Rechercher une compagnie..." id="searchBar">
        </div>

        @foreach ($airlines as $airline)
            <div class="airline" data-name="{{ htmlspecialchars($airline->airline_name) }}">
                <!-- Section logo -->
                <div class="section-logo">
                    <img src="{{ htmlspecialchars($airline->airline_url_logo) }}" alt="{{ htmlspecialchars($airline->airline_name) }}">
                </div>
                <!-- Section informations -->
                <div class="section-infos">
                    <h3>{{ htmlspecialchars($airline->airline_name) }}</h3>
                    <p>Code IATA : {{ htmlspecialchars($airline->iata_airline_code) }}</p>
                    <p>Téléphone : {{ htmlspecialchars($airline->airline_phone) }}</p>
                    <p>Pays d'origine : {{ htmlspecialchars($airline->country) }}</p>
                </div>
                <!-- Section lien -->
                <div class="section-link">
                    <a href="{{ htmlspecialchars($airline->airline_url_website) }}" target="_blank">Voir le site internet</a>
                </div>
            </div>
        @endforeach
    </div>
@endsection

@section('scripts')
    <script>
        document.getElementById("searchBar").addEventListener("input", function() {
            var searchQuery = this.value.toLowerCase();
            var airlines = document.querySelectorAll(".airline");

            airlines.forEach(function(airline) {
                var airlineName = airline.getAttribute("data-name").toLowerCase();

                if (airlineName.includes(searchQuery)) {
                    airline.style.display = "flex";  // Afficher l'élément si la recherche correspond
                } else {
                    airline.style.display = "none";  // Masquer l'élément si la recherche ne correspond pas
                }
            });
        });
    </script>
@endsection

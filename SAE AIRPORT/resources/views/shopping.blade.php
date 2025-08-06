@extends('layout')

@section('content')
    <!-- Section d'introduction -->
    <div class="row" id="shopping">
        <div class="col-2"></div>
        <div class="col-5" id="divtitreshopping">
            <h3 class="titre" id="titrepageshopping">Shopping</h3>
            <p>Retrouvez ici toutes nos enseignes partenaires que vous pourrez retrouver en plein coeur de notre aéroport. Vous y trouverez des restaurants et des boutiques en tout genre !</p>
        </div>
        <div class="col-4" id="divpictoshopping">
            <img id="pictoshopping" src="{{ asset('media/img/pictoshopping.png') }}" alt="Pictogramme">
        </div>
    </div>

    <!-- Conteneur principal -->
    <div id="containerenseigne">
        <div class="enseignes-search-container">
            <h3 id="titreenseignes">Nos enseignes</h3>
            <input type="text" placeholder="Rechercher une enseigne..." id="enseignes-searchBar">
        </div>

        <!-- Liste des enseignes -->
        <div class="enseignes-grid-container">
            @foreach ($stores as $store)
                <div class="enseignes-store" data-name="{{ htmlspecialchars($store->store_name) }}">
                    <!-- Section logo -->
                    <div class="enseignes-store-logo">
                        <img src="{{ htmlspecialchars($store->store_url_logo) }}" alt="{{ htmlspecialchars($store->store_name) }}">
                    </div>
                    <!-- Section informations -->
                    <div class="enseignes-store-infos">
                        <h3>{{ htmlspecialchars($store->store_name) }}</h3>
                        <a href="{{ htmlspecialchars($store->store_url_logo) }}" target="_blank">> Plus d'infos</a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        // Barre de recherche interactive
        document.getElementById("enseignes-searchBar").addEventListener("input", function () {
            var searchQuery = this.value.toLowerCase();
            var stores = document.querySelectorAll(".enseignes-store");

            stores.forEach(function (store) {
                var storeName = store.getAttribute("data-name").toLowerCase();

                if (storeName.includes(searchQuery)) {
                    store.style.display = "flex"; // Afficher si la recherche correspond
                } else {
                    store.style.display = "none"; // Masquer si la recherche ne correspond pas
                }
            });
        });
    </script>
@endsection

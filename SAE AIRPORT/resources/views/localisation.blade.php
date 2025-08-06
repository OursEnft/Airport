@extends('layout')

@section('title', 'Localisation')

@section('content')
    <div id="loca-div" class="container my-5">
        <h3 id="titre-loca" class="fw-bold">Notre localisation</h3>
        <p class="text-loca">
            L’aéroport est accessible depuis la départementale <strong>D559</strong> en rejoignant la rue Eugène Joly à Fréjus.<br>
            L’aéroport est au cœur d’un réseau de transport efficace.<br>
            On peut y accéder en voiture, en bus, en vélo, en moto et en taxi.
        </p>
        <p class="text-loca">
            L'itinéraire de votre position à l'adresse :
            <a
                href="javascript:void(0);"
                id="itineraire-link"
                class="text-primary fw-bold"
                onclick="getUserLocation()">
                Rue Eugène Joly, 83600 Fréjus
            </a>
        </p>
        <div id="map" style="height: 500px; width: 100%;"></div>
    </div>
    <!-- Inclure l'API Google Maps avec votre clé API -->
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBy47Qwcllyqi3Ga9gmoaj4JqDbn9VMu-E&callback=initMap" async defer></script>

    <script>
        //GoogleMap interactive
        function initMap() {
            var location = { lat: 43.423604, lng: 6.7341796 }; // Coordonnées de Rue Eugène Joly, 83600 Fréjus
            var map = new google.maps.Map(document.getElementById('map'), {
                zoom: 15,
                center: location
            });
            var marker = new google.maps.Marker({
                position: location,
                map: map,
                title: 'Aéroport de Fréjus'
            });
        }
    </script>

    <script>
        //Itinéraire LocaUser
        function getUserLocation() {
            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(function(position) {
                    var latitude = position.coords.latitude;
                    var longitude = position.coords.longitude;
                    var destination = "Rue+Eug%C3%A8ne+Joly,+83600+Fr%C3%A9jus";

                    var mapsUrl = "https://www.google.com/maps/dir/?api=1&origin=" + latitude + "," + longitude + "&destination=" + destination;

                    window.open(mapsUrl, "_blank");
                }, function(error) {
                    alert("Impossible de récupérer votre position.");
                });
            } else {
                alert("La géolocalisation n'est pas supportée par votre navigateur.");
            }
        }
    </script>
@endsection


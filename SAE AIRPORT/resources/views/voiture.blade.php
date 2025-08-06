@extends('layout')

@section('title', 'Parking voiture')

@section('content')
    <div class="container my-5">
        <table class="table align-middle">
            <tbody>
            <tr>
                <td>
                    <div id="voiture-div">
                        <h1 id="titre-voiture" class="fw-bold">Accès voiture</h1>
                        <p class="text-voiture">
                            L’aéroport est facilement accessible depuis la départementale <strong>D559</strong> en rejoignant la rue Eugène Joly à Fréjus. <br>
                            De nombreux parkings vous sont proposés à l’entrée de l’aéroport ! <br>
                            L’adresse exacte est la suivante : <strong class="adresse">Rue Eugène Joly, 83600 Fréjus</strong>
                        </p>
                    </div>
                </td>
                <td id="td-voiture">
                    <img src="{{ asset('media/img/voituredetou.jpg') }}" alt="voiture" class="img-fluid" style="width: 150px">
                </td>
            </tr>
            </tbody>
        </table>
    </div>

    <div class="container my-5">
        <table class="table">
            <tbody>
            <tr>
                <td class="align-top">
                    <div class="info-box mb-4">
                        <h3>Parkings (<a href="{{ route('parking') }}">P1</a>, <a href="{{ route('parking') }}">P2</a>, <a href="{{ route('parking') }}">P3</a>)</h3>
                        <ul>
                            <li>Couvert</li>
                            <li>Vidéo surveillance</li>
                            <li>Bornes de recharges pour les voitures électriques</li>
                            <li>Stationnement payant</li>
                        </ul>
                    </div>
                    <div class="info-box mb-4">
                        <h3>Parkings VIP (<a href="{{ route('parking') }}">P15S</a>, <a href="{{ route('parking') }}">P16S</a>, <a href="{{ route('parking') }}">P VIP3</a>, <a href="{{ route('parking') }}">P VIP4</a>)</h3>
                        <ul>
                            <li>Couvert</li>
                            <li>Haute sécurité (vidéo surveillance + agents de sécurité)</li>
                            <li>Bornes de recharges pour les voitures électriques</li>
                            <li>Stationnement payant et sous réservation</li>
                        </ul>
                    </div>
                    <div class="info-box">
                        <h3>Drop-off</h3>
                        <p>Dépose minute, seuls les arrêts de 15 minutes sont autorisés.</p>
                    </div>
                </td>
                <td class="align-top">
                    <div class="image-box mb-4">
                        <img src="{{ asset('media/img/parkings_voiture.jpeg') }}" alt="Carte des parkings" class="img-fluid">
                    </div>
                    <div class="image-box">
                        <img src="{{ asset('media/img/parking_velo_moto.png') }}" alt="Carte Drop-off" class="img-fluid">
                    </div>
                </td>
            </tr>
            </tbody>
        </table>
    </div>





@endsection


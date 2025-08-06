@extends('layout')

@section('title', 'Parking Moto / Vélo')

@section('content')
    <div class="container my-5">
        <table class="table align-middle">
            <tbody>
            <tr>
                <td>
                    <div id="moto-div">
                        <h1 id="titre-moto" class="fw-bold">Accès moto / vélo</h1>
                        <p class="text-moto">
                            Les stationnements pour les vélos et les motos sont gratuits ! Nous avons 2 parkings <br>pour les vélos et 2 parkings pour les motos à l’entrée de l’aéroport ! De plus, vous trouverez de <br>nombreuses pistes cyclables qui vous mèneront directement à notre aéroport comme la piste cyclable V65 <br>(Piste cyclable du Littoral) ou encore la piste cyclable de Saint-Aygulf à Fréjus.
                        </p>
                    </div>
                </td>
                <td id="td-moto">
                    <div class="moto-images">
                        <img src="{{ asset('media/img/motodetou.png') }}" alt="Moto" class="img-fluid moto-img2">
                        <p>/</p>
                        <img src="{{ asset('media/img/velodetou.png') }}" alt="Velo" class="img-fluid moto-img2">
                    </div>
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
                        <h3 class="hover-effect">
                            Parkings (
                            <a href="{{ route('parking') }}" class="parking-link" data-hover-img="motodetou.png" data-original-img="motodetoublanc.png">
                                P <img src="{{ asset('media/img/motodetoublanc.png') }}" alt="Moto" class="img-fluid moto-img">
                            </a>
                            , <a href="{{ route('parking') }}" class="parking-link" data-hover-img="velodetou.png" data-original-img="velodetoublanc.png">
                                P <img src="{{ asset('media/img/velodetoublanc.png') }}" alt="Velo" class="img-fluid moto-img">
                            </a>
                            )
                        </h3>

                        <ul>
                            <li>Non couverts</li>
                            <li>Sécurisés</li>
                            <li>Stationnement gratuit</li>
                            <li>Bornes de recharges pour les vélos électriques</li>

                        </ul>
                    </div>
                    <div class="info-box mb-4">
                        <h3 class="h3-moto">Parkings (<a href="{{ route('parking') }}" class="a-moto">P15S</a>, <a href="{{ route('parking') }}" class="a-moto">P16S</a>)</h3>
                        <ul>
                            <li>Couverts</li>
                            <li>Sécurisé</li>
                            <li>Bornes de recharges pour les vélos électriques</li>
                            <li>Stationnement payant</li>
                        </ul>
                    </div>
                </td>
                <td class="align-top">
                    <div class="image-box">
                        <img src="{{ asset('media/img/parking_velo_moto.png') }}" alt="Carte Drop-off" class="img-fluid">
                    </div>
                </td>
            </tr>
            </tbody>
        </table>
    </div>
    <script>
        document.querySelector('.hover-effect').addEventListener('mouseover', function() {
            const links = this.querySelectorAll('.parking-link');
            links.forEach(link => {
                const img = link.querySelector('img');
                const hoverSrc = link.getAttribute('data-hover-img');
                img.src = `{{ asset('media/img/') }}/${hoverSrc}`;
            });
        });

        document.querySelector('.hover-effect').addEventListener('mouseout', function() {
            const links = this.querySelectorAll('.parking-link');
            links.forEach(link => {
                const img = link.querySelector('img');
                const originalSrc = link.getAttribute('data-original-img');
                img.src = `{{ asset('media/img/') }}/${originalSrc}`;
            });
        });

    </script>




@endsection


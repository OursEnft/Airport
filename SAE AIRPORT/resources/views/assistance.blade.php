@extends('layout')

@section('title', 'Assistance')

@section('content')

    <div class="assistance-category">
        <div>
            <h2 class="title-category-assistance">Assistance parking</h2>
            <p>Pour toutes questions au sujet de l’un des parkings de l’aéroport, veuillez contacter le numéro suivant : <span class="phone-number">3481</span></p>
        </div>
        <div>
            <img class="pictogramme-assitance" src="{{ asset('media/img/pictogramme_parking_voiture.png') }}" alt="Pictogramme parking">
        </div>
    </div>

    <div>
        <div>
            <h2 class="title-category-assistance">Assistance boutiques/restaurants</h2>
            <p>Pour toutes questions au sujet de l’un des restaurants ou l’une des boutiques de l’aéroport, veuillez contacter le numéro suivant : <span class="phone-number">3482</span></p>
        </div>
        <div>
            <img src="{{ asset('media/img/pictogramme_couverts_restaurant.png') }}" alt="Pictogramme couvert restaurant">
            <img src="{{ asset('media/img/pictogramme_sacs_magasins.png') }}" alt="Pictogramme sacs shopping">

        </div>
    </div>

    <div>
        <div>
            <h2 class="title-category-assistance">Assistance aéroport</h2>
            <p>Pour toutes autres questions au sujet de quoique ce soit sur l’aéroport, veuillez contacter le numéro suivant : <span class="phone-number">3480</span></p>
        </div>
        <div>
            <img src="{{ asset('media/img/pictogramme_decollage_avion.png') }}" alt="Pictogramme avion qui decolle">
        </div>
    </div>

@endsection

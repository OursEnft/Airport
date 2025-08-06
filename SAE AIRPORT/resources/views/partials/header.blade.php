<header>
    <div class="container">
        <div class="row align-items-center">
            <!-- Colonne gauche : Logo -->
            <div class="col-lg-6 d-flex align-items-center">
                <a href="/" class="navbar-brand d-flex align-items-center">
                    <img id="logo" src="{{ asset('media/img/logo.png') }}" alt="logo aéroport">
                    <span class="ms-2 fs-4">Aéroport de Provence</span>
                </a>
            </div>

            <!-- Colonne droite : Menu d'icônes + Menu secondaire -->
            <div class="col-lg-6">
                <div class="d-flex justify-content-end align-items-center mb-2">
                    <a href="/pass" class="me-3">
                        <img id="pass" src="{{ asset('media/img/provence_pass.png') }}" alt="Provence Pass">
                    </a>
                    <a href="/connexion" class="me-3">
                        <img id="user" src="{{ asset('media/img/user.webp') }}" alt="Bouton connexion">
                    </a>
                    <a href="/panier" class="me-3">
                        <img id="panier" src="{{ asset('media/img/panier.png') }}" alt="Bouton shopping">
                    </a>
                    <span class="separator mx-3"></span>
                    <div class="d-flex align-items-center position-relative">
                        <img id="drapeau" src="{{ asset('media/img/drapeau' . app()->getLocale() . 'header.png') }}" alt="Langue actuelle">
                        <span class="ms-2 text-uppercase">{{ app()->getLocale() }}</span>
                        <ul class="dropdown-menu-lang">
                            <li data-lang="FR" data-drapeau="{{ asset('media/img/drapeaufrheader.png') }}">
                                <a href="locale/fr" class="dropdown-item">
                                    FR
                                </a>
                            </li>
                            <li data-lang="EN" data-drapeau="{{ asset('media/img/drapeauenheader.png') }}">
                                <a href="locale/en" class="dropdown-item">
                                    EN
                                </a>
                            </li>
                            <li data-lang="ES" data-drapeau="{{ asset('media/img/drapeauesheader.png') }}">
                                <a href="locale/es" class="dropdown-item">
                                    ES
                                </a>
                            </li>
                        </ul>
                    </div>

                </div>
                <!-- Ligne de séparation -->
                <hr class="divider my-1">

                <!-- Menu secondaire -->
                <div class="menu-secondaire">
                    <ul class="nav nav-pills justify-content-end align-items-center d-flex">
                        <li class="nav-item dropdown">
                            <a href="/vol" class="nav-link btn-nav dropdown-toggle" data-bs-toggle="dropdown">@lang('header.vol')</a>
                            <ul class="dropdown-menu">
                                <li><a href="vol/departs-arrivees" class="dropdown-item">@lang('header.departures_arrivals')</a></li>
                                <li><a href="vol/destinations" class="dropdown-item">@lang('header.destinations')</a></li>
                                <li><a href="vol/compagnies" class="dropdown-item">@lang('header.airlines')</a></li>
                                <li><a href="vol/entempsreel" class="dropdown-item">@lang('header.real_time_flights')</a></li>
                            </ul>
                        </li>
                        <li class="nav-item dropdown">
                            <a href="/acces" class="nav-link btn-nav dropdown-toggle" data-bs-toggle="dropdown">@lang('header.access')</a>
                            <ul class="dropdown-menu">
                                <li><a href="acces/localisation" class="dropdown-item">@lang('header.location')</a></li>
                                <li><a href="acces/voiture" class="dropdown-item">@lang('header.by_car')</a></li>
                                <li><a href="acces/velo-moto" class="dropdown-item">@lang('header.by_bike_motorcycle')</a></li>
                                <li><a href="acces/bus-taxi" class="dropdown-item">@lang('header.bus_taxi')</a></li>
                            </ul>
                        </li>
                        <li class="nav-item"><a href="/parking" class="nav-link btn-nav">@lang('header.parking')</a></li>
                        <li class="nav-item dropdown">
                            <a href="/services" class="nav-link btn-nav dropdown-toggle" data-bs-toggle="dropdown">@lang('header.services')</a>
                            <ul class="dropdown-menu">
                                <li><a href="services/lounge-espaces-vip" class="dropdown-item">@lang('header.vip_lounge')</a></li>
                                <li><a href="services/assistance" class="dropdown-item">@lang('header.assistance')</a></li>
                                <li><a href="services/objets-trouves" class="dropdown-item">@lang('header.lost_and_found')</a></li>
                            </ul>
                        </li>
                        <li class="nav-item"><a href="/shopping" class="nav-link btn-nav">@lang('header.shopping')</a></li>
                        <li class="nav-item"><a href="/infos" class="nav-link btn-nav">@lang('header.practical_info')</a></li>
                        <li class="nav-item"><a href="/reserver" class="nav-link btn-nav">@lang('header.reserve')</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</header>



<script>
    document.addEventListener("DOMContentLoaded", () => {
        const dropdownItems = document.querySelectorAll(".dropdown-menu-lang li");
        const drapeauImg = document.getElementById("drapeau");
        const langSpan = drapeauImg.nextElementSibling;

        dropdownItems.forEach(item => {
            item.addEventListener("click", () => {
                const selectedLang = item.getAttribute("data-lang");
                const selectedDrapeau = item.getAttribute("data-drapeau");

                // Mettre à jour le drapeau et le texte
                drapeauImg.src = selectedDrapeau;
                langSpan.textContent = selectedLang;
            });
        });
    });
</script>



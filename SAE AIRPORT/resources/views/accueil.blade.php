@extends('layout')

@section('title', 'Page d\'accueil')

@section('content')
    <div id="container1" class="position-relative">
        <!-- Image de fond -->
        <img id="aeroport_accueil" src="{{ asset('media/img/aeroport_accueil.jpg') }}" alt="image aéroport">

        <!-- Contenu superposé -->
        <div class="position-absolute top-50 start-50 translate-middle w-100">
            <div class="container py-5">
                <div class="card p-4 shadow-sm bg-light">
                    <!-- Onglets Vols / Parkings -->
                    <ul class="nav nav-tabs justify-content-left mb-4">
                        <li class="nav-item">
                            <a class="nav-link active" href="javascript:void(0)" id="vols-tab" onclick="toggleTab('vols', event, 'container1')">✈ Vols</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="javascript:void(0)" id="parking-tab" onclick="toggleTab('parking', event, 'container1')">🅿 Parkings</a>
                        </li>
                    </ul>
                    <!-- Formulaire de recherche -->
                    <div id="vols-form" class="tab-content">
                        <form method="GET" action="{{ route('tickets.search') }}">
                            <div class="row g-3 align-items-center position-relative">
                                <!-- Champ Départ -->
                                <div class="col-md-3">
                                    <label for="searchdepart" class="form-label">Aéroport de départ</label>
                                    <input type="text" class="form-control modern-input" id="searchdepart" name="origin" placeholder="Aéroport de départ" value="{{ old('origin', 'Aéroport de Provence') }}" oninput="searchItems('searchdepart', 'resultsdepart')">
                                    <div class="results" id="resultsdepart"></div>
                                </div>
                                <!-- Bouton Swap -->
                                <div class="col-md-1 d-flex justify-content-center align-items-end">
                                    <button type="button" class="swap-btn" onclick="swapText()">&#x21c4;</button>
                                </div>
                                <!-- Champ Destination -->
                                <div class="col-md-3">
                                    <label for="searchdest" class="form-label">Aéroport d'arrivée</label>
                                    <input type="text" class="form-control modern-input" id="searchdest" name="destination" placeholder="Aéroport de destination" value="{{ old('destination') }}" oninput="searchItems('searchdest', 'resultsdest')">
                                    <div class="results" id="resultsdest"></div>
                                </div>
                                <!-- Date et Horaire -->
                                <div class="col-md-3">
                                    <label for="datetime" class="form-label">Date et Horaire</label>
                                    <input type="datetime-local" id="datetime" name="datetime" class="form-control modern-input" value="{{ old('datetime') }}">
                                </div>
                                <!-- Nombre de Passagers -->
                                <div class="col-md-2">
                                    <label for="passengers" class="form-label">Passagers</label>
                                    <select id="passengers" name="passengers" class="form-select modern-input">
                                        <option value="1" selected>1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                        <option value="5">5</option>
                                        <option value="6">6</option>
                                    </select>
                                </div>
                            </div>
                            <!-- Bouton Rechercher -->
                            <div class="text-end mt-4">
                                <button type="submit" class="btn btn-primary px-4">Rechercher</button>
                            </div>
                        </form>
                    </div>
                    <div id="parking-form" class="tab-content d-none">
                        <form class="d-flex align-items-center flex-wrap gap-3" method="GET">
                            <div class="form-group mb-0">
                                <input type="datetime-local" id="datetimeentree" name="datetime" class="form-control modern-input">
                            </div>


                            <div class="form-group mb-0">
                                <input type="datetime-local" id="datetimesortie" name="datetime" class="form-control modern-input">
                            </div>

                            <div class="form-group mb-0">
                                <select id="idvehicule" name="vehicule" class="form-control">
                                    <option value="1">Voiture</option>
                                    <option value="2">Moto</option>
                                    <option value="3">Vélo</option>
                                </select>
                            </div>

                            <div class="form-group mb-0">
                                <input type="text" id="idimmat" name="immat" class="form-control" placeholder="Immatriculation">
                            </div>



                            <!-- Bouton Rechercher -->
                            <div class="form-group mb-0">
                                <button class="btn btn-primary px-4 mt-3 mt-md-0" type="submit">Réserver</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container mt-5">
        <div class="row">
            <!-- Colonne gauche : Témoignages -->
            <div class="custom-testimonials col-md-6 text-center">
                <h2 class="custom-testimonials-title">Voyagez en tout confort !</h2>
                <div class="custom-testimonials-container">
                    <div class="image-container">
                        <img class="front-image" src="{{ asset('media/img/recto_provence_pass_accueil.png') }}" alt="provence pass recto">
                        <img class="back-image" src="{{ asset('media/img/verso_provence_pass_accueil.png') }}" alt="provence pass verso">
                    </div>
                    <a href="/pass" class="btn-decouvrir">Découvrir</a>
                </div>
            </div>

            <!-- Colonne droite : Tableau des vols -->
            <div id="container2" class="custom-flight-table col-md-6">
                <div class="card p-4 shadow-sm bg-light custom-shadow">
                    <h3 class="custom-flight-title">Vols en temps réel</h3>
                    <ul class="nav nav-tabs justify-content-end mb-4">
                        <li class="nav-item">
                            <a class="nav-link active" href="javascript:void(0)" id="decollage-tab" onclick="toggleTab('decollage', event, 'container2')">✈ Départs</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="javascript:void(0)" id="atterissage-tab" onclick="toggleTab('atterissage', event, 'container2')"><span class="rotation">✈</span> Arrivées</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/vol/departs-arrivees" id="recherche">&#128269;</a>
                        </li>
                    </ul>
                    <div id="decollage-form" class="tab-content">
                        @if ($flights_depart->isNotEmpty())
                            <table class="custom-table table table-bordered table-striped">
                                <thead class="custom-table-head thead-dark">
                                <tr>
                                    <th scope="col">N° Vol</th>
                                    <th scope="col">Départ</th>
                                    <th scope="col">Compagnie</th>
                                    <th scope="col">Destination</th>
                                    <th scope="col">Statut</th>
                                    <th scope="col">Prévision</th>
                                </tr>
                                </thead>
                                <tbody>
                            @foreach ($flights_depart as $flight)
                            <tr>
                                <td>{{ $flight->flight_number }}</td>
                                <td>{{ $flight->origin }}</td>
                                <td>{{ $flight->company }}</td>
                                <td>{{ $flight->destination }}</td>
                                <td>{{ $flight->flight_status }}</td>
                                <td>{{ $flight->departure_time }}</td>
                            </tr>
                            @endforeach
                            </tbody>
                        </table>
                        @else
                            <p class="text-center">Aucun vols en cours.</p>
                        @endif
                    </div>
                    <div id="atterissage-form" class="tab-content d-none">
                        @if ($flights_arrive->isNotEmpty())
                            <table class="custom-table table table-bordered table-striped">
                                <thead class="custom-table-head thead-dark">
                                <tr>
                                    <th scope="col">N° Vol</th>
                                    <th scope="col">Départ</th>
                                    <th scope="col">Compagnie</th>
                                    <th scope="col">Destination</th>
                                    <th scope="col">Statut</th>
                                    <th scope="col">Prévision</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach ($flights_arrive as $flight)
                                    <tr>
                                        <td>{{ $flight->flight_number }}</td>
                                        <td>{{ $flight->origin }}</td>
                                        <td>{{ $flight->company }}</td>
                                        <td>{{ $flight->destination }}</td>
                                        <td>{{ $flight->flight_status }}</td>
                                        <td>{{ $flight->departure_time }}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        @else
                            <p class="text-center">Aucun vols en cours.</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container mt-5">
        <!-- Section Carrousel -->
        <div id="newsCarousel" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                @php
                    $activeClass = 'active'; // première slide active
                @endphp

                @foreach($news as $newsItem)
                    <div class="carousel-item {{ $activeClass }}">
                        <img src="{{ asset('media/img/' . $newsItem->url_image) }}" class="d-block w-100" alt="{{ $newsItem->title }}">
                        <div class="carousel-caption d-none d-md-block">
                            <h5>{{ $newsItem->title }}</h5>
                            <p>{{ $newsItem->description }}</p>
                            <small>{{ \Carbon\Carbon::parse($newsItem->published_date)->format('d/m/Y') }}</small>
                        </div>
                    </div>
                    @php
                        $activeClass = ''; // après la première, les autres ne sont plus actives par défaut
                    @endphp
                @endforeach
            </div>

            <!-- Contrôles du Carrousel -->
            <button class="carousel-control-prev" type="button" data-bs-target="#newsCarousel" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Précédent</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#newsCarousel" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Suivant</span>
            </button>
        </div>

        <!-- Section Services -->
        <div class="services mt-5">
            <!-- Titre principal -->
            <h2>Services et commodités</h2>

            <!-- Liste des services -->
            <div class="service-list">
                <div class="service-item">
                    <img src="{{ asset('media/img/logo_wifi.png')}}" alt="Wi-Fi gratuit">
                    <h4>Wi-Fi gratuit</h4>
                    <p>Connexion haut débit dans tout l’aéroport pour rester connecté.</p>
                </div>
                <div class="service-item">
                    <img src="{{ asset('media/img/picto_resto.png')}}" alt="Restauration">
                    <h4>Restauration</h4>
                    <p>Large choix de restaurants, cafés et bars pour tous les goûts.</p>
                </div>
                <div class="service-item">
                    <img src="{{ asset('media/img/picto_shopping.png')}}" alt="Boutiques">
                    <h4>Boutiques</h4>
                    <p>Duty-free et magasins variés pour vos achats de dernière minute.</p>
                </div>
                <div class="service-item">
                    <img src="{{ asset('media/img/logo_lounge.png')}}" alt="Zones de repos">
                    <h4>Zones de repos</h4>
                    <p>Espaces calmes et confortables pour se détendre entre les vols.</p>
                </div>
            </div>
        </div>

    </div>

    <script>

        function toggleTab(tabName, event, containerId) {
            event.preventDefault(); // Empêche le comportement par défaut du lien

            // Obtenez les éléments du conteneur correspondant
            const container = document.getElementById(containerId);
            const tabs = container.querySelectorAll(".tab-content");
            const navLinks = container.querySelectorAll(".nav-link");

            // Masquez tout le contenu des onglets
            tabs.forEach(tab => tab.classList.add("d-none"));

            // Désactivez tous les onglets actifs
            navLinks.forEach(link => link.classList.remove("active"));

            // Affichez le contenu de l'onglet sélectionné
            const selectedTab = container.querySelector(`#${tabName}-form`);
            if (selectedTab) {
                selectedTab.classList.remove("d-none");
            }

            // Activez le lien de navigation correspondant
            const selectedLink = container.querySelector(`#${tabName}-tab`);
            if (selectedLink) {
                selectedLink.classList.add("active");
            }
        }



        function swapText() {
            const textbox1 = document.getElementById('searchdepart');
            const textbox2 = document.getElementById('searchdest');
            const temp = textbox1.value;
            textbox1.value = textbox2.value;
            textbox2.value = temp;

            checkAndDisableTextboxes();
        }

        function searchItems(inputId, resultsId) {
            const query = document.getElementById(inputId).value.toLowerCase();
            const resultsDiv = document.getElementById(resultsId);
            resultsDiv.innerHTML = '';

            if (query) {
                const filteredData = data.filter(item => item.toLowerCase().includes(query));
                filteredData.forEach(item => {
                    const div = document.createElement('div');
                    div.textContent = item;
                    div.className = 'result-item';
                    div.onclick = () => selectItem(item, inputId);
                    resultsDiv.appendChild(div);
                });

                resultsDiv.style.display = filteredData.length > 0 ? 'block' : 'none';
            } else {
                resultsDiv.style.display = 'none';
            }

            checkAndDisableTextboxes();
        }

        function selectItem(item, inputId) {
            document.getElementById(inputId).value = item;
            const resultsDiv = document.getElementById(inputId === 'searchdepart' ? 'resultsdepart' : 'resultsdest');
            resultsDiv.style.display = 'none';

            checkAndDisableTextboxes();
        }

        function checkAndDisableTextboxes() {
            const textbox1 = document.getElementById('searchdepart');
            const textbox2 = document.getElementById('searchdest');

            textbox1.disabled = textbox1.value === "Aéroport de Provence";
            textbox2.disabled = textbox2.value === "Aéroport de Provence";
        }

        document.getElementById('searchdepart').addEventListener('input', checkAndDisableTextboxes);
        document.getElementById('searchdest').addEventListener('input', checkAndDisableTextboxes);

        checkAndDisableTextboxes();
    </script>
@endsection


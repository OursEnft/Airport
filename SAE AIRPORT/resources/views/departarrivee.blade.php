@extends('layout')

@section('title', 'Départs et Arrivées')

@section('content')
    <div class="container mt-4">
        <!-- Titre principal -->
        <div class="row justify-content-center mb-4">
            <div class="col-md-8 text-center">
                <h2 class="titre">Suivre les vols de l'aéroport de Provence</h2>
            </div>
        </div>

        <!-- Formulaire de recherche -->
        <div class="row justify-content-center">
            <div class="col-md-12">
                <form class="d-flex align-items-center flex-wrap justify-content-center gap-3" method="GET" action="{{ route('flights.search') }}">
                    <!-- Champ Départ -->
                    <div class="form-group mb-0">
                        <input type="text" id="searchdepart" name="origin" class="form-control" placeholder="Aéroport de départ" value="{{ old('origin', 'Aéroport de Provence') }}" oninput="searchItems('searchdepart', 'resultsdepart')">
                        <div class="results" id="resultsdepart"></div>
                    </div>

                    <!-- Bouton Swap -->
                    <div class="form-group mb-0 d-flex align-items-end">
                        <button type="button" class="btn btn-outline-primary mb-2" onclick="swapText()">↔</button>
                    </div>

                    <!-- Champ Destination -->
                    <div class="form-group mb-0">
                        <input type="text" id="searchdest" name="destination" class="form-control" placeholder="Aéroport de destination" value="{{ old('destination') }}" oninput="searchItems('searchdest', 'resultsdest')">
                        <div class="results" id="resultsdest"></div>
                    </div>

                    <!-- Compagnie -->
                    <div class="form-group mb-0">
                        <select id="idcompagnie" name="compagnie" class="form-control">
                            <option value="">Compagnie</option>
                            @foreach ($airlines as $airline)
                                <option value="{{ htmlspecialchars($airline->airline_name) }}" {{ old('airline') == $airline->airline_name ? 'selected' : '' }}>
                                    {{ htmlspecialchars($airline->airline_name) }}
                                </option>
                            @endforeach
                            <option value="other">Autre</option>
                        </select>
                    </div>

                    <!-- Numéro de vol -->
                    <div class="form-group mb-0">
                        <input type="text" id="idnumvol" name="flight_number" class="form-control" placeholder="Numéro de vol" value="{{ old('flight_number') }}">
                    </div>

                    <!-- Date -->
                    <div class="form-group mb-0">
                        <input type="date" id="iddate" name="date" class="form-control" value="{{ old('date') }}">
                    </div>

                    <!-- Horaire -->
                    <div class="form-group mb-0">
                        <select id="idhoraire" name="horaire" class="form-control">
                            <option value="1" {{ old('horaire') == '1' ? 'selected' : '' }}>00:00 - 6:00</option>
                            <option value="2" {{ old('horaire') == '2' ? 'selected' : '' }}>06:00 - 12:00</option>
                            <option value="3" {{ old('horaire') == '3' ? 'selected' : '' }}>12:00 - 18:00</option>
                            <option value="4" {{ old('horaire') == '4' ? 'selected' : '' }}>18:00 - 23:59</option>
                        </select>
                    </div>

                    <!-- Bouton Rechercher -->
                    <div class="form-group mb-0">
                        <button class="btn btn-primary px-4 mt-3 mt-md-0" type="submit">Rechercher</button>
                    </div>
                </form>
            </div>
        </div>

        <!-- Résultats de recherche -->
        <div class="row justify-content-center mt-5">
            <div class="col-md-12">
                @if ($flights->isNotEmpty())
                    <h4 class="mb-3">Résultats de recherche</h4>
                    <table class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Numéro de vol</th>
                            <th>Départ</th>
                            <th>Destination</th>
                            <th>Heure de départ</th>
                            <th>Heure d'arrivée</th>
                            <th>Places disponibles</th>
                            <th>Statut</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($flights as $flight)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $flight->flight_number }}</td>
                                <td>{{ $flight->origin }}</td>
                                <td>{{ $flight->destination }}</td>
                                <td>{{ $flight->departure_time }}</td>
                                <td>{{ $flight->arrival_time }}</td>
                                <td>{{ $flight->total_avaible_seats }}</td>
                                <td>{{ $flight->flight_status }}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                @else
                    <p class="text-center">Aucun vol correspondant aux critères de recherche.</p>
                @endif
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        function decodeHTML(html) {
            const textarea = document.createElement('textarea');
            textarea.innerHTML = html;
            return textarea.value;
        }

        function swapText() {
            const textbox1 = document.getElementById('searchdepart');
            const textbox2 = document.getElementById('searchdest');
            const temp = textbox1.value;
            textbox1.value = textbox2.value;
            textbox2.value = temp;

            checkAndDisableTextboxes();
        }

        const data = [
            @foreach ($airports as $airport)
                "{{ htmlspecialchars($airport->airport_name) }}",
            @endforeach
        ];

        function searchItems(inputId, resultsId) {
            const query = document.getElementById(inputId).value.toLowerCase();
            const resultsDiv = document.getElementById(resultsId);

            resultsDiv.innerHTML = '';

            if (query) {
                const filteredData = data.filter(item =>
                    item.toLowerCase().includes(query)
                );

                filteredData.forEach(item => {
                    const div = document.createElement('div');
                    div.textContent = decodeHTML(item);
                    div.className = 'result-item';
                    div.onclick = () => selectItem(item, inputId);
                    resultsDiv.appendChild(div);
                });

                resultsDiv.style.display = filteredData.length > 0 ? 'block' : 'none';
            } else {
                resultsDiv.style.display = 'none';
            }
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

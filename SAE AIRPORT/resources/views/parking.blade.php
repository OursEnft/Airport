@extends('layout')

@section('content')

    <div id="parkingspage">
        <div class="row" id="infosetresa">
            <div class="col-2">

            </div>
            <div class="col-8" id="divtitre">
                <h3 class="titre">Réservation de parking</h3>
                <p>L’ensemble des informations concernant les spécifités des parkings ou encore leur emplacement dans l’aéroport sont détaillés dans l’item “Accès”.</p>
                <div id="resa">
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


        <div class="row" id="tarifs">
            <div class="col-2">

            </div>
            <div class="col-5" id="parkingtarifs">
                <h3 class="titre">Tarifs</h3>
                <table>
                    <thead>
                    <tr>
                        <th>Type de Véhicule</th>
                        <th>Parking Gratuit</th>
                        <th>Parking Couvert</th>
                        <th>Parking VIP (Haute Sécurité)</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>Vélo</td>
                        <td>Gratuit, non couvert</td>
                        <td>2€/jour</td>
                        <td>/</td>
                    </tr>
                    <tr>
                        <td>Moto</td>
                        <td>Gratuit, non couvert</td>
                        <td>3€/jour</td>
                        <td>/</td>
                    </tr>
                    <tr>
                        <td>Voiture</td>
                        <td>/</td>
                        <td>10€/jour</td>
                        <td>25€/jour (avec agents de sécurité)</td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <div class="row" id="infos">
            <div class="col-2"></div>
            <div class="col-8" id="parkingtarifs">
                <h3 class="titre">Pourquoi nos parkings ?</h3>
                <p id="iparking">Nous disposons en tout de <b>10 000 places de parking !</b> Voyagez l’esprit léger car <b>tous nos parkings sont surveillés et équipés de caméras</b> afin d’assurer la sécurité de l’ensemble des véhicules dans notre aéroport, <b>24 heures sur 24</b>. De plus, nos parkings sont tous accessibles depuis les terminaux à moins de 10 minutes à pieds.</p>
                <div class="row text-center mt-4" id="pictosparking">
                    <div class="col-md-3">
                        <img src="{{ asset('media/img/pictocamera.png') }}" alt="Vidéo surveillance" class="img-fluid mb-2" style="max-height: 80px;">
                        <h5>Vidéo surveillance</h5>
                        <p>Vidéo surveillance 24/24H</p>
                    </div>
                    <div class="col-md-3">
                        <img src="{{ asset('media/img/pictoprix.png') }}" alt="Prix avantageux" class="img-fluid mb-2" style="max-height: 80px;">
                        <h5>Prix avantageux</h5>
                        <p>Tarifs réduits en réservant en ligne</p>
                    </div>
                    <div class="col-md-3">
                        <img src="{{ asset('media/img/pictoservice.png') }}" alt="Service client" class="img-fluid mb-2" style="max-height: 80px;">
                        <h5>Service client</h5>
                        <p>Service client (<b>3480</b>) disponible de 7h à 21h</p>
                    </div>
                    <div class="col-md-3">
                        <img src="{{ asset('media/img/pictoannulation.png') }}" alt="Annulation gratuite" class="img-fluid mb-2" style="max-height: 80px;">
                        <h5>Annulation gratuite</h5>
                        <p>Annulation gratuite 8h avant la réservation prévue</p>
                    </div>
                </div>
            </div>
        </div>





    </div>




@endsection

@section('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const vehicleSelect = document.getElementById('idvehicule');
            const immatField = document.getElementById('idimmat').parentNode;

            // Fonction pour afficher/masquer le champ "Immatriculation"
            const toggleImmatField = () => {
                if (vehicleSelect.value === '3') { // "3" correspond à Vélo
                    immatField.style.display = 'none';
                } else {
                    immatField.style.display = 'block';
                }
            };

            // Déclenchement au changement du select
            vehicleSelect.addEventListener('change', toggleImmatField);

            // Exécution au chargement de la page
            toggleImmatField();
        });
    </script>
@endsection


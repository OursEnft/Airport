<div class="container" id="containercompagnie">
    <div class="search-container">
        <h2 class="titre" id="titrecompagnies">Nos compagnies</h2>
        <input type="text" placeholder="Rechercher une compagnie..." id="searchBar">
    </div>

    <?php foreach ($compagnies as $airline): ?>
        <!-- Ajout de l'attribut data-name contenant le nom de la compagnie -->
        <div class="airline" data-name="<?= htmlspecialchars($airline['airline_name']); ?>">
            <img src="<?= htmlspecialchars($airline['airline_url_logo']); ?>" alt="<?= htmlspecialchars($airline['airline_name']); ?>">
            <div class="details">
                <h3><?= htmlspecialchars($airline['airline_name']); ?></h3>
                <p>Code IATA : <?= htmlspecialchars($airline['iata_airline_code']); ?></p>
                <p>Téléphone : <?= htmlspecialchars($airline['airline_phone']); ?></p>
                <p>Pays d'origine : <?= htmlspecialchars($airline['country']); ?></p>
            </div>
            <div class="details">
                <a href="<?= htmlspecialchars($airline['airline_url_website']); ?>" target="_blank">Voir le site internet</a>
            </div>
        </div>
    <?php endforeach; ?>
</div>


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

<?php
function compagnies(){

    global $bdd;

    $stmt = $bdd->prepare('SELECT * FROM airlines ORDER BY airline_name');
    $stmt->execute();
    $compagnies = $stmt->fetchAll(PDO::FETCH_ASSOC);

    require_once ('vue/inc/inc.head.php');
    require_once ('vue/inc/inc.header.php');
    require_once ('vue/v-compagnies.php');
    require_once ('vue/inc/inc.footer.php');

}
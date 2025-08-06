<?php
session_start();

date_default_timezone_set("Europe/Paris");

require_once('model/model.php');
require_once('controller/c-accueil.php');
require_once('controller/c-pass.php');
require_once('controller/c-inscription.php');
require_once('controller/c-connexion.php');
require_once('controller/c-panier.php');
require_once('controller/c-vol.php');
require_once('controller/c-acces.php');
require_once('controller/c-parking.php');
require_once('controller/c-services.php');
require_once('controller/c-shopping.php');
require_once('controller/c-infos.php');
require_once('controller/c-reserver.php');
require_once('controller/c-compagnies.php');
/*
require_once('controller/c-actualite.php');
require_once('controller/c-produit.php');

require_once('controller/panier/c-panier.php');

require_once('controller/commande/c-commander.php');

require_once('controller/api/c-apiCommande.php');
require_once('controller/api/c-apilListe.php');
require_once('controller/api/c-apiPaiement.php');
require_once('controller/api/c-paiement.php');
require_once('controller/api/c-paiement_retour.php');
require_once('controller/api/c-paiement_INFO.php');

require_once('controller/api/c-test-api-commande.php');
require_once('controller/c-test-produit.php');

require_once('controller/footer/c-footer.php');
*/

//$monPanier = verifierPanier($_SESSION['idClient']);
/*
if(isset($_GET['page']) && $_GET['page']){
    switch ($_GET['page']){
        case "accueil": accueil(); break;
        case "inscription": inscription(); break;
        case "connexion": connexion(); break;
        case "pass": pass();break;
        case "panier": panier();break;
        case "vol": vol();break;
        case "acces": acces();break;
        case "parking":parking();break;
        case "services":services();break;
        case "shopping":shopping();break;
        case "infos":infos();break;
        case "reserver":reserver();break;
        case "compagnies":compagnies();break;
        default: accueil(); break;
    }
} else accueil();
?>
*/

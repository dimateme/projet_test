<?php
/*****************************************************************************************************************
Nom du programme : afficherAliment.php
Programmeurs : Yvon gosselin
Entreprise : L'EPEE, epee.cegep-rdl.qc.ca
Date :  Février 2022
But : Page qui affiche le détail d'un aliment
******************************************************************************************************************/
// Inclure le fichier de gestion de la configuration
include '../include/configuration.php';
// Connexion a la base de donnees
require_once '../models/connexionBD.php';

// Inclure le manager des ALIMENTS et l'instancier
include '../models/managers/gestionAliment.class.php';
$gestionAliment = new GestionAliment($bdd);
// Inclure la classe associée
include '../models/class/aliment.class.php';

// Inclure le manager des COMMERCES et l'instancier
require_once '../models/managers/gestionCommerce.class.php';
$gestionCommerce = new GestionCommerce($bdd);
// Inclure la classe associée
include '../models/class/commerce.class.php';

// Inclure le manager des CATÉGORIES et l'instancier
require_once '../models/managers/gestionCategorie.class.php';
$gestionCategorie = new GestionCategorie($bdd);
// Inclure la classe associée
include '../models/class/categorie.class.php';

if (!isset($_GET['indice'])) {
    trigger_error('aliment inconnu', E_USER_ERROR);
}
// Retrouvons l'aliment demandée dans la BD
$unAlimentBD = $gestionAliment->obtenirUnAliment($_GET['indice']);
$unAliment = $unAlimentBD->fetch(PDO::FETCH_OBJ);
// Plaçons le résultat dans une instance de la classe (un objet Aliment)
$aliment = new Aliment($_GET['indice']);
$aliment->setNom($unAliment->nom);
$aliment->setDescription($unAliment->description);
$aliment->setQuantite($unAliment->quantite);
$aliment->setDisponibilite($unAliment->disponibilite);
$aliment->setCategorie_id($unAliment->categorie_id);

// Retrouvons sa Catégorie
$uneCategorieBD = $gestionCategorie->obtenirUneCategorie($aliment->getCategorie_id());
$uneCategorie = $uneCategorieBD->fetch(PDO::FETCH_OBJ);

// Retrouvons les commerces associés
$lesCommercesIdBD = $gestionAliment->obtenirLesCommercesAssocies($aliment->getId());

// Appeler le formulaire affichage
include '../views/formulaireAffichage.php';

// Appeler la vue pour l'affichage
include '../views/templatePrincipal.php';
?>
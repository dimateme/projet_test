<?php
/*****************************************************************************************************************
Nom du programme : gererLesAliments.php
Programmeurs : Yvon Gosselin
Entreprise : L'EPEE, epee.cegep-rdl.qc.ca
Date :  Mars 2022
But : Controleur de l'application de commerce électronique de base
Remarque : version de programmation qui évolue
******************************************************************************************************************/
// Inclure le fichier de gestion de la configuration
include '../include/configuration.php';
// Connexion à la base de données
include '../models/connexionBD.php';
// Inclure le gestionnaire des aliments
include '../models/managers/gestionAliment.class.php';

session_start();
if (!isset($_SESSION["usager"]))
{
    header('Location: authentifier.php');
}
$pageTitre = "Connecté en tant que ".$_SESSION["usager"]."<br><br>GESTION des ALIMENTS";

if (!isset($_SESSION)) {
    session_start();
}
if ($_SERVER['REQUEST_METHOD'] == 'POST') 
{
    $_SESSION['postdata'] = $_POST;
    unset($_POST);
    header("Location: ".$_SERVER['PHP_SELF']);
    exit;
}
// Instanciation d'une instance de gestion des aliments pour relations avec la BD
$gestionAliment = new GestionAliment($bdd);
$lesAliments = $gestionAliment->obtenirLesAliments();

// Appeler le formulaire principal
include '../views/formulairePrincipal.php';

// Appeler la vue pour l'affichage
include '../views/templatePrincipal.php';

?>
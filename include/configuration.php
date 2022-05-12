<?php
/*****************************************************************************************************************
Nom du programme : configuration.php
Programmeurs : Yvon Gosselin
Entreprise : L'EPEE, epee.cegep-rdl.qc.ca
Date :  Février 2022
But : Configuration des paramètres de base de l'application
******************************************************************************************************************/
// CONFIGURATION PHP - Personnalisation de la configuration PHP: 
// configuration du fuseau horaire
date_default_timezone_set('America/Toronto');
// Activation des informations d'erreur et affichage à l'écran
ini_set('display_errors', 1);
// Écriture des erreurs dans un fichier logs : php-error.log
ini_set('log_errors', 1);
ini_set("error_log", "php-error.log");
// Choix des types d'erreur concernés : toutes les erreurs
error_reporting(E_ALL);
?>
<?php
/*****************************************************************
Nom du programme : connexionBD.php
Programmeurs : Yvon Gosselin
Entreprise : L'EPEE, epee.cegep-rdl.qc.ca
Date :  Février 2022
But : Permet de se connecter à la BD ecommerce
******************************************************************/
try
{
    $serveur = 'localhost';
    $baseDeDonnees = 'ecommerce';
    $utilisateur = 'root';
    $motDePasse = '';
    
    $bdd = new PDO('mysql:host='.$serveur.';dbname='.$baseDeDonnees.';charset=utf8',
                $utilisateur,
                $motDePasse);
}
catch (Exception $erreur)
{
    die('Erreur est'.$erreur->getMessage());
}
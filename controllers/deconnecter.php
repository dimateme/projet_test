<?php
/*****************************************************************************************************************
Nom du programme : deconnexion.php
Programmeurs : Yvon Gosselin
Entreprise : L'EPEE, epee.cegep-rdl.qc.ca
Date :  Février 2022
But : PGM de déconnexion
******************************************************************************************************************/

session_start();
session_destroy();
if (isset($_SESSION['usager']))
{
    header("Location: authentifier.php");
    exit;
}
?>
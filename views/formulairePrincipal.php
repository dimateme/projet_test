<?php
/*****************************************************************************************************************
Nom du programme : formulairePrincipal.php
Programmeurs : Yvon Gosselin
Entreprise : L'EPEE, epee.cegep-rdl.qc.ca
Date :  Mars 2022
But : Vue principale de l'application
******************************************************************************************************************/
$pageTitre = "Gestion des ALIMENTS";

$pageContenu = "<table>";
while ($unAliment = $lesAliments->fetch(PDO::FETCH_OBJ))
{
    $pageContenu .= "<tr><td class='col-md-3'><a href='afficherUnAliment.php?indice=".$unAliment->id."'>" . $unAliment->nom . "</td>";
    $pageContenu .= "<td class='col-md-3'><a href='modifierUnAliment.php?indice=".$unAliment->id."'><input type='button' value='Modifier' class='btn btn-primary'></a></td></tr>";
}
$pageContenu .=  "</table> <br> <br>";
?>
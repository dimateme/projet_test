<?php
/***************************************************************************
Nom du programme : formulaireAffichage.php
Programmeurs : Yvon Gosselin
Entreprise : L'EPEE, epee.cegep-rdl.qc.ca
Date :  Mars 2022
But : Formulaire pour afficher un aliment
*****************************************************************************/
$pageTitre = $unAliment->nom;

$pageContenu = "<b>TITRE:</b> ".$unAliment->nom.'</br></br>';
$pageContenu .= "<b>Quantité:</b> ".$unAliment->quantite.'</br></br>';
$pageContenu .= "<b>Descrption:</b> ".$unAliment->description.'</br></br>';
$pageContenu .= "<b>Catégorie:</b> ".$uneCategorie->categorie.'</br></br>';
$pageContenu .= "<b>Commerces associés:</b> ".'</br>';

foreach($lesCommercesIdBD as $unCommerceID)
{
    $unCommerceBD = $gestionCommerce->obtenirUnCommerce($unCommerceID["commerce_id"]);
    $unCommerce = $unCommerceBD->fetch(PDO::FETCH_OBJ);
    $pageContenu .= $unCommerce->commerce.'</br>';
}
?>
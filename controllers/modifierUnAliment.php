<?php
/*****************************************************************************************************************
Nom du programme : modifierAliment.php
Programmeurs : Yvon gosselin
Entreprise : L'EPEE, epee.cegep-rdl.qc.ca
Date :  Février 2022
But : Page qui modifie un aliment
******************************************************************************************************************/
// Inclure le fichier de gestion de la configuration
include '../include/configuration.php';
// Connexion a la base de donnees
require_once '../models/connexionBD.php';

// Acces au manager de la table ALIMENT
require_once '../models/managers/gestionAliment.class.php';
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

if (!isset($_POST['action']))
{
    // On récupère les infos passées en GET
    $id = $_GET['indice'];
}
else
{
    // Récupérons les données
    $aliment = new Aliment;
    $aliment->setId($_POST['id']);
    $aliment->setNom($_POST['nom']);
    $aliment->setDescription($_POST['description']);
    $aliment->setQuantite($_POST['quantite']);
    $aliment->setDisponibilite($_POST['disponibilite']);
    $aliment->setCategorie_id($_POST['categorie']);
    $gestionAliment->modifierUnAliment($aliment);
    // Enlevons les anciens liens ALIMENTS-COMMERCES
    $gestionAliment->enleverCommercesAssocies($aliment->getId());
    // Ajoutons les commerces
    $lesCommercesID = $_POST['commerces'];
    // Utilisons notre objet COMMERCE pour ajouter dans la table de lien
    $commerce = new Commerce;
    foreach($lesCommercesID as $unCommerceID)
    {
        $commerce->setId($unCommerceID);
        $gestionAliment->associerUnCommerce($aliment, $commerce);
    }
    $id = $aliment->getId();
}

// Retrouvons l'aliment dans la BD
$unAlimentBD = $gestionAliment->obtenirUnAliment($id);
$unAliment = $unAlimentBD->fetch(PDO::FETCH_OBJ);

// Retrouvons sa Catégorie
$categorie_id = $unAliment->categorie_id;
$saCategorieBD = $gestionCategorie->obtenirUneCategorie($categorie_id);
$saCategorie = $saCategorieBD->fetch(PDO::FETCH_OBJ);

// On aura besoin de toutes les catégories pour affichage
$lesCategoriesBD = $gestionCategorie->obtenirLesCategories();
// Transfert dans un tableau PHP
$lesCategories = [];
while ($uneCategorie = $lesCategoriesBD->fetch(PDO::FETCH_OBJ))
{
    array_push($lesCategories, 
        [
            "id"=>$uneCategorie->id,
            "categorie"=>$uneCategorie->categorie
        ]);
}
// On aura besoin de tous les commerces pour affichage
$lesCommercesBD = $gestionCommerce->obtenirLesCommerces();
// Transfert dans un tableau PHP
$lesCommerces = [];
while ($unCommerce = $lesCommercesBD->fetch(PDO::FETCH_OBJ))
{
    array_push($lesCommerces, 
        [
            "id"=>$unCommerce->id,
            "commerce"=>$unCommerce->commerce
        ]);
}
// Appeler le formulaire modification
include '../views/formulaireModification.php';

// Appeler la vue pour l'affichage
include '../views/templatePrincipal.php';
?>
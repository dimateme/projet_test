<?php
/*****************************************************************************************************************
Nom du programme : ajouterUnAliment.php
Programmeurs : Yvon Gosselin'
Entreprise : L'EPEE, epee.cegep-rdl.qc.ca
Date :  Mars 2022
But : Ajouter un aliment.
******************************************************************************************************************/
// Inclure le fichier de gestion de la configuration
include '../include/configuration.php';
// Connexion à la base de données
include '../models/connexionBD.php';

// Inclure le manager des aliments et l'instancier
include '../models/managers/gestionAliment.class.php';
$gestionAliment = new GestionAliment($bdd);
// Inclure la classe associée
include '../models/class/aliment.class.php';

// Inclure le manager des commerces et l'instancier
require_once '../models/managers/gestionCommerce.class.php';
$gestionCommerce = new GestionCommerce($bdd);
// Inclure la classe associée
include '../models/class/commerce.class.php';

// Inclure le manager des catégories et l'instancier
require_once '../models/managers/gestionCategorie.class.php';
$gestionCategorie = new GestionCategorie($bdd);

if ((isset($_POST['action'])) && ($_POST['action'] === "AJOUT_ALIMENT"))
{
    // Récupérons les données dans un objet Aliment
    $aliment = new Aliment;
    $aliment->setNom($_POST['nom']);
    $aliment->setDescription($_POST['description']);
    $aliment->setQuantite((int)$_POST['quantite']);
    $aliment->setDisponibilite((int)$_POST['disponibilite']);
    $aliment->setCategorie_id((int)$_POST['categorie_id']);
    $gestionAliment->ajouterUnAliment($aliment);
    // Ajoutons les commerces
    $lesCommercesID = $_POST['commerces'];
    $dernierIdAliment = $gestionAliment->recupererDernierIdAliment($bdd);
    $aliment->setId($dernierIdAliment);
    // Utilisons notre objet Commerce pour garder le ID courant
    $commerce = new Commerce;
    foreach($lesCommercesID as $unCommerceID)
    {
        $commerce->setId($unCommerceID);
        $gestionAliment->associerUnCommerce($aliment, $commerce);
    }
}

// Aller chercher toutes les catégories
$lesCategoriesBD = $gestionCategorie->obtenirLesCategories();
$lesCategories = [];        // Transfert dans un tableau PHP pour l'affichage
while ($uneCategorie = $lesCategoriesBD->fetch(PDO::FETCH_OBJ))
{
    array_push($lesCategories, 
        [
            "id"=>$uneCategorie->id,
            "categorie"=>$uneCategorie->categorie
        ]);
}

// Aller chercher tous les commerces
$lesCommercesBD = $gestionCommerce->obtenirLesCommerces();
$lesCommerces = [];         // Transfert dans un tableau PHP pour l'affichage
while ($unCommerce = $lesCommercesBD->fetch(PDO::FETCH_OBJ))
{
    array_push($lesCommerces, 
        [
            "id"=>$unCommerce->id,
            "commerce"=>$unCommerce->commerce
        ]);
}

// Appeler le formulaire ajout
include '../views/formulaireAjout.php';

// Appeler la vue pour l'affichage
include '../views/templatePrincipal.php';
?>
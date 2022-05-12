<?php 
class GestionCommerce 
{ 
    private $db; // Instance de PDO
        
    public function __construct($bdd)
    {
        $this->setDb($bdd);
    }

    public function setDb(PDO $bdd)
    {
        $this->bdd = $bdd;
    }
    // Recuperation de toutes les catégories de la table categorie de la BD 
    function obtenirLesCommerces()
    {
        $req = $this->bdd->query('SELECT * FROM commerce');
        return $req;
    }
    // Recuperation d'un commerce correspondant au ID 
    function obtenirUnCommerce($commerce_id)
    {
        $unCommerceBD = $this->bdd->query('SELECT * FROM commerce WHERE id = '.$commerce_id);
        return $unCommerceBD;
    }
} 
?>
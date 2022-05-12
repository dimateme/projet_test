<?php 
class GestionCategorie 
{ 
    private $bdd; // Instance de PDO
        
    public function __construct($bdd)
    {
        $this->setDb($bdd);
    }

    public function setDb(PDO $bdd)
    {
        $this->bdd = $bdd;
    }
    // Recuperation de toutes les catégories de la table categorie de la BD 
    function obtenirLesCategories()
    {
        $req = $this->bdd->query('SELECT * FROM categorie');
        return $req;
    }
    // Recuperation d'une catégorie correspondant au ID 
    function obtenirUneCategorie($categorie_id)
    {
        $uneCategorieBD = $this->bdd->query('SELECT * FROM categorie WHERE id = '.$categorie_id);
        return $uneCategorieBD;
    }
} 
?>
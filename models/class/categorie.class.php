<?php 
/*****************************************************************
Nom du programme : categorie.class.php
Programmeurs : Yvon Gosselin
Entreprise : L'EPEE, epee.cegep-rdl.qc.ca
Date :  Mars 2022
But : La classe CATEGORIE qui contiendra une catégorie
******************************************************************/
class Categorie 
{ 
    // Déclaration des attributs 
    private ?int $id; 
    private ?string $categorie; 

    // LE CONSTRUCTEUR 
    function __construct(?int $id = 0, ?string $categorie = null) 
    {
        $this->setId($id);
        $this->setCategorie($categorie);
    }     
    // LE DESTRUCTEUR
    function __destruct() {
        // echo "La categorie est détruite.";
      }    
      
    // LES ACCESSEURS 
    // *************   Attribut Id   ********************
    public function getId() 
    { 
        return $this->id; // retourne l’identifiant id
    } 
    public function setId($id) 
    { 
        $this->id = $id; // écrit dans l’attribut id 
    }  
    // *************   Attribut Categorie   ********************
    public function getCategorie() 
    { 
        return $this->categorie; // retourne la categorie 
    } 
    public function setCategorie($categorie) 
    { 
        $this->categorie = $categorie; // écrit dans l’attribut categorie 
    } 
} 
?>
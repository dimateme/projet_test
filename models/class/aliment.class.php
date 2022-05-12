<?php 
/*****************************************************************
Nom du programme : aliment.class.php
Programmeurs : Yvon Gosselin
Entreprise : L'EPEE, epee.cegep-rdl.qc.ca
Date :  Mars 2022
But : La classe ALIMENT qui contiendra un aliment
******************************************************************/
class Aliment 
{ 
    // Déclaration des attributs 
    private ?int $id; 
    private ?string $nom; 
    private ?string $description = NULL; 
    private ?int $quantite = 0;
    private ?int $disponibilite = 0; 
    private ?int $categorie_id; 

    // LE CONSTRUCTEUR 
    function __construct(?int $id = 0, ?string $nom = null, ?string $description = null, ?int $quantite = 0, ?int $disponibilite = 0, ?int $categorie_id = 0) 
    {
        $this->setId($id);
        $this->setNom($nom);
        $this->setDescription($description);
        $this->setQuantite($quantite);
        $this->setDisponibilite($disponibilite);
        $this->setCategorie_id($categorie_id);
    }     
    // LE DESTRUCTEUR
    function __destruct() {
        // echo "L'aliment est détruit.";
      }    
    // LES ACCESSEURS 
    // *************   Attribut Id   ********************
    public function getId() 
    { 
        return $this->id; //retourne l’identifiant 
    } 
    public function setId($id) 
    { 
        $this->id = $id; //écrit dans l’attribut id 
    } 
    // *************   Attribut Nom   ********************  
    public function getNom() 
    { 
        return $this->nom;      //retourne le nom 
    } 
    public function setNom($nom) 
    { 
        $this->nom = $nom;      //écrit dans l’attribut nom 
    } 
    // *************   Attribut Description   ********************  
    public function getDescription() 
    { 
        return $this->description;      //retourne la description  
    } 
    public function setDescription($description) 
    { 
        $this->description = $description;      //écrit dans l’attribut description 
    } 
    // *************   Attribut Quantité   ********************      
    public function getQuantite() 
    { 
        return $this->quantite;         //retourne la quantite 
    } 
    public function setQuantite($quantite) 
    { 
        $this->quantite = $quantite;        //écrit dans l’attribut quantite 
    } 
    // *************   Attribut Disponibilite   ********************
    public function getDisponibilite() 
    { 
        return $this->disponibilite;        //retourne la disponibilité 
    } 
    public function setDisponibilite(int $disponibilite) 
    { 
        $this->dateAjout = $disponibilite;      //écrit dans l’attribut disponibilite 
    } 
    // *************   Attribut Categorie_id   ********************
    public function getCategorie_id() 
    { 
        return $this->categorie_id; //retourne l’identifiant 
    } 
    public function setCategorie_id($categorie_id) 
    { 
        $this->categorie_id = $categorie_id; //écrit dans l’attribut id 
    } 
    
} 
?>
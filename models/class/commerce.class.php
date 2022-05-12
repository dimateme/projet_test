<?php 
/*****************************************************************
Nom du programme : commerce.class.php
Programmeurs : Yvon Gosselin
Entreprise : L'EPEE, epee.cegep-rdl.qc.ca
Date :  Mars 2022
But : La classe COMMERCE qui contiendra un commerce
******************************************************************/
class Commerce 
{ 
    // Déclaration des attributs 
    private ?int $id; 
    private ?string $commerce; 

    // LE CONSTRUCTEUR 
    function __construct(?int $id = 0, ?string $commerce = null) 
    {
        $this->setId($id);
        $this->setCommerce($commerce);
    }     
    // LE DESTRUCTEUR
    function __destruct() {
        // echo "Le commerce est détruit.";
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
    // *************   Attribut Commerce   ********************
    public function getCommerce() 
    { 
        return $this->commerce; // retourne le commerce 
    } 
    public function setCommerce($commerce) 
    { 
        $this->commerce = $commerce; // écrit dans l’attribut commerce 
    } 
} 
?>
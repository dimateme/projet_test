<?php 
class GestionAliment 
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
    // Récupération de tous les aliments de la table aliment de la BD 
    function obtenirLesAliments()
    {
        $lesAlimentsBD = $this->bdd->query('SELECT * FROM aliment');
        return $lesAlimentsBD;
    }
    // Récupération d'un aliment correspondant au ID 
    function obtenirUnAliment($aliment_id)
    {
        $unAlimentBD = $this->bdd->query('SELECT * FROM aliment WHERE id = '.$aliment_id);
        return $unAlimentBD;
    }    
    // Enregistrement d'un aliment dans la BD        
    public function ajouterUnAliment (aliment $aliment) 
    { 
        $req = $this->bdd->prepare('INSERT INTO aliment (nom, description, quantite, disponibilite, categorie_id) VALUES(:nom, :description, :quantite, :disponibilite, :categorie_id)');
        $req->bindValue(':nom', $aliment->getNom(), PDO::PARAM_STR);
        $req->bindValue(':description', $aliment->getDescription(), PDO::PARAM_STR);
        $req->bindValue(':quantite', $aliment->getQuantite(), PDO::PARAM_INT);
        $req->bindValue(':disponibilite', $aliment->getDisponibilite(), PDO::PARAM_INT);
        $req->bindValue(':categorie_id', $aliment->getCategorie_id(), PDO::PARAM_INT);
        $req->execute();
    }
    // Modification d'un aliment
    function modifierUnAliment (Aliment $aliment)
    {
        $req = $this->bdd->prepare('UPDATE aliment SET nom=:nom, description=:description, quantite=:quantite, 
                                disponibilite=:disponibilite, categorie_id=:categorie_id
                                WHERE id=:id');
        $req->bindValue(':id', $aliment->getId(), PDO::PARAM_STR);
        $req->bindValue(':nom', $aliment->getNom(), PDO::PARAM_STR);
        $req->bindValue(':description', $aliment->getDescription(), PDO::PARAM_STR);
        $req->bindValue(':quantite', $aliment->getQuantite(), PDO::PARAM_INT);
        $req->bindValue(':disponibilite', $aliment->getDisponibilite(), PDO::PARAM_INT);
        $req->bindValue(':categorie_id', $aliment->getCategorie_id(), PDO::PARAM_INT);
        $req->execute();
    }
    // Enregistrement d'une association avec un commerce dans la BD        
    function associerUnCommerce(aliment $aliment, commerce $commerce)
    {
        $req = $this->bdd->prepare('INSERT INTO aliment_commerce (aliment_id, commerce_id)  VALUES (:aliment_id, :commerce_id)');
        $req->bindValue(':aliment_id', $aliment->getId(), PDO::PARAM_INT);        
        $req->bindValue(':commerce_id', $commerce->getId(), PDO::PARAM_INT);        
        $req->execute();
    }
    // Récupération du dernier ID aliment enregistré 
    function recupererDernierIdAliment()
    {
        return $this->bdd->lastInsertId();
    }
    // Retrouve tous les commerces associés à cet aliment
    function obtenirLesCommercesAssocies($aliment_id)
    {
        $requeteSQL = 'SELECT * FROM aliment_commerce WHERE aliment_id = '.$aliment_id;
        $sesCommercesIdBD = $this->bdd->query($requeteSQL);
        return $sesCommercesIdBD;
    }
    // Enlève tous les commerces associés à cet aliment
    function enleverCommercesAssocies($aliment_id)
    {
        $req = $this->bdd->prepare('DELETE FROM aliment_commerce WHERE aliment_id ='.$aliment_id);
        $req->execute(array(
            'aliment_id' => $aliment_id
        ));
    }
    // Méthode qui valide si un commerce est associé à un aliment dans la table de lien
    function estUnCommerceDeCetAliment($commerce_id,$aliment_id)
    {
        // Comptons le nombre d'enregistrements retrouvés
        $requeteSQL = "SELECT count(*) FROM aliment_commerce WHERE aliment_id = $aliment_id AND commerce_id = $commerce_id";
        $resultat = $this->bdd->query($requeteSQL);
        // On compte le nombre d'enregistrements trouvés
        $nbEnregistrement = $resultat->fetchColumn();
        // Si on a trouvé un enregistrement
        if ($nbEnregistrement)
            return true;
        else 
            return false;
    }
}
?>
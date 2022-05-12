<?php
/*****************************************************************************************************************
Nom du programme : gestionUtilisateurs.php
Programmeurs : Yvon Gosselin
Entreprise : L'EPEE, epee.cegep-rdl.qc.ca
Date :  Février 2022
But : fichier des méthodes de gestion des données de la table UTILISATEUR
******************************************************************************************************************/
function ajouterUtilisateur ($bdd, $usager, $motDePasse)
{
    $req = $bdd->prepare('INSERT INTO utilisateur (usager, motDePasse) VALUES(:usager, :motDePasse)');
    $req->execute(array(
        'usager' => $usager,
        'motDePasse' => $motDePasse
        ));
}
function verifierUtilisateur($bdd, $usager, $motDePasse)
{
    $req = $bdd->prepare("SELECT usager, motDePasse FROM utilisateur WHERE usager = :usager");
    $req->execute(array(
        'usager' => $usager,
        ));
    $unUtilisateur = $req->fetch();
    if($unUtilisateur)
    {
        if(password_verify( $motDePasse, $unUtilisateur["motDePasse"]))
        {
            return 1;
        }
    }  
    return 0;
}
?>
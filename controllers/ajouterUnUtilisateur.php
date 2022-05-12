<?php
/*****************************************************************************************************************
Nom du programme : ajouterUnUtilisateur.php
Programmeurs : Yvon Gosselin
Entreprise : L'EPEE, epee.cegep-rdl.qc.ca
Date :  Février 2022
But : PGM ONE SHOT permettant d'ajouter un utilisateur
******************************************************************************************************************/
// Inclure le fichier de gestion de la configuration
include '../include/configuration.php';
// Connexion à la base de données
include '../Modeles/connexionBD.php';
// Acces aux managers des utilisateurs
include '../Modeles/gestionUtilisateurs.php';

if ((isset($_POST["usager"])) && (isset($_POST["motDePasse"])))
{
    $usager = $_POST["usager"];
    $motDePasse = $_POST["motDePasse"];
    // Encrypter le mot de passe
    $motDePasse = password_hash($motDePasse,PASSWORD_DEFAULT);
    ajouterUtilisateur ($bdd, $usager, $motDePasse);
    exit();
}
else
{
    $msgErreur = "Entrez les infos pour un nouvel utilisateur";
    $pageTitre = "AJOUT D'UN UTILISATEUR";
    $pageContenu = <<<EOT
                    <form action="ajouterUnUtilisateur.php" class="form-signin" method="post" align="center" size="100">
                        <label>$msgErreur</label><br><br>
                        <label for="inputLogin" class="sr-only">Usager</label>
                        <input type="text" id="inputLogin" class="form-control" placeholder="Entrez le courriel de l'usager" name="usager">
                        <label for="inputPassword" class="sr-only">Mot de passe</label>
                        <input type="password" id="inputPassword" class="form-control" placeholder="Entrez le mot de passe de l'usager" name="motDePasse"><br>
                        <input type="submit" class="btn btn-lg btn-primary btn-block" value="Ajouter cet utilisateur">
                    </form>
    EOT;
    // Appeler la vue pour l'affichage
    include '../Vues/templateAuthentification.php';
}

?>
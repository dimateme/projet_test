<?php
/*****************************************************************************************************************
Nom du programme : authentification.php
Programmeurs : Yvon Gosselin
Entreprise : L'EPEE, epee.cegep-rdl.qc.ca
Date :  Février 2022
But : PGM d'authentification
******************************************************************************************************************/
// Inclure le fichier de gestion de la configuration
include '../include/configuration.php';
// Connexion à la base de données
include '../models/connexionBD.php';
// Acces aux managers des utilisateurs
include '../models/managers/gestionUtilisateurs.php';

$pageTitre = "AUTHENTIFICATION";
$msgErreur = "";
session_start();
if (isset($_SESSION['usager']))
{
    echo "Vous êtes connectés en tant que " . $_SESSION['usager'];
    header("Location: gererLesAliments.php");
    exit;
}
else 
{
    if ((isset($_POST['usager'])) && (isset($_POST['motDePasse'])))
    {
        $reponse = verifierUtilisateur($bdd, $_POST['usager'], $_POST['motDePasse']);
        if ($reponse)
            {
                $_SESSION['usager'] = $_REQUEST["usager"];
                header("Location: gererLesAliments.php");
                exit;
            }
        else
                $msgErreur = "Nom d'utilisateur ou mot de passe incorrect !"; //Login ou Mot de passe incorrect
    }
    $pageTitre = "Authentification";
    $pageContenu = <<<EOT
                <form action="authentifier.php" class="form-signin" method="post" align="center" size="100">
                    <label>$msgErreur</label><br><br>
                    <label for="inputLogin" class="sr-only">Usager</label>
                    <input type="text" id="inputLogin" class="form-control" placeholder="Entrez le courriel de l'usager" name="usager">
                    <label for="inputPassword" class="sr-only">Mot de passe</label>
                    <input type="password" id="inputPassword" class="form-control" placeholder="Entrez le mot de passe de l'usager" name="motDePasse"><br>
                    <input type="submit" class="btn btn-lg btn-primary btn-block" value="Se connecter">
                </form>
EOT;
    
// Appeler la vue pour l'affichage
include '../views/templateAuthentification.php';

}

?>
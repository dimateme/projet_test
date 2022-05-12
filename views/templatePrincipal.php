<?php
/*****************************************************************************************************************
Nom du programme : templatePrincipal.php
Programmeurs : Yvon Gosselin
Entreprise : L'EPEE, epee.cegep-rdl.qc.ca
Date :  26 janvier 2022
But : Vue principale de l'application
******************************************************************************************************************/
?>
<!doctype html>
<html lang="en">
  <head>
    <!--  Meta tags requises -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
	<!-- placer ici le fichier css principale du site -->
	<!-- <link rel="stylesheet" href="../include/fichierCSSprinc.css" type="text/css" /> -->
	<!-- placer ici le script contenant des fonctions javascript globales -->
	<!-- <script src="../include/fonctionsGlobales.js" type="text/javascript"></script> -->
	<!-- placer ici les script contenant les fonctions javascript locales -->
	<!-- <script src="../include/fonctionsLocales.js" type="text/javascript"></script> -->

    <title><?php echo $pageTitre ?></title>
    </head>
    <body>
        <div class="container">
            <div class="starter-template">
                <div class="page-header text-center">
                    <h1>Vente en ligne de l'entreprise LesFutursMillionnaires</h1>
                    <h6>Car l'argent ne fait pas le bonheur!</h6>
                </div>
                <ul class="nav">
                    <li class="nav-item">
                        <a class="nav-link active" href="../controllers/gererLesAliments.php">Accueil</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../controllers/ajouterUnAliment.php">Ajouter un aliment</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../controllers/deconnecter.php">Se déconnecter</a>
                    </li>
                </ul>               
                <div class="jumbotron text-center">
                    <p><h4><?php echo $pageTitre ?></h4></p>
                </div>
            <?php
                echo $pageContenu;
            ?>
            </div>
        </div>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>
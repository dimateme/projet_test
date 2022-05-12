<?php
/***************************************************************************
Nom du programme : formulaireAjout.php
Programmeurs : Yvon Gosselin
Entreprise : L'EPEE, epee.cegep-rdl.qc.ca
Date :  Mars 2022
But : Formulaire pour ajouter un aliment
*****************************************************************************/
$pageTitre = "Ajout d'un ALIMENT";

$pageContenu = <<<EOT
<style>
.form-signin {
    max-width: 330px;
    padding: 15px;
    margin: 0 auto;
}
</style>
<form class="form-signin" action="ajouterUnAliment.php" method="post">
    <input name="action" type="hidden" value="AJOUT_ALIMENT">
    <label for="inputNom" class="sr-only">Nom:</label>
    <input type="text" name="nom" id="inputNom" class="form-control" placeholder="Nom de l'aliment" required autofocus>
    <label for="inputDescription" class="sr-only">Description:</label>
    <textarea name="description" id="inputDescription" class="form-control" rows="4" cols="50" placeholder="Description de l'aliment" required></textarea>
    <label for="inputQuantite" class="sr-only">Quantité:</label>
    <input type="number" name="quantite" id="inputQuantite" class="form-control" placeholder="Quantité de l'aliment" required>
    <label class="sr-only">Disponibilité de l'aliment:</label><br>
    <input type="radio" id="disponibilite" name="disponibilite" value=1 checked>
    <label for="disponibilite">Oui</label><br>
    <input type="radio" id="nondisponible" name="disponibilite" value=0 >
    <label for="nondisponible">Non</label><br><br>
    <label for="inputCategorie">Catégorie:</label><br/>
    <select name="categorie_id">
EOT;
    foreach ($lesCategories as $uneCategorie)
    {
    $pageContenu .= <<<EOT
        <option value=$uneCategorie[id]>$uneCategorie[categorie]</option><br/>
EOT;
    }
    $pageContenu .= <<<EOT
        </select><br/><br/>
        <label for="inputCommerce">Commerce(s):</label><br/>
        <select name="commerces[]" multiple>
EOT;
    foreach ($lesCommerces as $unCommerce)
    {
    $pageContenu .= <<<EOT
        <option value=$unCommerce[id]>$unCommerce[commerce]</option><br/>
EOT;
    }
    $pageContenu .= <<<EOT
        </select><br/><br/>
        <button class="btn btn-lg btn-primary btn-block" type="submit">Enregistrer</button>
    </form>
EOT;
?>
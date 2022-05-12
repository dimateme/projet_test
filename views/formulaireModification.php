<?php
/***************************************************************************
Nom du programme : formulaireModification.php
Programmeurs : Yvon Gosselin
Entreprise : L'EPEE, epee.cegep-rdl.qc.ca
Date :  Mars 2022
But : Formulaire pour modifier un aliment
*****************************************************************************/

$pageTitre = "Modification de l'aliment: ".$unAliment->nom;

$pageContenu = <<<EOT
<style>
.form-signin {
    max-width: 330px;
    padding: 15px;
    margin: 0 auto;
}
</style>
<form class="form-signin" action="modifierUnAliment.php" method="post">
    <input name="action" type="hidden" value="MODIFICATION_ALIMENT">
    <input name="id" type="hidden" value="$unAliment->id">
    <label for="inputNom" class="sr-only">Nom:</label>
    <input type="text" name="nom" id="inputNom" class="form-control" value="$unAliment->nom"  autofocus>
    <label for="inputDescription" class="sr-only">Description:</label>
    <textarea name="description" id="inputDescription" class="form-control" rows="4" cols="50" >$unAliment->description</textarea>
    <label for="inputQuantite" class="sr-only">Quantité:</label>
    <input type="number" name="quantite" id="inputQuantite" class="form-control" value="$unAliment->quantite">
    <label class="sr-only">Disponibilité de l'aliment:</label><br>
EOT;
    if ($unAliment->disponibilite == 1)
    {
        $pageContenu .= <<<EOT
        <input type="radio" id="disponibilite" name="disponibilite" value="1" checked>
        <label for="disponibilite">Oui</label><br>
        <input type="radio" id="disponibilite" name="disponibilite" value="0" >
        <label for="disponibilite">Non</label><br><br>
EOT;
    } 
    else 
    {
        $pageContenu .= <<<EOT
        <input type="radio" id="disponibilite" name="disponibilite" value="1">
        <label for="disponibilite">Oui</label><br>
        <input type="radio" id="disponibilite" name="disponibilite" value="0" checked>
        <label for="disponibilite">Non</label><br><br>
EOT;
    }
    $pageContenu .= <<<EOT
    <label for="inputCategorie">Catégorie:</label><br/>
    <select name="categorie">
EOT;
    foreach ($lesCategories as $uneCategorie)
    {
        if ((int)$uneCategorie["id"] === (int)$saCategorie->id)
            $pageContenu .= <<<EOT
                <option value=$uneCategorie[id] selected>$uneCategorie[categorie]</option><br/>
EOT;
        else
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
        if ($gestionAliment->estUnCommerceDeCetAliment($unCommerce['id'],$unAliment->id))
            $pageContenu .= <<<EOT
                <option value=$unCommerce[id] selected>$unCommerce[commerce]</option><br/>
EOT;
        else
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
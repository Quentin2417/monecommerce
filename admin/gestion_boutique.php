<?php require_once("../inc/init_inc.php"); ?>
<?php if(! internauteEstConnecterEtEstAdmin()) {
    header ("location: ../connexion.php");
    exit();
} ?>
<?php require_once("../inc/haut.inc.php"); ?>
<h1>Formulaire Produits</h1>
<form method="post" action="" enctype="multipart/form-data">
    <label for="reference">Références</label>
    <input type="text" id="reference" name="reference" placeholder="la référence du produit">
    <button>Enregistrer le produit</button>
</form>


<?php require_once("../inc/bas.inc.php"); ?>



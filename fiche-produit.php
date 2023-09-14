<?php require_once('./inc/init_inc.php'); 
// traitement
if (isset($_GET['id_produit'])){
    $resultat = executeRequete("SELECT * FROM produit WHERE id_produit='$_GET[id_produit]'");
}
if($resultat->num_rows <= 0) {
    header('location: boutique.php');
    exit();
}
$produit = $resultat->fetch_assoc();
$contenu .= "<h2>Titre : $produit[titre]</h2><hr><br>";
$contenu .= "<p>Categorie: $produit[categorie]</p>";
$contenu .= "<p>Couleur: $produit[couleur]</p>";
$contenu .= "<p>Taille: $produit[taille]</p>";
$contenu .= "<img src='$produit[photo]' ='150' height='150'>";
$contenu .= "<p><i>Description: $produit[description]</i></p><br>";
$contenu .= "<p>Prix : $produit[prix] €</p><br>";
    if($produit['stock'] > 0) {
        $contenu .= "<i>Nombre de produit(s) disponibles(s) : $produit[stock]'.</i>";
} else {
    $contenu .= 'Rupture de stock!';
}
?>
<?php require_once('./inc/haut.inc.php'); ?>
<h2>Fiche produit</h2>
<?php require_once('./inc/bas.inc.php'); ?>

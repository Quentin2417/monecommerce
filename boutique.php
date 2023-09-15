<?php require_once("./inc/init_inc.php"); 
$title = " | Boutique";
// traitement
// ---------------- Affichage des catégories ---------------
$categorie_des_produits = executeRequete("SELECT DISTINCT categorie FROM produit");
$contenu .= '<div class="boutique-categories">';
$contenu .= '<ul>';
while ($cat = $categorie_des_produits ->fetch_assoc()) {
    $contenu .= "<li><a href='?categorie=" . $cat['categorie'] . "'>" . $cat['categorie'] ."</a></li>";
}
$contenu .= '</ul>';
$contenu .= '</div>';
// affichage des produits
$contenu .= '<div class="boutique-produits">';
if (isset($_GET['categorie'])) {
    $donnees = executeRequete("SELECT id_produit, titre, photo, prix FROM produit WHERE categorie='$_GET[categorie]'");
    while ($produit = $donnees->fetch_assoc()) {
        $contenu .= '<div class="boutique-produit">';
        $contenu .= "<h2>$produit[titre]</h2>";
        $contenu .= "<a href=\"fiche-produit.php?id_produit=$produit[id_produit]\"><img src=\"$produit[photo]\" =\"130\" height=\"100\"></a>";
        $contenu .= "<p>$produit[prix] €</p>";
        $contenu .= '<a href="fiche-produit.php?id_produit=' . $produit['id_produit'] . '">Voir la fiche</a>';
        $contenu .= '</div>';
    }
}
?>

<?php require_once("./inc/haut.inc.php") ?>
<!-- <h2>Notre Boutique</h2> -->
<?php echo $contenu ?>
<?php require_once("./inc/bas.inc.php") ?>

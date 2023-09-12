<?php require_once("../inc/init_inc.php"); ?>
<?php if(! internauteEstConnecterEtEstAdmin()) {
    header ("location: ../connexion.php");
    exit();
} 
if(!empty($_POST)) {
    $photo_bdd ="";
    if(!empty($_FILES['photo']['name'])) {
        $nom_photo = $_POST['reference'] . '_' . $_FILES['photo']['name'];
        $photo_bdd = RACINE_SITE . "public/img/$nom_photo";
        $photo_dossier ="../public/img/$nom_photo";
        copy($_FILES['photo']['tmp_name'], $photo_dossier);
    }
    foreach($_POST as $indice => $valeur) {
        $_POST[$indice] = htmlentities(addslashes($valeur));
    }
    executeRequete("INSERT INTO produit (reference, categorie, titre, description, couleur, taille, public, photo, prix, stock)
    VALUES('$_POST[reference]', '$_POST[categorie]' , '$_POST[titre]', '$_POST[description]', '$_POST[couleur]', '$_POST[taille]',
    '$_POST[public]', '$photo_bdd', '$_POST[prix]', '$_POST[stock]')");
    $contenu .= '<div class="validation">Le produit a bien été enregistré</div>';
}
// liens produit
$contenu .= '<a href="?action=affichage">Affichage des produits</a>';
$contenu .= '<a href="?action=ajout">Ajout d\'un produit</a>';
?>
<!-- affichage des produits -->
<?php 
    if(isset($_GET['action']) && $_GET['action'] == "affichage") {
        $resultat = executeRequete("SELECT * FROM produit");
        $contenu .= '<h2>Affichage des produits</h2>';
        $contenu .= 'Nombres de produits disponibles : ' .$resultat->num_rows;
        $contenu .= '<table border="1"><tr>';
        while($colonne = $resultat->fetch_field()) {
            $contenu .= '<th>' . $colonne->name . '</th>';
        }
        $contenu .= '<th>Modification</th>';
        $contenu .= '<th>Suppression</th>';
        $contenu .= '</tr>';
        while($ligne = $resultat->fetch_assoc()) {
            $contenu .= '<tr>';
            foreach($ligne as $indice=> $informations) {
                if ($indice == "photo") {
                    $contenu .= '<td><img src="' . RACINE_SITE . $informations . '" height="70"></td>';
                } else {
                    $contenu .= '<td>' . $informations . '</td>';
                }
            }
            $contenu .= '<td><a href="?action=modification&id_produit=' .$ligne['id_produit'] . '">
            <img src="../inc/assets/icons/edit.png"></a></td>';
            $contenu .= '<td><a href="?action=modification&id_produit=' .$ligne['id_produit'] . '">
            <onClick="return(confirm(\'En êtes vous certain\'));"><img src="../inc/assets/icons/delete.png"></a></td>';
            $contenu .= '</tr>';
        }
        $contenu .= '</table>';
}
?>
<?php require_once("../inc/haut.inc.php"); ?>
<?php echo $contenu; ?>
<?php
    if(isset($_GET['action']) && $_GET['action'] == "ajout") {
        echo '
<h1>Formulaire Produits</h1>
<form method="post" action="" enctype="multipart/form-data">
    <label for="reference">Références</label>
    <input type="text" id="reference" name="reference" placeholder="la référence du produit">
    <label for="categorie">Categorie</label>
    <input type="text" id="categorie" name="categorie" placeholder="la categorie du produit">
    <label for="titre">Titre</label>
    <input type="text" id="titre" name="titre" placeholder="le titre du produit">
    <label for="description">Description</label>
    <textarea name="description" id="description" placeholder="la description du produit"></textarea>
    <label for="couleur">Couleur</label>
    <input type="text" id="couleur" name="couleur" placeholder="la couleur du produit">
    <label for="taille">Taille</label>
    <select name="taille" id="">
        <option value="S">S</option>
        <option value="M">M</option>
        <option value="L">L</option>
        <option value="XL">XL</option>
    </select><br>
    <label for="public">Public</label>
    <div>
        <input type="radio" name="public" value="m" checked>Homme
        <input type="radio" name="public" value="f">Femme <br><br>
    </div>
    <label for="photo">Photo</label>
    <input type="file" id="photo" name="photo">
    <label for="prix">Prix</label>
    <input type="text" id="prix" name="prix" placeholder="le prix du produit">
    <label for="stock">Stock</label>
    <input type="text" id="stock" name="stock" placeholder="le stock du produit">
    <button>Enregistrer le produit</button>
</form>';
}
?>


<?php require_once("../inc/bas.inc.php"); ?>



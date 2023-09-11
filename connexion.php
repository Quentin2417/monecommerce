<?php require_once("inc/init_inc.php"); ?>
<!-- traitement -->
<?php
if(isset($_GET['action']) && $_GET['action'] == "deconnexion") {
    session_destroy(); 
}
if(internauteEstConnecte()) {
    header("location: profil.php");
}
if($_POST){
    $resultat = executeRequete(("SELECT * from utilisateur where pseudo='$_POST[pseudo]'"));
    if($resultat->num_rows !=0) {
        $membre = $resultat->fetch_assoc();
        if(password_verify($_POST['mot_de_passe'],  $membre['mot_de_passe'])) {
            foreach($membre as $indice => $element) {
                if($indice != 'mot_de_passe') {
                    $_SESSION['membre'][$indice] = $element;
                }
            }
        } else {
        $contenu .= '<div class="Erreur">Erreur de mot de passe</div>';
        }
        // si tout est bon on redirige vers le profil
        header("location: profil.php");
    } else {
        $contenu .= '<div class="erreur">Erreur de pseudo</div>';
    }
}
?>
<?php require_once("inc/haut.inc.php"); ?>
<?php echo $contenu ?>
<form method="post" action="">
    <label for="pseudo">Pseudo</label>
    <input type="text" id="pseudo" name="pseudo">
    <label for="mot_de_passe" id="mot_de_passe" name="mot_de_passe">Mot de passe</label>
    <input type="password" id="mot_de_passe" name="mot_de_passe">
    <button>Se connecter</button>
</form>
<?php require_once("inc/bas.inc.php"); ?>


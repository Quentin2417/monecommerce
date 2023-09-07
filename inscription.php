<?php require('./inc/init_inc.php'); ?>
<?php
if($_POST){
        // debug($_POST);
}
?>
<?php require('./inc/haut.inc.php'); ?>
<form method="post" action="">
    <label for="pseudo">Pseudo</label>
    <input type="text" id="pseudo" name="pseudo" placeholder="Votre pseudo" required maxlength="20" 
    pattern="[a-zA-Z0-09-_.]{1, 20}"  title="caractères acceptés : a-zA-Z0-09-_.">
    <label for="mot-de-passe">Mot de passe </label>
    <input type="password" id="mot-de-passe" name="mot-de-passe" required >
    <label for="prenom">Prénom</label>
    <input type="text" id="prenom" name="prenom" placeholder="votre prénom">
    <label for="email">Email</label>
    <input type="email" id="email" name="email" placeholder="exemple@gmail.com">
    <label for="civilite">Civilité</label>
    <div>
        <input name="civilite" value="m" checked="" type="radio">Homme
        <input name="civilite" value="f" type="radio">Femme
    </div>
    <label for="ville">Ville</label>
    <input type="text" id="ville" name="ville" placeholder="votre ville" pattern="[a-zA-Z0-9-_.]{5,15}" title="caractères acceptés : a-zA-Z0-9-_.">
    <label for="cp">Code Postal</label>
    <input type="text" id="code_postal" name="code_postal" placeholder="code postal" pattern="[0-9]{5}" title="5 chiffres requis : 0-9">
    <label for="adresse">Adresse</label>
    <textarea id="adresse" name="adresse" placeholder="votre adresse" pattern="[a-zA-Z0-9-_.]{5,15}" title="caractères acceptés :  a-zA-Z0-9-_."></textarea>
    <!-- <input type="submit" name="inscription" value="S'inscrire"> -->
    <button>S'inscrire</button>
</form>
</form>
<?php require('./inc/bas.inc.php'); ?>


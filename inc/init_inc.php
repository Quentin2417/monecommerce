<?php
//.............BDD
$mysqli = new mysqli("localhost", "db_user", "12345", "monecommerce");
if($mysqli->connect_error) die('Un probleme est survenue lors de la tentative de connection à la BDD : ' .$mysqli->connect_error);
// $myslqi-> set_charset("utf8");
//.......... SESSION
session_start();
//............CHEMIN
print_r($_SERVER);
define ("RACINE_SITE", "http://" . $_SERVER['HTTP_HOST'] . "/");
// define("RACINE_SITE", "http://localhost:4000/");

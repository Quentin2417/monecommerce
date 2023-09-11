<?php
// configuration php
require __DIR__ . '/../vendor/autoload.php';
Dotenv\Dotenv::createUnsafeImmutable(__DIR__ . '/../')->load();
//.............BDD
$mysqli = new mysqli($_ENV['DB_HOST'], $_ENV['DB_USER'], $_ENV['DB_PASSWORD'], $_ENV['DB_NAME']);
if($mysqli->connect_error) die('Un probleme est survenue lors de la tentative de connection à la BDD : ' . $mysqli->connect_error);
// $myslqi-> set_charset("utf8");
//.......... SESSION
session_start();
//............CHEMIN
// print_r($_SERVER);
define ("RACINE_SITE", "http://" . $_SERVER['HTTP_HOST'] . "/");
$contenu= "";
require('function.inc.php');
// debug($mysqli, 0);

// define("RACINE_SITE", "http://localhost:4000/");
// Déclarer une variable d’environnement
// putenv('NOM_VARIABLE=Le nom de ma variable d\'environnement avec <span style="font-weight:bold;">putenv(NOM_VARIABLE)</span>');
// // // ou
// $_ENV['NOM_VARIABLE'] = 'Le nom de ma variable d\'environnement avec <span style="font-weight:bold;">$_ENV[NOM_VARIABLE]</span>';
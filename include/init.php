<?php 
// Connexion à la BDD
$dbConnect = new PDO("mysql:host=localhost;dbname=annonceo", "Grototo", "T0n4r1n0r0t0t0!", [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING,
    PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'
]);

// Démarrage de la session
session_start();

// Définition des chemins
define('RACINE', $_SERVER['DOCUMENT_ROOT'] . '/');
// echo '<pre>'; print_r(RACINE); echo '</pre>';

define('URL', 'http://localhost:8000/');
// echo '<pre>'; print_r(URL); echo '</pre>';

foreach($_POST as $key => $value){
    $_POST[$key] = htmlentities(addslashes(trim($value)));
}
foreach($_GET as $key => $value){
    $_GET[$key] = htmlentities(addslashes(trim($value)));
}

require_once("functions.php");
?>
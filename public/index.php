<?php

use App\Routeur;
//Ce fichier est le point d'entrée de notre site
// Création d'une constante pour l'url de base du site
$config = file_get_contents('../App/config.json');
$config = json_decode($config);
$config->baseSite;
define("SITEBASE", $config->baseSite);
//echo SITEBASE;

//echo "<hr>";


// Creation d'une constante pour la racine du projet
define('ROOT', dirname(__DIR__));
//echo ROOT;

// On importe l'autoloader

require_once(ROOT . DIRECTORY_SEPARATOR . 'autoloader.php');

//echo "<br>";

$routeur = new Routeur;
$routeur->app();

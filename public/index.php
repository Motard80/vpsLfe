<?php
require '../src/class/otherClass/Autoloder.php';
Autoloader::register();
$pages = [
'home'=> '../src/view/serveur/serveurHome.php',
'serveur'=>'../src/view/serveur/serveurHome.php',
'missions' =>'../src/view/mission/homeMission.php',
'newDossier'=>'../src/view/mission/newDossier.php',
'error' => '../src/view/error/'
];

// Vérifier si la clé existe dans le tableau, sinon utiliser 'connexion' par défaut
$p = isset($_GET['p']) && array_key_exists($_GET['p'], $pages) ? $_GET['p'] : 'home';

ob_start();

// Vérifier si le fichier existe avant de l'inclure
if (file_exists($pages[$p])) {
    require $pages[$p];
} else {
    // Gérer le cas où la page demandée n'existe pas
    require '../src/view/home/home.php';
}

$content = ob_get_clean();
require '../src/view/template/default.php';
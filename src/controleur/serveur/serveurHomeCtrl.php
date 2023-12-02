<?php

//require '../src/class/model/powerShell/PowerShellExecutor.php';

use src\class\model\powerShell\PowerShellExecutor;
use src\class\model\powerShell\Restart;
use src\class\model\powerShell\Start;
use src\class\model\powerShell\Stop;

$powerShellExecutor = new PowerShellExecutor();

$messge = array();
$error = array();
// Chargez le contenu du fichier JSON
$cheminFichierJSON = '../src/config/profil_config.json';
$profil = [];

if (file_exists($cheminFichierJSON)) {
    $jsonContent = file_get_contents($cheminFichierJSON);
    $profil = json_decode($jsonContent, true);
}
var_dump($profil);
$title='gestion du serveur';
if(isset($_POST['start'])){
    if(!empty($_POST['profil'])){
        Start::startServeur();
        $message['start']='Serveur lancé avec le profils  '. $_POST['profil'];
    }else{
        $error['start']='Sélectionner un profils';
    }

}elseif(isset($_POST['reStart'])){
    if(!empty($_POST['profil'])){
        Restart::restart();
        $message['reStart']='Serveur redémarer'; 
    }else{
        $error['reStart']='selectionner un profil';
    }
}elseif(isset($_POST['stop'])){
    Stop::stopServeur();
    $message['stop']='Serveur arreter';
    
}else{
    $error['stop']='Le serveur ne s\'est pas arreter correctement';
}


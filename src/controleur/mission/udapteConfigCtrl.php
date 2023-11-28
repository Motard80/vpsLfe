<?php

use src\class\model\EditeurConfigServeur\EditeurConfigServeur;

$title='editer le fichier config';
$formError = array();
$img='<img src="asset/img/Icone/WarningRond.png" style="width: 50px;" class="images_petit" />';

//chemin du fichier config.cfg
$pathConfig='../src/profil';
// Chargez le contenu du fichier JSON
$cheminFichierJSON = '../src/config/profil_config.json';
$profil = [];

if (file_exists($cheminFichierJSON)) {
    $jsonContent = file_get_contents($cheminFichierJSON);
    $profil = json_decode($jsonContent, true);
}

if(isset($_POST['updateConfig'])){
    if(!empty($_POST['profil'])){
        $profil=htmlspecialchars($_POST['profil']);
    }else{
        $formError['profil']="Merci de selectionner un profil";
    }
    if(!empty($_POST['newHostname'])){
        if (preg_match('/^[A-Za-z0-9_]+$/',$_POST['newHostname'])){
            $newHostname= htmlspecialchars($_POST['newHostname']);
        }else{
            $formError['profil']="Merci de ne mettre que des lettre ou des chiffre dans le nom de votre mission et replacer les espace par _ !";
        }
    }else{
        $formError['profil']="Vous n'avez pas remplis le champs Nom de la mission";
    }
    if(!empty($_POST['newPassword'])){
        if(preg_match('/^[A-Za-z0-9]+$/',$_POST['newPassword'])){
            $newPassword=htmlspecialchars($_POST['newPassword']);
        }else{
            $formError['newPassword']="Merci de ne mettre que des lettre ou des chiffre VOTRE MOTS DE PASSE!";
        }
    }else{
        $formError['newPassword']="Vous n'avez pas remplis le champs mots de passe";
    }
    if(isset($_POST['newTemplate'])){
        if(preg_match('/^[A-Za-z0-9_]+$/',$_POST['newTemplate'])){
            $newTemplate=htmlspecialchars($_POST['newTemplate']);
        }else{
            $formError['newTemplate']=="Merci de ne mettre que des lettre ou des chiffre dans le nom de votre PBO et replacer les espace par _ ";
        }
    }else{
        $formError['newTemplate']="Vous n'avez pas remplis le champs nom du pbo";
    }
    if(count($formError)===0){
        if (file_exists($configFilePath)) {
            $jsonContent = file_get_contents($configFilePath);
            $profil = json_decode($jsonContent, true);
        }
        $configFilePath =$pathConfig. $profil."/config.cfg";
        $serverConfigEditor = new EditeurConfigServeur($configFilePath);
        $serverConfigEditor->setHostname($newHostname);
        $serverConfigEditor->setPassword($newPassword);
        $serverConfigEditor->setTemplate($newTemplate);
    } 
    
}
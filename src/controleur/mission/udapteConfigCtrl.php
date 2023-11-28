<?php

use src\class\model\EditeurConfigServeur\EditeurConfigServeur;

$title = 'Éditer le fichier config';
$formError = array();
$img = '<img src="asset/img/Icone/WarningRond.png" style="width: 50px;" class="images_petit" />';

// Chemin du fichier config.cfg
$pathConfig = '../src/profil/';

// Charger le contenu du fichier JSON
$cheminFichierJSON = '../src/config/profil_config.json';
$profil = [];

if (file_exists($cheminFichierJSON)) {
    $jsonContent = file_get_contents($cheminFichierJSON);
    $profil = json_decode($jsonContent, true);
}

if (isset($_POST['updateConfig'])) {
    if (!empty($_POST['profil'])) {
        $profil = htmlspecialchars($_POST['profil']);
    } else {
        $formError['profil'] = "Merci de sélectionner un profil";
    }
    if (!empty($_POST['newHostname'])) {
        if (preg_match('/^[A-Za-z0-9_]+$/', $_POST['newHostname'])) {
            $newHostname = htmlspecialchars($_POST['newHostname']);
        } else {
            $formError['newHostname'] = "Merci de ne mettre que des lettres ou des chiffres dans le nom de votre mission et remplacer les espaces par _ !";
        }
    } else {
        $formError['newHostname'] = "Vous n'avez pas rempli le champ Nom de la mission";
    }
    if (!empty($_POST['newPassword'])) {
        if (preg_match('/^[A-Za-z0-9]+$/', $_POST['newPassword'])) {
            $newPassword = htmlspecialchars($_POST['newPassword']);
        } else {
            $formError['newPassword'] = "Merci de ne mettre que des lettres ou des chiffres VOTRE MOT DE PASSE!";
        }
    } else {
        $formError['newPassword'] = "Vous n'avez pas rempli le champ mot de passe";
    }
    if (isset($_POST['newTemplate'])) {
        if (preg_match('/^[A-Za-z0-9_]+$/', $_POST['newTemplate'])) {
            $nameTemplate = htmlspecialchars($_POST['newTemplate']);
            $newTemplate = 
               '  class '.$profil.' {
                   template = '.$nameTemplate.'.pbo;
                    //difficulty = "Regular";					// Server difficulty Settings (Recruit, Regular, Veteran, Mercenary)
                     difficulty = "Custom";
                     autoSelectMission = false;
                      //Respawn = "2"; ';
        } else {
            $formError['newTemplate'] = "Merci de ne mettre que des lettres ou des chiffres dans le nom de votre PBO et remplacer les espaces par _ ";
        }
    } else {
        $formError['newTemplate'] = "Vous n'avez pas rempli le champ nom du PBO";
    }
    if (count($formError) === 0) {
        $configFilePath = $pathConfig . $profil . "/config.cfg";
        if (file_exists($configFilePath)) {
            $jsonContent = file_get_contents($configFilePath);
            $profil = json_decode($jsonContent, true);
        } $serverConfigEditor = new EditeurConfigServeur($configFilePath);

        // Modification du hostname
        $serverConfigEditor->setHostname($newHostname);

        // Modification du mot de passe
        $serverConfigEditor->setPassword($newPassword);
        //Modification de la variable template de la class mission 
        $serverConfigEditor->setMissionTemplate($newTemplate); // Utilisation de la nouvelle méthode
    }
}


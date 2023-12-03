<?php

use src\class\model\EditeurConfigServeur\ConfigManager;
use src\class\model\EditeurConfigServeur\EditeurConfigServeur;
use src\class\model\mission\FileUploader;

$title = 'Éditer le fichier config';
$formError = array();
$img = '<img src="asset/img/Icone/WarningRond.png" style="width: 50px;" class="images_petit" />';

// Chemin du fichier config.cfg
$pathConfig = '../src/profil/';
$fileUploader = new FileUploader();
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
        $_SESSION['lastProfilesSelect']=$profil;
    } else {
        $formError['profil'] = "Merci de sélectionner un profil";
    }
    if(!empty($_FILES['pbo'])&& !empty($_FILES['presset'])){
        $filePbo = $_FILES['pbo'];
        $fileHtml= $_FILES['presset'];
    }
    // Vérification du profil et téléchargement du fichier
    if (!empty($profil) && !empty($fileHtml['name'])) {
        $uploadedFileName = $fileUploader->uploadFilePbo($filePbo,$profil);
        $uploadedFileNameHtml= $fileUploader->uploadFileHtml($fileHtml, $profil);
        if ($uploadedFileName !== false) {
            // Fichier téléchargé avec succès, vous pouvez faire d'autres traitements ici
            $succes['tele']='Fichier mise à jours';
        } else {
            // Erreur lors du téléchargement du fichier
            $formError['tele'] = "Erreur lors du téléchargement du fichier. Veuillez réessayer.";
        }
    } else {
        // Profil ou fichier manquant
        $formError['tele'] = "Veuillez sélectionner un profil et télécharger un fichier.";
    }
    if (!empty($_POST['newHostname'])) {
        if (preg_match('/^[A-Za-z0-9_]+$/', $_POST['newHostname'])) {
            $hostname = htmlspecialchars($_POST['newHostname']);
        } else {
            $formError['newHostname'] = "Merci de ne mettre que des lettres ou des chiffres dans le nom de votre mission et remplacer les espaces par _ !";
        }
    } else {
        $formError['newHostname'] = "Vous n'avez pas rempli le champ Nom de la mission";
    }
    if (!empty($_POST['newPassword'])) {
        if (preg_match('/^[A-Za-z0-9]+$/', $_POST['newPassword'])) {
            $password = htmlspecialchars($_POST['newPassword']);
        } else {
            $formError['newPassword'] = "Merci de ne mettre que des lettres ou des chiffres VOTRE MOT DE PASSE!";
        }
    } else {
        $formError['newPassword'] = "Vous n'avez pas rempli le champ mot de passe";
    }
    if (isset($_POST['newTemplate'])) {
            $nameTemplate = htmlspecialchars($_POST['newTemplate']);
            $newTemplate =
                '  class ' . $profil . ' {
                   template = "' . $nameTemplate . '";
                    //difficulty = "Regular";					// Server difficulty Settings (Recruit, Regular, Veteran, Mercenary)
                     difficulty = "Custom";
                     autoSelectMission = false;
                      //Respawn = "2"; ';
    } else {
        $formError['newTemplate'] = "Vous n'avez pas rempli le champ nom du PBO";
    }
    if (count($formError) === 0) {
        $configFilePath = $pathConfig . $profil . "/config.cfg";
        if (file_exists($configFilePath)) {
            $jsonContent = file_get_contents($configFilePath);
            $profil = json_decode($jsonContent, true);
        } // Utilisation de la classe EditeurConfigServeur
        $newHostname= "\"".$hostname."\"";
        $newPassword= "\"". $password."\"" ;
        $serverConfigEditor = new EditeurConfigServeur($configFilePath);

        // Modification du hostname
        $serverConfigEditor->setHostname($newHostname);

        // Modification du mot de passe
        $serverConfigEditor->setPassword($newPassword);
        //Modification de la variable template de la class mission 
        $serverConfigEditor->setMissionTemplate($newTemplate); // Utilisation de la nouvelle méthode
        $newLocation = "?p=missions&config=ok";
                header("Location: $newLocation", true, 301);
                exit();

    }else{
        $formError['technical']='une erreur technique est survenue contacté un Staff Arma3';
    }
}

<?php

use src\class\model\mission\FileUploader;

$title = 'Télecharger votre pbo';
$formError = array();
// Charger le contenu du fichier JSON
$cheminFichierJSON = '../src/config/profil_config.json';
$profil = [];
if (file_exists($cheminFichierJSON)) {
    $jsonContent = file_get_contents($cheminFichierJSON);
    $profil = json_decode($jsonContent, true);
}
$fileUploader = new FileUploader();

// Traitement du formulaire
if (isset($_POST['uploadPbo'])) {
    if(!empty( $_POST['profil'])){
        $profil = $_POST['profil'];
    }else{
        $formError['tele']="vous avez oubliez de selectionner le profil";
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
            $newLocation = "?p=missions&uplod=ok";
            header("Location: $newLocation", true, 301);
            exit();

        } else {
            // Erreur lors du téléchargement du fichier
            $formError['tele'] = "Erreur lors du téléchargement du fichier. Veuillez réessayer.";
        }
    } else {
        // Profil ou fichier manquant
        $formError['tele'] = "Veuillez sélectionner un profil et télécharger un fichier.";
    }
}
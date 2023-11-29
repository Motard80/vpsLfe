<?php

use src\class\model\projetStructure\ProjetStructure;

$title = 'Nouveau dossier';
$message= array();
$error = array();
if (isset($_POST['create'])) {
    if (!empty($_POST['name'])) {
        if (preg_match('/^[A-Za-z0-9]+$/', $_POST['name'])) {

            // Spécifiez le chemin du répertoire parent
            $cheminParent = '../src/profil';

            // Utilisez la classe ProjetStructure
            $projetStructure = new ProjetStructure($cheminParent);
            $result = $projetStructure->creerStructure($_POST['name']);

            // Vérifiez si la création du dossier a réussi
            if ($result) {
                // Chargez le contenu actuel du fichier JSON
                $cheminDossier = '../src/config/profil_config.json';
                $jsonContent = file_get_contents($cheminDossier);
                $configArray = json_decode($jsonContent, true);

                // Ajoutez le nouveau nom de dossier au tableau
                $configArray[] = $_POST['name'];

                // Enregistrez le tableau mis à jour dans le fichier JSON
                file_put_contents($cheminDossier, json_encode($configArray)); 
                $projetStructure->setMissionTemplate($_POST['name'], $cheminDossier);
                    
                $newLocation = "?p=missions&dossier=ok";
                header("Location: $newLocation", true, 301);
                exit();

                // Affichez le résultat
                $message['Ok']='Dossier créé avec succès.';
            } else {
                $message['OK']= 'Échec de la création du dossier.';
            }
        }
    }
}
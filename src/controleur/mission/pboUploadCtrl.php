<?php
$title = 'Télécharger votre PBO';

// Chargez le contenu du fichier JSON
$cheminFichierJSON = '../src/config/profil_config.json';
$profil = [];
$formError= array();
$succes=array();
if (file_exists($cheminFichierJSON)) {
    $jsonContent = file_get_contents($cheminFichierJSON);
    $profil = json_decode($jsonContent, true);
}

// Vérification si la requête est une requête POST
if (isset($_POST['uploadPbo'])) {
    if (!empty($_POST['profil'])) {
        // Répertoire où les fichiers téléchargés seront stockés
        $uploadDir = '../src/profil/' . $_POST['profil'] . '/mission';

        // Assurez-vous que le répertoire existe, sinon créez-le
        if (!file_exists($uploadDir)) {
            mkdir($uploadDir, 0777, true);
        }

        // Tableau pour stocker les noms de fichiers téléchargés avec succès
        $uploadedFiles = [];
        if (isset($_FILES['files']) && is_array($_FILES['files']['name'])) {
            // Parcours de chaque fichier dans la variable superglobale $_FILES
            foreach ($_FILES['files']['name'] as $key => $name) {
                // Emplacement temporaire du fichier téléchargé
                $tempFile = $_FILES['files']['tmp_name'][$key];
                // Emplacement cible où le fichier sera déplacé
                $targetFile = $uploadDir . '/' . $name;

                // Déplacement du fichier du répertoire temporaire vers le répertoire de destination
                if (move_uploaded_file($tempFile, $targetFile)) {
                    // Ajout du nom du fichier au tableau des fichiers téléchargés avec succès
                    $uploadedFiles[] = $name;
                }
            }
        } else {
            var_dump($_FILES);
            // Réponse JSON indiquant qu'aucun fichier n'a été téléchargé
            $formError['tele']= 'aucun fichier a pu etre téléchargé!';
        }
        // Réponse JSON indiquant les fichiers téléchargés avec succès
        $succes['Tele'] = json_encode(['uploaded' => $uploadedFiles]);
    } else {
        // Réponse avec le code HTTP 400 si le profil est manquant
        http_response_code(400);
        $formError['tele']='Profil non spécifié';
    }
} else {
    // Réponse avec le code HTTP 405 si la méthode de requête n'est pas autorisée
    http_response_code(405);
    $formError['tele']='requette non autorisé';
}
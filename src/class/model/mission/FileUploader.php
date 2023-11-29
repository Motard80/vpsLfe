<?php

namespace src\class\model\mission;class FileUploader
{
    private $allowedExtensionsPbo = ['pbo'];
    private $allowedExtensionsHtml = [ 'html'];

    public function uploadFilePbo($file, $profil)
    {
        $fileName = $file['name'];
        $fileTmpName = $file['tmp_name'];
        $fileSize = $file['size'];
        $fileError = $file['error'];

        $fileExtension = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));

        if (in_array($fileExtension, $this->allowedExtensionsPbo)) {
            if ($fileError === 0) {
                // Limite de taille du fichier à 15 Go
                $maxFileSize = 15 * 1024 * 1024 * 1024; // 15 Go en octets

                if ($fileSize <= $maxFileSize) {
                    $uploadDirectory = "../src/profil/$profil/mission/";
                    $destination = $uploadDirectory . $fileName;

                    // Crée le dossier de destination s'il n'existe pas
                    if (!file_exists($uploadDirectory)) {
                        mkdir($uploadDirectory, 0777, true);
                    }

                    if (move_uploaded_file($fileTmpName, $destination)) {
                        return $fileName;
                    } else {
                        return "Erreur lors du déplacement du fichier téléchargé.";
                    }
                } else {
                    return "Le fichier est trop volumineux. (Limite : 15 Go)";
                }
            } else {
                return "Une erreur est survenue lors du téléchargement du fichier.";
            }
        } else {
            return "L'extension du fichier n'est pas autorisée.";
        }
    }
    public function uploadFileHtml($file, $profil)
    {
        $fileName = $file['name'];
        $fileTmpName = $file['tmp_name'];
        $fileSize = $file['size'];
        $fileError = $file['error'];

        $fileExtension = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));

        if (in_array($fileExtension, $this->allowedExtensionsHtml)) {
            if ($fileError === 0) {
                // Limite de taille du fichier à 15 Go
                $maxFileSize = 15 * 1024 * 1024 * 1024; // 15 Go en octets

                if ($fileSize <= $maxFileSize) {
                    $uploadDirectory = "../src/profil/$profil/presset/";
                    $destination = $uploadDirectory . $fileName;

                    // Crée le dossier de destination s'il n'existe pas
                    if (!file_exists($uploadDirectory)) {
                        mkdir($uploadDirectory, 0777, true);
                    }

                    if (move_uploaded_file($fileTmpName, $destination)) {
                        return $fileName;
                    } else {
                        return "Erreur lors du déplacement du fichier téléchargé.";
                    }
                } else {
                    return "Le fichier est trop volumineux. (Limite : 15 Go)";
                }
            } else {
                return "Une erreur est survenue lors du téléchargement du fichier.";
            }
        } else {
            return "L'extension du fichier n'est pas autorisée.";
        }
    }
}
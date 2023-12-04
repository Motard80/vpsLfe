<?php

namespace src\class\model\projetStructure;

class ProjetStructure
{
    private $cheminParent;

    public function __construct($cheminParent)
    {
        $this->cheminParent = $cheminParent;
    }
    public function creerStructure($profils)
    {
        $nomProjet = $profils;
        $cheminProjet = $this->cheminParent . '/' . $nomProjet;

        // Créer le dossier principal
        if (!file_exists($cheminProjet)) {
            mkdir($cheminProjet, 0777, true);
            $messageCreate = 'Le dossier ' . $profils . ' a bien été créé';
        } else {
            $errorCreate = 'La création du dossier a échoué! Le dossier existe déjà.';
            return $errorCreate;
        }
        $source = '../src/view/profil_1/config.cfg';
        // Vérifier si le fichier source existe avant de le copier
        if (file_exists($source)) {
            if (copy($source, $cheminProjet . '/config.cfg')) {
                $messageCreate .= ' et le fichier de configuration a été copié avec succès.';
            } else {
                $errorCreate = 'La copie du fichier de configuration a échoué!';
            }
        } else {
            $errorCreate = 'Le fichier source n\'existe pas.';
        }
        // Créer les sous-dossiers dans le dossier principal
        $this->creerSousDossier($cheminProjet, 'mission');
        $this->creerSousDossier($cheminProjet, 'presset');
        // Inclure et renommer le fichier profil.json
        $this->inclureEtRenommerProfil($cheminProjet, $nomProjet);
        return $messageCreate ?? $errorCreate;
    }
    private function creerSousDossier($dossierParent, $nomSousDossier)
    {
        $chemin = $dossierParent . '/' . $nomSousDossier;
        if (!file_exists($chemin)) {
            mkdir($chemin, 0777, true);
        }
    }
    public function setMissionTemplate($profil, $cheminProjet)
    {
        // Créer le répertoire pour le profil s'il n'existe pas encore
        $nouveauRepertoire = $cheminProjet . '/' . $profil;
        if (!file_exists($nouveauRepertoire)) {
            mkdir($nouveauRepertoire, 0777, true);
        }

        // Charger le contenu actuel du fichier JSON
        $source = $nouveauRepertoire . '/config.cfg';
        $configContent = file_get_contents($source);
        $configArray = json_decode($configContent, true);

        // Modifier la classe Missions pour le profil donné
        $configArray['profil'] = $profil;

        // Enregistrer le tableau mis à jour dans un fichier JSON dans le nouveau répertoire
        $nouveauChemin = $nouveauRepertoire . '/' . $profil . '.json';
        file_put_contents($nouveauChemin, json_encode($configArray));
        // Supprimer l'ancien fichier de configuration s'il existe
        if (file_exists($source)) {
            unlink($source);
        }
    }private function inclureEtRenommerProfil($dossierProjet, $nomProjet)
    {

        $cheminFichierProfilSource = '../src/view/profil_1/profil.json';
        $cheminFichierProfilDestination = $dossierProjet . '/' . $nomProjet . '.json';
    
        // Copier le fichier profil.json dans le nouveau projet
        if (copy($cheminFichierProfilSource, $cheminFichierProfilDestination)) {
            $succes = 'Le fichier profil.json a été ajouté avec succès.';
        } else {
            $error = 'L\'ajout du fichier profil.json a échoué.';
        }
    }
}

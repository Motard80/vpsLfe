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
            $messageCreate = 'Le dossier ' . $profils . ' a bien été créé et le fichier de configuration a été copié avec succès.';
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

        return $messageCreate ?? $errorCreate;
    }

    private function creerSousDossier($dossierParent, $nomSousDossier)
    {
        $chemin = $dossierParent . '/' . $nomSousDossier;
        if (!file_exists($chemin)) {
            mkdir($chemin, 0777, true);
        }
    }
    public function setMissionTemplate($profil, $chemin)
    {
        // Modifie le champ 'template' dans la classe 'Missions'
        $configContent = file_get_contents($chemin);
        $configArray = json_decode($configContent, true);

        // Ajoutez ou modifiez les valeurs selon la structure de votre fichier JSON
        $configArray['class Missions']['class ' . $profil] = 'nouvelle_valeur';

        // Enregistrez le tableau mis à jour dans le fichier JSON
        file_put_contents($chemin, json_encode($configArray));
    }
}

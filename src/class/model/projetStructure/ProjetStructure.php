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

        return $messageCreate ?? $errorCreate;
    }

    private function creerSousDossier($dossierParent, $nomSousDossier)
    {
        $chemin = $dossierParent . '/' . $nomSousDossier;
        if (!file_exists($chemin)) {
            mkdir($chemin, 0777, true);
        }
    }
}

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
        $source='../src/view/profil_1/config.cfg';
        
        // Créer le dossier principal
        mkdir($cheminProjet);
        if(copy($source, $cheminProjet)){
            $messageCreate='Le dossier '. $profils .'a bien été créer';
        }else{
            $errorCreate='la création du dossier à échoué!';
        }

        // Créer les sous-dossiers dans le dossier principal
        $this->creerSousDossier($cheminProjet, 'mission');
        $this->creerSousDossier($cheminProjet, 'presset');
    }

    private function creerSousDossier($dossierParent, $nomSousDossier)
    {
        $chemin = $dossierParent . '/' . $nomSousDossier;
        mkdir($chemin);
    }
}

// Spécifiez le chemin du répertoire parent
$cheminParent = '../src/profil';


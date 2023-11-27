<?php
namespace src\class\profil;

class DossierHandler {
    
    private $chemin;

    public function __construct($chemin) {
        $this->chemin = $chemin;
    }

    public function recupererNomsDossiers() {
        $nomsDossiers = [];

        // Vérifier si le chemin est un répertoire
        if (is_dir($this->chemin)) {
            // Ouvrir le répertoire
            $contenu = scandir($this->chemin);

            // Filtrer les entrées pour obtenir uniquement les dossiers
            $dossiers = array_filter($contenu, function ($element) {
                return is_dir($this->chemin . '/' . $element) && $element != '.' && $element != '..';
            });

            // Copier les noms de dossiers dans le tableau
            $nomsDossiers = array_values($dossiers);
        }

        return $nomsDossiers;
    }

    public function sauvegarderJson($nomFichier) {
        $nomsDossiers = $this->recupererNomsDossiers();
        $json = json_encode($nomsDossiers, JSON_PRETTY_PRINT);

        // Sauvegarder le JSON dans un fichier
        file_put_contents($nomFichier, $json);
    }
}

<?php

namespace src\class\model\EditeurConfigServeur;

class EditeurConfigServeur
{
    private $configFilePath;
    protected $Hostname;
    protected $Password;
    protected $Template;

    public function __construct($cheminFichierConfig)
    {
        $this->configFilePath = $cheminFichierConfig;
    }

    public function setHostname($nouveauNomHote)
    {
        $this->mettreAJourConfig('hostname', $nouveauNomHote);
    }
    

    public function setPassword($nouveauMotDePasse)
    {
        $this->mettreAJourConfig('password', $nouveauMotDePasse);
    }

    public function setTemplate($nouveauTemplate)
    {
        $this->mettreAJourConfig('template', $nouveauTemplate);
    }

    public function setMissionTemplate($nouveauTemplate)
    {
        // Charger le contenu du fichier de configuration
        $contenuConfig = file_get_contents($this->configFilePath);

        // Trouver la classe Missions dans le fichier de configuration
        $debutMissions = strpos($contenuConfig, "class Missions");
        $finMissions = strpos($contenuConfig, "};", $debutMissions);

        // Vérifier si la classe Missions a été trouvée
        if ($debutMissions !== false && $finMissions !== false) {
            // Extraire le contenu de la classe Missions
            $classeMissions = substr($contenuConfig, $debutMissions, $finMissions - $debutMissions + 2);

            // Remplacer la classe Missions par le nouveau template
            $nouveauContenu = str_replace($classeMissions, "class Missions {\n    $nouveauTemplate\n};", $contenuConfig);

            // Mettre à jour le fichier de configuration
            file_put_contents($this->configFilePath, $nouveauContenu);
        }
    }
    private function mettreAJourConfig($cle, $valeur)
    {
        // Vérifier si le fichier existe
        if (file_exists($this->configFilePath)) {
            // Lire le contenu actuel du fichier de configuration
            $contenuConfig = file_get_contents($this->configFilePath);
    
            // Utiliser des conditions pour mettre à jour la bonne clé
            if ($cle === 'hostname' || $cle === 'password') {
                // Remplacer la valeur existante par la nouvelle valeur
                $contenuConfig = preg_replace("/$cle\s*=\s*[^;]*/", "$cle = $valeur", $contenuConfig);
            } else {
                // Remplacer la valeur existante par la nouvelle valeur
                $contenuConfig = str_replace("$cle = ", "$cle = $valeur ", $contenuConfig);
            }
            // Écrire le contenu mis à jour dans le fichier de configuration
            file_put_contents($this->configFilePath, $contenuConfig);
        } else {
            echo "Le fichier de configuration n'existe pas : " . $this->configFilePath;
        }
    }
    public function getHostname()
    {
        // Lire le contenu actuel du fichier de configuration
        $contenuConfig = file_get_contents($this->configFilePath);

        // Utiliser une expression régulière pour extraire la valeur de l'hostname
        preg_match("/hostname\s*=\s*([^;]*)/", $contenuConfig, $matches);

        // Retourner la valeur trouvée ou null si non trouvée
        return isset($matches[1]) ? trim($matches[1]) : null;
    }

    public function getPassword()
    {
        // Lire le contenu actuel du fichier de configuration
        $contenuConfig = file_get_contents($this->configFilePath);

        // Utiliser une expression régulière pour extraire la valeur du mot de passe
        preg_match("/password\s*=\s*([^;]*)/", $contenuConfig, $matches);

        // Retourner la valeur trouvée ou null si non trouvée
        return isset($matches[1]) ? trim($matches[1]) : null;
    }

    public function getTemplate()
    {
        // Lire le contenu actuel du fichier de configuration
        $contenuConfig = file_get_contents($this->configFilePath);

        // Utiliser une expression régulière pour extraire la valeur du template
        preg_match("/template\s*=\s*([^;]*)/", $contenuConfig, $matches);

        // Retourner la valeur trouvée ou null si non trouvée
        return isset($matches[1]) ? trim($matches[1]) : null;
    }
}

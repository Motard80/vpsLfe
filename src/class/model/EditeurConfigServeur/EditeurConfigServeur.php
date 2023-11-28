<?php

namespace src\class\model\EditeurConfigServeur;

class EditeurConfigServeur
{
    private $configFilePath;

    public function __construct($configFilePath)
    {
        $this->configFilePath = $configFilePath;
    }

    public function setHostname($newHostname)
    {
        $this->updateConfig('hostname', $newHostname);
    }

    public function setPassword($newPassword)
    {
        $this->updateConfig('password', $newPassword);
    }

    public function setTemplate($newTemplate)
    {
        $this->updateConfig('template', $newTemplate);
    }

    public function setMissionTemplate($missionName, $profil)
    {
        // Charge le contenu du fichier de configuration
        $configContents = file_get_contents($this->configFilePath);

        // Recherche la classe Missions dans le fichier de configuration
        preg_match("/class Missions\s*{(.+?)\s*}/s", $configContents, $matches);

        // Vérifie si la classe Missions a été trouvée
        if (isset($matches[1])) {
            // Remplace le template dans la classe Missions
            $newConfigContents = preg_replace("/template\s*=\s*[\"'][^\"']+[\"'];/", "template = \"$missionName\";", $matches[1]);

            // Met à jour le fichier de configuration
            $configContents = str_replace($matches[1], $newConfigContents, $configContents);
            file_put_contents($this->configFilePath, $configContents);
        }
    }

    private function updateConfig($key, $value)
    {
        // Check if the file exists
        if (file_exists($this->configFilePath)) {
            // Read the current contents of the config file
            $configContents = file_get_contents($this->configFilePath);

            // Replace the existing value with the new value
            $configContents = preg_replace("/$key\s*=\s*[\"'].*?[\"'];/", "$key = \"$value\";", $configContents);

            // Write the updated contents back to the config file
            file_put_contents($this->configFilePath, $configContents);
        } else {
            echo "The configuration file does not exist: " . $this->configFilePath;
        }
    }
}

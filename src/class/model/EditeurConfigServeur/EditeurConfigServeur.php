<?php
namespace src\class\model\EditeurConfigServeur;

class EditeurConfigServeur {
    private $configFilePath;

    public function __construct($configFilePath) {
        $this->configFilePath = $configFilePath;
    }

    public function setHostname($newHostname) {
        $this->updateConfig('hostname', $newHostname);
    }

    public function setPassword($newPassword) {
        $this->updateConfig('password', $newPassword);
    }

    public function setTemplate($newTemplate) {
        $this->updateConfig('template', $newTemplate);
    }
    private function updateConfig($key, $value) {
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
    public function setMissionTemplate($missionName, $profil) {
        // Modifie le champ 'template' dans la classe 'Missions'
        $this->configFilePath['class Missions']['class '.$profil]['template'] = $missionName;
    }
}
/*<?php

class ServerConfig {
    private $configData;

    public function __construct($configFile) {
        // Charge la configuration depuis le fichier
        $this->loadConfig($configFile);
    }

    private function loadConfig($configFile) {
        // Lit le fichier de configuration et stocke les données dans $configData
        $configContent = file_get_contents($configFile);
        $this->configData = json_decode(json_encode(parse_ini_string($configContent, true)));
    }

   

    public function saveConfig($configFile) {
        // Sauvegarde la configuration dans le fichier
        $configContent = "";
        foreach ($this->configData as $section => $values) {
            $configContent .= "[$section]\n";
            foreach ($values as $key => $value) {
                $configContent .= "$key = $value\n";
            }
            $configContent .= "\n";
        }

        file_put_contents($configFile, $configContent);
    }
}

// Utilisation de la classe
$serverConfig = new ServerConfig('chemin/vers/server.cfg');

// Modifie le champ 'template' dans la classe 'Missions'
$serverConfig->setMissionTemplate('MyCustomMission.pbo');

// Sauvegarde la configuration modifiée dans le fichier
$serverConfig->saveConfig('chemin/vers/server.cfg');

?>
  */
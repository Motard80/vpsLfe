<?php
namespace src\class\model\ServerConfigEditor ;

class ServerConfigEditor {
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

    private function updateConfig($key, $value) 
    //Lit le contenu actuel du fichier de configuration
    {
        $configContents = file_get_contents($this->configFilePath);

        // Remplacer la valeur existante par la nouvelle valeur
        $configContents = preg_replace("/$key\s*=\s*[\"'].*?[\"'];/", "$key = \"$value\";", $configContents);

        // Écrivez le contenu mis à jour dans le fichier de configuration
        file_put_contents($this->configFilePath, $configContents);
    }
}

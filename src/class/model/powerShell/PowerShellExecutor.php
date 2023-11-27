<?php
namespace src\class\model\powerShell;

use COM;

class PowerShellExecutor {
    private $shell;

    public function __construct() {
        // Créer une instance du shell PowerShell
        $this->shell = new COM("WScript.Shell");
    }

    public function executeScript($scriptPath) {
        // Construire la commande PowerShell
        $command = "powershell.exe -ExecutionPolicy Bypass -File $scriptPath";

        // Exécuter la commande
        $this->shell->Run($command, 0, false);
    }

    /**
     * Get the value of shell
     */ 
    public function getShell()
    {
        return $this->shell;
    }

    /**
     * Set the value of shell
     *
     * @return  self
     */ 
    public function setShell($shell)
    {
        $this->shell = $shell;

        return $this;
    }
}

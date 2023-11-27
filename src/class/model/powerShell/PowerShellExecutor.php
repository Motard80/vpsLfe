<?php
namespace src\class\model\powerShell;
use \COM;

class PowerShellExecutor {
    public function executeScript($scriptPath) {
        // Échappez le chemin du script pour éviter les problèmes avec les espaces et les caractères spéciaux
        $escapedScriptPath = escapeshellarg($scriptPath);

        // Construire la commande PowerShell
        $command = "powershell.exe -ExecutionPolicy Bypass -File $escapedScriptPath";

        // Exécuter la commande et récupérer la sortie
        $output = shell_exec($command);

        // Afficher la sortie (pour le débogage, vous pouvez ajuster cela selon vos besoins)
        echo $output;
    }
}
<?php
namespace src\class\model\powerShell;

class Restart{
    
    public  static function restart(){
        
        // Commande PowerShell à exécuter
        $commandePowerShell = 'Write-Host "Le serveur est relancer"';
        
        // Exécute la commande PowerShell et récupère la sortie
        shell_exec("powershell.exe -Command $commandePowerShell");
            }
}
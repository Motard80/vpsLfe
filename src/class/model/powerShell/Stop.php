<?php
namespace src\class\model\powerShell;

class Stop {
    public static function stopServeur(){
          // Commande PowerShell à exécuter
          $commandePowerShell = 'Write-Host "Le serveur est stoper"';
        
          // Exécute la commande PowerShell et récupère la sortie
          shell_exec("powershell.exe -Command $commandePowerShell");
              
    }
}
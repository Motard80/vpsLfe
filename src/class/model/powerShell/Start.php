<?php
namespace src\class\model\powerShell;
class  Start{

    public  static function startServeur(){
        
// Commande PowerShell à exécuter
$commandePowerShell = 'Write-Host "Le serveur est démarer"';

// Exécute la commande PowerShell et récupère la sortie
shell_exec("powershell.exe -Command $commandePowerShell");
    }
}
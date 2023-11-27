<?php
namespace src\class\model\powerShell;
class  Start{

    public  static function startServeur(){
        

        $commandePowerShell = 'Write-Host "Ceci est un test depuis PowerShell"';

        // Exécute la commande PowerShell et récupère la sortie
        $sortie = shell_exec("powershell.exe -Command $commandePowerShell");
        
        // Affiche la sortie
        echo "Sortie de PowerShell : <pre>$sortie</pre>";
    }
}
<?php

//require '../src/class/model/powerShell/PowerShellExecutor.php';

use src\class\model\powerShell\PowerShellExecutor;
use src\class\model\powerShell\Start;

$powerShellExecutor = new PowerShellExecutor();


$title='gestion du serveur';
if(isset($_POST['start'])){
    if($_POST['profil']==0){
        Start::startServeur();
    }

}
<?php

//require '../src/class/model/powerShell/PowerShellExecutor.php';

use src\class\model\powerShell\PowerShellExecutor;
use src\class\model\powerShell\Restart;
use src\class\model\powerShell\Start;
use src\class\model\powerShell\Stop;

$powerShellExecutor = new PowerShellExecutor();


$title='gestion du serveur';
if(isset($_POST['start'])){
    if($_POST['profil']==0){
        Start::startServeur();
        $message='Serveur lancé avec le profils'. $_POST['profil'];
    }else{
        $error='Sélectionner un profils';
    }

}
if(isset($_POST['reStart'])){
    if($_POST['profil']==0){
        Restart::restart();
        $message='Serveur redémarer';
    }else{
        $error='';
    }
}

if(isset($_POST['stop'])){
    Stop::stopServeur();
    
    $message='Serveur arreter';
    
}
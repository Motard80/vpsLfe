<?php

use src\class\powerShell\PowerShellExecutor;
require '../src/class/model/powerShell/PowerShellExecutor.php';
$powerShellExecutor = new PowerShellExecutor();

$title='gestion du serveur';
if(isset($_POST['start'])|| isset($_POST['restart'])){
$script= '../src/class/powerShell/Start.php' ;
if($_POST){

}
}
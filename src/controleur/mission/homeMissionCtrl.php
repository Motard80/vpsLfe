<?php
$title='Mission';
if(isset($_POST['udapteConfig'])){
    
    $newLocation = "?p=udapteConfig";
    header("Location: $newLocation", true, 301);
    exit();
}
if(isset($_GET['config'])){
    if(preg_match('/^[A-Za-z0-9]+$/', $_GET['config'])){
        $message='La nouvelle config a été enregistreé avec succées';
    }
}
if(isset($_GET['dossier'])){
    if(preg_match('/^[A-Za-z0-9]+$/', $_GET['dossier'])){
        $message='Le dossier a été créer vous pouvez procéder au paramettrage de votre fichier config';
    }
}
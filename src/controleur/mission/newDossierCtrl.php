<?php

use src\class\model\projetStructure\ProjetStructure;

$title='Nouveau dossier';
if(isset($_POST['create'])){
    if(!empty($_POST['name'])){
        if (preg_match('/^[A-Za-z0-9]+$/', $_POST['name'])){

            // Spécifiez le chemin du répertoire parent
            $cheminParent = '../src/profil';
            
            // Utilisez la classe ProjetStructure
            $projetStructure = new ProjetStructure($cheminParent);
            $result = $projetStructure->creerStructure($_POST['name']);
            
            // Affichez le résultat
            $result;
        }
    }
}
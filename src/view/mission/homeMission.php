<?php

use src\class\otherClass\Form;

include_once '../src/controleur/mission/homeMissionCtrl.php';

$form= new Form();
?>
<title><?= isset($title) ? $title : '' ?></title>
</head>

<body>
    <header>
        <?php include_once '../src/include/Navbar.php'; ?>
    </header>
    <div class="contener text-center">
        <div class="row justify-content-center">
            <div class="col-lg-4">
                <h1>Gestion des missions</h1>
            </div>
            <div>
                <p>vous n'avez pas encore de dossier à votre nom <a href="?p=newDossier">cliquez ici</a></p>
            </div>
            <div>
                <div class="profil">
                   <?= $form->submit('Editér votre fichier config','udapteConfig', 'udapteConfig') ?>      
            </div>
            </div>
        </div>
        <div class="row justify-content-start">
            <div class="col-4">
                
            <div class="mission">
                    <select name="mission" id="mission">
                        <option value="">mission</option>
                    </select>        
            </div>
            </div>   
            <div class="col-4">
            </div>
            <div class="col-4">

            </div>
        </div>
    </div>
   <!--  <div class="img">
        <img src="asset/img/Patch_Sable_France_HQ.png" alt="logoLfe">
    </div> -->
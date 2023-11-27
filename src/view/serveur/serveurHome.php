<?php

use src\class\otherClass\Form;

include_once '../src/controleur/serveur/serveurHomeCtrl.php';
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
                <h1>Gestion du serveur</h1>
            </div>
            </div>
        </div>
        <div>
            <form action="" method="post" name="serveur">
        <div class="row justify-content-center">
                <div class="profil">
                    <select name="profil" id="profil">
                        <option value="0">selectionner le profils</option>
                    </select>        
            </div>
        <div class="row justify-content-start">
            <div class="col-4">
                <?= $form->submit('démarer le serveur', 'start','start') ?>
            </div>   
            <div class="col-4">
                <?= $form->submit('Restart le serveur', 'reStart','reStart') ?>
            </div>
            <div class="col-4">
                <?= $form->submit('Stoper le serveur', 'stop','stop') ?>
            </div>
        </div>
        </div>
        </form>
    </div>
    <div class="img">
        <img src="asset/img/Patch_Sable_France_HQ.png" alt="logoLfe">
    </div>
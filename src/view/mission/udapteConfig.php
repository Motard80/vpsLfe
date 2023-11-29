<?php

use src\class\otherClass\Form;

include_once '../src/controleur/mission/udapteConfigCtrl.php';

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
        </div>
        <div class="row justify-content-center">
            <div>
            <p class="text-danger" id="ErrorNewTemplate"><?= isset($formError['technical']) ? $img .$formError['technical'] .$img : '' ?></p>
            </div>
            <form action="" method="post">
                <div class="profil">
                    <select name="profil" id="profil">
                        <option value="">Profil</option>
                        <?php
                        // Générez les options à partir du tableau JSON
                        foreach ($profil as $profils) { ?>
                            <option value="<?= $profils ?>"><?= $profils ?></option>';

                        <?php  }
                        ?>
                    </select>
                    <p class="text-danger" id="ErrorProfil"><?= isset($formError['profil']) ? $img .$formError['profil'] .$img : '' ?></p>
                </div>
                <div>
                <?= $form->inputText('newHostname', 'newHostname', 'Nom de la mission') ?>
                    <p class="text-danger" id="ErrorNewHostname"><?= isset($formError['newHostname']) ? $img .$formError['newHostname'] .$img : '' ?></p>
                </div>
                <div>
                    <?= $form->inputText('newPassword', 'newPassword', 'Mot de passe pour votre mission ') ?>
                    <p class="text-danger" id="ErrorNewPassword"><?= isset($formError['newPassword']) ? $img .$formError['newPassword'] .$img : '' ?></p>
                </div>
                <div>
                    <?= $form->inputText('newTemplate','newTemplate','Nom de votre fichier PBO sans l\'extenction .pbo') ?>
                    <p class="text-danger" id="ErrorNewTemplate"><?= isset($formError['newTemplate']) ? $img .$formError['newTemplate'] .$img : '' ?></p>
                </div>
                <div>
                    <?= $form->submit('Modifier', 'updateConfig', 'updateConfig') ?>
                </div>
            </form>
        </div>
    </div>
   <!--  <div class="img">
        <img src="asset/img/Patch_Sable_France_HQ.png" alt="logoLfe">
    </div> -->
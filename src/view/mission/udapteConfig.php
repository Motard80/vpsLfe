<?php

use src\class\otherClass\Form;

include_once '../src/controleur/mission/udapteConfigCtrl.php';
include_once '../src/controleur/mission/pboUploadCtrl.php';
$form = new Form();
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
                <p class="text-danger" id="ErrorNewTemplate"><?= isset($formError['technical']) ? $img . $formError['technical'] . $img : '' ?></p>
            </div>
            <form action="" method="post" enctype="multipart/form-data">
                <div class="row justify-content-start">
                    <div>
                        <select name="profil" id="profil">
                            <option value="<?= isset($_SESSION['lastProfilesSelect']) ? $_SESSION['lastProfilesSelect'] : 'Selectionnez un profil' ?>"><?= isset($_SESSION['lastProfilesSelect']) ? 'Dernier profil séléctionnez: ' . $_SESSION['lastProfilesSelect'] : 'Selectionnez un profil'  ?></option>';
                            <?php
                            // Générez les options à partir du tableau JSON
                            foreach ($profil as $profils) { ?>
                                <option value="<?= $profils ?>"><?= $profils ?></option>
                            <?php  }
                            ?>
                        </select>
                    </div>
                </div>
                <div class="drop-container col-4" id="dropContainer">
                    <div>
                        <?= $form->dragAndDrop('pbo', 'pbo', 'glisser déposer votre PBO ou téléchager le en cliquant sur parcourrir', 'pbo') ?>
                        <ul id="fileList"></ul>

                    </div>
                </div>
                <div class="drop-container col-4" id="dropContainer">
                    <div>
                        <?= $form->dragAndDrop('presset', 'presset', 'glisser déposer votre presset ou téléchager le en cliquant sur parcourrir', 'presset') ?>
                        <ul id="fileList"></ul>
                    </div>
                </div>
                <div class="succes col-4">
                    <?= isset($succes['tele']) ?  $succes['tele'] : '' ?>
                </div>
                <div class="error col-4">
                    <?= isset($formError['tele']) ?  $formError['tele'] : '' ?>
                </div>
                <p class="text-danger" id="ErrorProfil"><?= isset($formError['profil']) ? $img . $formError['profil'] . $img : '' ?></p>
                <div>
                    <?= $form->inputText('newHostname', 'newHostname', 'Nom de la mission ', $hostname) ?>
                    <p class="text-danger" id="ErrorNewHostname"><?= isset($formError['newHostname']) ? $img . $formError['newHostname'] . $img : '' ?></p>
                </div>
                <div>
                    <?= $form->inputText('newPassword', 'newPassword', 'Mot de passe pour votre mission ', $password) ?>
                    <p class="text-danger" id="ErrorNewPassword"><?= isset($formError['newPassword']) ? $img . $formError['newPassword'] . $img : '' ?></p>
                </div>
                <div>
                    <?= $form->inputText('newTemplate', 'newTemplate', 'Nom de votre fichier PBO sans l\'extenction .pbo', $template) ?>
                    <p class="text-danger" id="ErrorNewTemplate"><?= isset($formError['newTemplate']) ? $img . $formError['newTemplate'] . $img : '' ?></p>
                </div>
                <div>
                    <?= $form->submit('Modifier', 'updateConfig', 'updateConfig') ?>
                </div>
            </form>
        </div>
    </div>
    </div>
    <!--  <div class="img">
        <img src="asset/img/Patch_Sable_France_HQ.png" alt="logoLfe">
    </div> -->
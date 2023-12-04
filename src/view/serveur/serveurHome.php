<?php

use src\class\model\powerShell\PowerShellExecutor;
use src\class\otherClass\Form;

$powerShellExecutor = new PowerShellExecutor();
include_once '../src/controleur/serveur/serveurHomeCtrl.php';
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
                <h1>Gestion du serveur</h1>
            </div>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-lg-4">
            <p>vous n'avez pas encore de dossier à votre nom <a href="?p=newDossier">cliquez ici</a></p>
        </div>
    </div>
    <div>
        <form action="" method="post" name="serveur">
            <div class="row justify-content-center">
                <div class="profil">
                    <select name="profil" id="profil">
                    <option value="<?= isset($_SESSION['lastProfilesSelect'] )? $_SESSION['lastProfilesSelect'] : '' ?>"><?=  isset($_SESSION['lastProfilesSelect'])? 'Dernier profil séléctionnez: '. $_SESSION['lastProfilesSelect'] : 'Selectionnez un profil'  ?></option>';
                        <?php
                        // Générez les options à partir du tableau JSON
                        foreach ($profil as $profils) { ?>
                            <option value="<?= isset($profils) ? $profils : '' ?>"><?= isset($profils) ? $profils : '' ?></option>
                        <?php
                        }
                        ?>
                    </select>
                </div>
                <div class="row justify-content-start">
                    <div class="col-4">
                        <?= $form->submit('démarer le serveur', 'start', 'start') ?>
                        <div id="messageServeurOk" class="row justify-content-center">
                            <?= isset($message['start']) ? $message['start'] : '' ?>
                        </div>
                        <div id="messageServeurNoOk" class="row justify-content-center">
                            <?= isset($error['start']) ? $error['start'] : '' ?>
                        </div>
                    </div>
                    <div class="col-4">
                        <?= $form->submit('Restart le serveur', 'reStart', 'reStart') ?>
                        <div id="messageServeurOk" class="row justify-content-center">
                            <?= isset($message['reStart']) ? $message['reStart'] : '' ?>
                        </div>
                        <div id="messageServeurNoOk" class="row justify-content-center">
                            <?= isset($error['reStart']) ? $error['reStart'] : '' ?>
                        </div>
                    </div>
                    <div class="col-4">
                        <?= $form->submit('Stoper le serveur', 'stop', 'stop') ?>
                        <div id="messageServeurOk" class="row justify-content-center">
                            <?= isset($message['stop']) ? $message['stop'] : '' ?>
                        </div>
                        <div id="messageServeurNoOk" class="row justify-content-center">
                            <?= isset($error['stop']) ? $error['stop'] : '' ?>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
    <div class="img">
        <img src="asset/img/Patch_Sable_France_HQ.png" alt="logoLfe">
    </div>
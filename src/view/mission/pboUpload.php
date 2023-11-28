<?php

use src\class\otherClass\Form;

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
            <div>
                <p>vous n'avez pas encore de dossier à votre nom <a href="?p=newDossier">cliquez ici</a></p>
            </div>
            <div>
                <form action="" method="post" enctype="multipart/form-data">

                    <div class="row justify-content-start">
                        <div>
                            <select name="profil" id="profil">
                                <option value="">Profil</option>
                                <?php
                                // Générez les options à partir du tableau JSON
                                foreach ($profil as $profils) { ?>
                                    <option value="<?= $profils ?>"><?= $profils ?></option>';

                                <?php  }
                                ?>
                            </select>
                            <div class="drop-container col-4" id="dropContainer">
                                <div>
                                    <?= $form->dragAndDrop('pbo', 'pbo', 'glisser déposer votre PBO ou téléchager le en cliquant sur parcourrir', 'files') ?>
                                    <ul id="fileList"></ul>
                                </div>

                            </div>
                            <div>
                                <?= $form->submit('Uploader votre PBO', 'uploadPbo', 'uploadPbo') ?>
                            </div>
                        </div>
                    </div>
                </form>
                <div class="succes col-4" >
                    <?= isset( $succes['Tele']) ?  $succes['Tele'] : '' ?>
                </div>
                <div class="error col-4" >
                    <?= isset( $formError['tele']) ?  $formError['tele'] : '' ?>
                </div>
            </div>
        </div>
        <!--  <div class="img">
        <img src="asset/img/Patch_Sable_France_HQ.png" alt="logoLfe">
    </div> -->
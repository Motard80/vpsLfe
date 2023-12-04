<?php

use src\class\otherClass\Form;

include_once '../src/controleur/mission/newDossierCtrl.php';
$result;
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
                <h1>Créer un nouveau dossier </h1>
            </div>
            <div>
            </div>
            <div>
                <form action="" method="post">
                    <?= $form->inputText('name','name', 'Nom du joueur','' ) ?>
                    <?= $form->submit('Valider','create', 'create') ?>
                </form>
            </div>
    <div>
    <?= isset($message['Ok'])? $message['Ok'] :''?>
    </div>
        </div>
    </div>
    <div class="img">
        <img src="asset/img/Patch_Sable_France_HQ.png" alt="logoLfe">
    </div>
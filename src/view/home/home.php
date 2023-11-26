<?php
include_once '../src/controleur/home/homeCtrl.php';
?>
<title><?= isset($title) ? $title : '' ?></title>
</head>

<body>
    <header>
        <?php include_once '../src/include/Navbar.php'; ?>
    </header>
    <div class="contener text-center">
        <div class="row justify-content-start">
            <div class="col-lg-4">
            </div>
            <div class="col-lg-4">
                <h1>Gestion du serveur et des missions</h1>
            </div>
            <div class="col-lg-8">
                <h2>Gestion du serveur</h2>
                <p><button><a href="?p=serveur">Gérer le serveur</a></button></p>
            </div>
            <div class="col-lg-4">
            <h2>Gestion de vos missions</h2>
                <p><button><a href="?p=mission">Gérer vos missions</a></button></p>
            </div>
        </div>
    </div>
    <div class="img">
        <img src="asset/img/Patch_Sable_France_HQ.png" alt="logoLfe">
    </div>
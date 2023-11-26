<?php
include_once '../src/controleur/serveur/serveurHomeCtrl.php';
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
            <div>
                <div class="profil">
                    <select name="profil" id="profil">
                        <option value="">profil</option>
                    </select>        
            </div>
            </div>
        </div>
        <div class="row justify-content-start">
            <div class="col-4">
            <button><a href="?p=start">start</a></button>
            </div>   
            <div class="col-4">
            <button><a href="?p=restart">restart</a></button>
            </div>
            <div class="col-4">
            <button><a href="?p=stop">Stop</a></button>
            </div>
        </div>
    </div>
    <div class="img">
        <img src="asset/img/Patch_Sable_France_HQ.png" alt="logoLfe">
    </div>
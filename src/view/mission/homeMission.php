<?php
include_once '../src/controleur/mission/homeMissionCtrl.php';
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
                <div class="profil">
                    <select name="profil" id="profil">
                        <option value="">mission</option>
                    </select>        
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
    <div class="img">
        <img src="asset/img/Patch_Sable_France_HQ.png" alt="logoLfe">
    </div>
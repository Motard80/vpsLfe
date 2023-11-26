<?php
include_once '../src/controleur/error/error404Ctrl.php';
?>
<title>page inéxistante</title>
</head>

<body>

    <header>
    </header>
    <div class="contener">
        <?php 
        include_once 'coffee.php';
        ?>
        <div class="row">

            <h1>
                <img src="asset/img/Icone/WarningRond.png" style="width: 50px;" class="image-inverse" />
                La page demandée n'existe pas <a href="?p=home">retour</a>
                <img src="asset/img/Icone/demitour.png" style="width: 50px;" class="image-inverse" />
            </h1>
        </div>
        <div>
            <img src="asset/img/Icone/WarningRond.png" alt="Error" class="rotating" class="rotating">
        </div>
    </div>
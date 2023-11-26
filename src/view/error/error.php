<?php
include_once '../src/controleur/error/errorCtrl.php';
?>
<title>page inéxistante</title>
</head>

<body>

    <header>
    </header>  
    <div class="container ">

    <?php 
        include_once 'coffee.php';
        ?>

        <div class="row">
            <div >
                <h1>
                    <img src="asset/img/Icone/WarningRond.png" style="width: 50px;" class="images_petit" />
                    Une erreur critique est survenue
                    <img src="asset/img/Icone/WarningRond.png" style="width: 50px;" class="images_petit" />
                </h1>
            </div>
            <div>
                <p><a href="?p=home">retour</a><img src="asset/img/Icone/demitour.png" style="width: 50px;" class="images_petit" /></p>
                <p>Contacter le web masteur du site </p>
            </div>
            <div>
                <img src="asset/img/Icone/WarningRond.png" alt="Error" class="image-inverse">
            </div>
        </div>
    </div>
<?php
$title='Mission';
if(isset($_POST['udapteConfig'])){
    
    $newLocation = "?p=udapteConfig";
    header("Location: $newLocation", true, 301);
    exit();
}
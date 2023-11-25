<?php
namespace src\class;
class Redirect{
    public function redirect($url){
        header('Location: ' . $url);
        exit();
    }
}
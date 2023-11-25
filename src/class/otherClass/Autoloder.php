<?php

class Autoloader {
    static function register() {
        spl_autoload_register(array(__CLASS__, 'autoload'));
    }

    static function autoload($class_name) {
        // Chemin de base où se trouvent les classes
        $base_path = 'src/class/';

        $class_name = str_replace("\\", "/", $class_name);

        // Vérifier si la classe correspond à Config
        if ($class_name === 'Config') {
            $file_path = $base_path . 'config/' . $class_name . '.php';
        } else {
            // Transformer le nom de la classe en chemin de fichier
            $file_path =  '../'.$class_name . '.php';
        }
        // Vérifier si le fichier existe avant de le charger
        if (file_exists($file_path)) {
            require $file_path;
        } else {
            // Gérer l'erreur ou afficher un message
            echo "Le fichier de classe '$class_name' est introuvable à '$file_path'.";
        }
    }
}
<?php 
namespace src\config;
// construction d'une classe abstrect pour pourvoir l'utisé partout dans l'application 
    abstract class Config
    {
        //création d'une fonction static
        public static function getConfig(){
            //chemin pour récupérer 
            $file= '../src/config/Pepsy.config';
            //décodage 
            $data= file_get_contents($file);
            //on retourne le fichier Json
            return json_decode($data);
        }

    }

?>
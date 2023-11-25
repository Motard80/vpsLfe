<?php

namespace src\class\model;

use src\config\Config;

/**
 * Description of dataBase
 *
 * @author Wilbert G
 */
class DataBase {
    
    private static $instance= null;
    public $db = NULL;

    public function __construct() {
        try {
            //Local
          //  $this->db = new PDO('mysql:host=localhost:3306;dbname=chefdeprojet;charset=utf8', 'root', '');
            // En Ligne
            // Récupérer ce qui se trouve dans la config.
            $config = Config::getConfig()->DataBase;
            // Injecter les données récupérées de la config dans les paramètres du nouvel objet PDO
            $this->db = new \PDO("mysql:host=".$config->HoteDbb.";dbname=".$config->NameDbb.";charset=utf8", $config->UserDbb, $config->PwdDbb);
        }
        // Sinon on affiche un message d'erreur
        catch (\Exception $e) {
            die($e->getMessage());
        }
    }

    public static function getIntance() {
        if(is_null(self::$instance)){
          self::$instance= new dataBase();  
        }
        return self::$instance;
    }

}

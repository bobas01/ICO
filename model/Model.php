<?php

namespace App\Model;

use PDO;
use PDOException;

class Model {
    
    private static $db;

    private static function setDb(){

        try {
            self::$db = new PDO('mysql:host=localhost;dbname=ICO;charset=UTF8', 'root');
        } catch(PDOException $e){
            echo "Erreur :" . $e->getMessage();
        }
    }

    protected function getDb(){
        if(self::$db == null){
            self::setDb();
        }
        return self::$db;
    }
}
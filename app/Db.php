<?php

namespace App;

use PDO;
use PDOException;

class Db{
    private static $db;
    static function getDb(){
        if(!self::$db){
            try{
                $config = file_get_contents('App/config.json');
                $config = json_decode($config);
                self::$db = new PDO("mysql:host=" . $config->host . ";dbname=" . $config->dbName, $config->user, $config->password, array(PDO::ATTR_ERRMODE =>PDO::ERRMODE_EXCEPTION));

            }catch(PDOException $e){
                echo 'erreur : ' . $e->getMessage();
            }
        }
        return self::$db;
    }
}
// Pour tester l'accès au fichier json
//$config = file_get_contents('../App/config.json');
//$config = json_decode($config);
//var_dump($config);

//echo $config->dbName;

//$testBdd = new Db;
//var_dump($testBdd);
//var_dump(get_class_methods($testBdd));

//var_dump($testBdd::getDb());
<?php

class Autoload{
    public static function requireAuto($className){
        require_once __DIR__ . '/' . str_replace('\\', DIRECTORY_SEPARATOR, $className . '.php');
    }
}

spl_autoload_register(array('Autoload','requireAuto'));
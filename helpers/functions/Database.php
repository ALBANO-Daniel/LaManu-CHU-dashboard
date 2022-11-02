<?php
require_once(__DIR__.'/../../config/config.php');

class Database{

    // private PDO $_pdo; // OR private object $_pd

    // a method to return the pdo connection
    public static function getInstance(){   // static so, it doenst need to make a new instance i.e.  new Database to be used...
        $pdo = new PDO(
            DSN,
            LOGIN,
            PASSWORD, // vars declared in the config.php
        );
        $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ); 
        return $pdo;
    }
}

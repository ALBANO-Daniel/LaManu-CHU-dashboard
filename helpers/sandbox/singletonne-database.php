<?php

class Database
{
    private static $_pdo;
    // private static PDO $_pdo;

    public static function getInstance()
    {
        if(is_null(self::$_pdo))
        {
            self::$_pdo = new PDO(DSN, LOGIN, PASSWORD);

            // php 7 -- needed to return errors...
            self::$_pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


            self::$_pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
        }
        return self::$_pdo;
    }
}
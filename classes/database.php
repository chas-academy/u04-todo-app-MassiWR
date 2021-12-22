<?php 

if(!defined('__CONFIG__')) {
    exit('You do not have a config file'); 
}

class database {

    protected static $connection;
    private function __construct() {
        $host = '127.0.0.1';
        $db = 'toDoList';
        $user = 'root';
        $pass = '';
        $charset = 'utf8mb4';
        $dsn = "mysql:host=$host; dbname=$db; charset=$charset";
        try {
            self::$connection = new PDO($dsn, $user, $pass);
            self::$connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            self::$connection->setAttribute(PDO::ATTR_PERSISTENT, false);
        }
        catch(PDOException $e) {
            echo "Could not connect to database."; exit;
        }
    }

    public static function getConnection() {
        if(!self::$connection) {
            new database();
        }

        return self::$connection;
    }
}
<?php 
    // If there is no constant defined called __CONFIG__, do not load this file
    if(!defined('__CONFIG__')) {
        exit('File not found'); 
        
    }

    // Allow errors
    error_reporting(-1);
    ini_set('display_errors', 'on');
    
    // Include the database.php file
    include_once "classes/database.php";
    // Connection object of the database class
    $connection = database::getConnection(); 

    // Include the function and crud files
    include_once "functions.php";
    include_once "update.php";
    include_once "create.php";
    include_once "read.php";
    include_once "delete.php";


?>


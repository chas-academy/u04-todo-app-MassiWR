<?php 
    
    // If there is no constant defined called __CONFIG__, do not load this file
    if(!defined('__CONFIG__')) {
        exit('You do not have a config file'); 
    }

    // Allow errors
    error_reporting(-1);
    ini_set('display_errors', 'on');
    
    // Include the database.php file
    include_once "classes/database.php";
    // Object of the database class
    $connection = database::getConnection(); 


?>


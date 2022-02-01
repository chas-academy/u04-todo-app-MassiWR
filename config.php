<?php 
    // If there is no constant defined called __CONFIG__, do not load this file, redirect to index.php
    if(!defined('__CONFIG__')) {
        header('Location: index.php');
    }

    // Allow errors
    error_reporting(-1);
    ini_set('display_errors', 'on');
    
    // Include the database.php file
    include_once "database/database.php";
  
    // Include the function and crud files
    include_once "functions.php";
    


?>


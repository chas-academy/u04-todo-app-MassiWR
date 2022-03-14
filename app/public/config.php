<?php
// If there is no constant defined called __CONFIG__, do not load this file, redirect to index.php
if (!defined('__CONFIG__')) {
    echo "ERROR";
}

// Allow errors
error_reporting(-1);
ini_set('display_errors', 'on');

// Include the database file
include_once "dbConnection.php";

// Include the functions and crud files
include_once "functions.php";

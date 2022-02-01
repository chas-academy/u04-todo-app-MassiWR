<?php 
if(!defined('__CONFIG__')) {
    header("Location: index.php");
}

//Mysql connection config
$host = '127.0.0.1';
$user = 'root';
$pass = '';
$db = 'todo';

$connection = mysqli_connect($host,$user,$pass,$db);

if(!$connection){
	die('Mysql connection error : '.mysqli_connect_error());
}



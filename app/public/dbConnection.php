<?php
$servername = "127.0.0.1";
$username = "root";
$password = "";

try {
    $connection = new PDO("mysql:host=$servername;dbname=test", $username, $password);
    // set the PDO error mode to exception
    $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);



}
catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
?>
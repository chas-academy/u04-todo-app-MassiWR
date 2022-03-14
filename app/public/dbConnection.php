<?php
$servername = "mariadb";
$username = "root";
$password = "secret";

try {
    $connection = new PDO("mysql:host=$servername;dbname=todos", $username, $password);
    // set the PDO error mode to exception
    $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);



}
catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
?>
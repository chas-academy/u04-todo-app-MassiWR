<?php

include_once "config.php";

function delete_task($user_id){
    
    $connection = database::getConnection();
    $sql = 'DELETE FROM todolist WHERE user_id = ?';
    
    try {
        $results = $connection->prepare($sql);
        $results->bindValue(1, $user_id, PDO::PARAM_INT);
        $results->execute();
    } catch (Exception $e) {
        echo "Error!: " . $e->getMessage() . "<br />";
        return false;
    }
    return true;
}


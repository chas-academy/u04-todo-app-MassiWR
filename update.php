<?php 
// Allow the config

// require the config file


function get_task($user_id){
    
    $connection = database::getConnection();
    $sql = 'SELECT * FROM todolist WHERE user_id = ?';
    
    try {
        $results = $connection->prepare($sql);
        $results->bindValue(1, $user_id, PDO::PARAM_INT);
        $results->execute();
    } catch (Exception $e) {
        echo "Error!: " . $e->getMessage() . "<br />";
        return false;
    }
    return $results->fetch();
}


?>  

<?php 
include_once "config.php";

if(isset($_POST['delete'])) {
    if(delete_task(filter_input(INPUT_POST, 'delete', FILTER_SANITIZE_NUMBER_INT))) {
        header('location: index.php?msg=Task+deleted');
        exit();
    } else {
        header('location: index.php?msg=Unable+to+delete+task');
        exit();
    }
}
if(isset($_GET['msg'])) {

    $error_message = trim(filter_input(INPUT_GET, 'msg'));

}


function get_task_list() {
    $connection = database::getConnection();
    try {
        return $connection->query('SELECT user_id, title, task, checked FROM todolist');
    } catch(Exception $e) {
        echo "ERROR!: " . $e->getMessage() . "</br>";
        return array();
        }
}


if(isset($error_message)) {
    echo "<p class='error_message'> $error_message </p>";
}


foreach(get_task_list() as $item) { ?>
        <section class="todo-item"> <?php
        echo "<a href='update.php?id=" . $item['user_id'] . "'>" . $item['title'] . "<br />" . $item['task'] . "<a/>"; 
        echo "<form method='post' action='read.php'>\n";
        echo "<input type='hidden' value='". $item['user_id'] . " 'name = 'delete' />\n";
        echo "<input type='submit' class='button' value='Delete' />\n";
        echo "</form>";
        
        ?>
        </section> 
        <?php 
    
} 
?>



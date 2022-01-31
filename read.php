<?php 
include_once "config.php";

function get_task_list() {
    $connection = database::getConnection();
    try {
        return $connection->query('SELECT user_id, title, task, checked FROM todolist');
    } catch(Exception $e) {
        echo "ERROR!: " . $e->getMessage() . "</br>";
        return array();
        }
}

foreach(get_task_list() as $item) {
    ?>
    <section class="todo-item">
        <?php 
        echo $item['title'] .  "<br>" .  $item['task'];
        ?>
    </section> <?php 
    
} 
?>



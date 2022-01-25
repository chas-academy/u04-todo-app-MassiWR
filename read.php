<?php 
if(!defined('__CONFIG__')) {
    exit('file not found');
}
include_once "config.php";

    $connection = database::getConnection();
    $read = $connection->query("SELECT * FROM todolist ORDER BY user_id DESC");
    ?>
       <div class="show-todo-section">
            <?php while($rows = $read->fetch(PDO::FETCH_ASSOC)) { 
                ?>
                    <div class="todo-item">
                    <section class="title"><?php echo $rows['title'];?></section>
                    <section class="task"><?php echo $rows['task'];?></section>            
                    </div>
                <?php }
                ?>
       </div>
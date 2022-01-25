<?php 
if(!defined('__CONFIG__')) {
    header("Location: ../index.php");
}
?>

    <section class="container">
    <section class="add_container">
    <section class="header-title">TODO APP</section>
    <form method="post" action="" class="input_form">
    <input type="text" name="title" class="task_input" placeholder="Task title" autocomplete="off">
    <input type="text" name="task" class="desc_input" placeholder="Task description" autocomplete="off">
    <button type="submit" name="submit" id="add-btn-task" class="add_btn">Add Task</button>
    </form>
    </section>
    <?php 
        if ($_SERVER["REQUEST_METHOD"] == "POST") {

            if (empty($_POST['title'])) { ?>
                <section class="show-error">*You must fill in the task</section> 
                 <?php

            }   else  {
            $title = $_POST['title'];
            $task = $_POST['task'];
            $sql = $connection->prepare("INSERT INTO todolist(title, task) VALUES (:title, :task)");
            $sql->bindParam(':title', $title, PDO::PARAM_STR);
            $sql->bindParam(':task', $task, PDO::PARAM_STR);
            $sql->execute();
 
        }
        
}





<?php
    include_once "config.php";

    if($_SERVER['REQUEST_METHOD'] == 'POST') {

        $title = trim(filter_input(INPUT_POST, 'title', FILTER_SANITIZE_FULL_SPECIAL_CHARS));
        $task = trim(filter_input(INPUT_POST, 'task', FILTER_SANITIZE_FULL_SPECIAL_CHARS));

        if(empty($title)) {
            $error_message = "*Please fill in the required fields: Title of the task";
        } else {
            if(add_tasks($title, $task)) {
                header('Location: index.php');
                exit;
            } else {
                $error_message = "Could not add project";
            }
        }

    }

function add_tasks($title, $task) {

    $connection = database::getConnection();
    $sql = 'INSERT INTO todolist(title, task) VALUES(?,?)';

    try {
        $result = $connection->prepare($sql);
        $result->bindValue(1, $title, PDO::PARAM_STR);
        $result->bindValue(2, $task, PDO::PARAM_STR);
        $result->execute();
    } catch(Exception $e) {
        echo "Error: " . $e->getMessage() . "<br />"; 
        return false;
    }
    return true;
}





?>


    
    <section class="container">
    <section class="add_container">
    <section class="header-title">TODO APP</section>
    <?php if(isset($error_message)) {
        echo "<p class='error_message'> $error_message </p>";
    }
    ?>
    <form method="post" action="index.php" class="input_form">
    <input type="text" name="title" class="task_input" placeholder="Task title" autocomplete="off">
    <input type="text" name="task" class="desc_input" placeholder="Task description" autocomplete="off">
    <button type="submit" name="submit" id="add-btn-task" class="add_btn">Add Task</button>
    </form>
    </section>
  







<?php
    include_once "config.php";
    
    if(isset($_GET['id'])) {
        list($user_id, $title, $task) = get_task(filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT));
    }
   

    if($_SERVER['REQUEST_METHOD'] == 'POST') {
        $user_id = filter_input(INPUT_POST, 'user_id', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $title = trim(filter_input(INPUT_POST, 'title', FILTER_SANITIZE_FULL_SPECIAL_CHARS));
        $task = trim(filter_input(INPUT_POST, 'task', FILTER_SANITIZE_FULL_SPECIAL_CHARS));

        if(empty($title)) {
            $error_message = "*Please fill in the required fields: Title";
        } else {
            if(add_tasks($user_id, $title, $task)) {
                header('Location: index.php');
                exit;
            } else {
                $error_message = "Could not add project";
            }
        }

    }

function add_tasks($user_id, $title, $task) {

    $connection = database::getConnection();
    $sql = 'INSERT INTO todolist(user_id, title, task) VALUES(?,?,?)';

    try {
        $result = $connection->prepare($sql);
        $result->bindValue(1, $user_id, PDO::PARAM_INT);
        $result->bindValue(2, $title, PDO::PARAM_STR);
        $result->bindValue(3, $task, PDO::PARAM_STR);
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
    <form method="post" action="index.php" class="input_form">
    <input type="text" name="title" class="task_input" placeholder="Task title" autocomplete="off">
    <input type="text" name="task" class="desc_input" placeholder="Task description" autocomplete="off">
    <button type="submit" name="submit" id="add-btn-task" class="add_btn">Add Task</button>
    </form>
    </section>
  







<?php 

    // Allow the config
    define('__CONFIG__', true);
    require_once "config.php";
    // Set error reporting on
    error_reporting(-1);
    ini_set('display', 'on');
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Do to list</title>
    <link rel="stylesheet" href="css/styles.css">
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>

</head>
<body>
    
 
    <section class="container">
    <form method="post" action="" class="input_form">

    <section class="header">
        <h1>To do list</h1>
    </section>

    <input type="text" name="title" class="task_title" placeholder="Task">
    <button type="submit" name="submit" id="add_btn" class="add_desc">Add description</button>
    <input type="text" name="task" class="task_input" placeholder="Task description">
    <button type="submit" name="submit" id="add_btn" class="add_btn">Add Task</button>
    </form>
    </section>

    <script src="js/main.js"></script>

</body>
</html>
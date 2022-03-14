<?php

include('config.php');

function print_header($title)

{
    echo <<<HEADER




<!DOCTYPE html>
<html>
	<head>
    <meta charset="UTF-8">
    <title>$title</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>

</head>


<body>
   

HEADER;
}

function print_footer()

{
    echo <<<FOOTER

    </body>
</html>

FOOTER;
}


//Create a post
if (isset($_POST['add'])) {
    $title = $_POST['title'];
    $task = $_POST['task'];
    $stmt = $connection->prepare('INSERT INTO todos (title, task, done) VALUES (?,?, 0)');
    $stmt->execute([$title, $task]);
    if (headers_sent()) {
        die("Redirect failed.");
    }
    else {
        $connection = null;
        exit(header("Location: index.php"));
    }

}

// Delete a post
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $stmt = $connection->prepare('DELETE FROM todos WHERE id = :id');
    $stmt->bindValue('id', $id);
    $stmt->execute();

}

// Mark a post as complete
if (isset($_GET['taskDone'])) {
    $id = $_GET['taskDone'];
    $stmt = $connection->prepare('UPDATE todos SET done = true WHERE id = :id');
    $stmt->bindValue(':id', $id);
    $stmt->execute();

}


if (isset($_POST['update'])) {
    $changeTitle = $_POST['title'];
    $changeTask = $_POST['task'];
    $id = $_GET['editTask'];
    $stmt = $connection->prepare('UPDATE todos SET title = :title, task = :task WHERE id = :id');
    $stmt->bindParam(':id', $id);
    $stmt->bindParam(':title', $changeTitle);
    $stmt->bindParam(':task', $changeTask);
    $stmt->execute();

}
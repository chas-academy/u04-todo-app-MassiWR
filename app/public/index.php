<?php
// Allow the config
define('__CONFIG__', true);
// require the config file
include('config.php');


?>


<?= print_header('ToDo')?>

<?php

// SELECT title and task to use them as placeholder when editing a task
$todos = $connection->query("SELECT title, task FROM todos");
$row = $todos->fetch(PDO::FETCH_ASSOC);


//If edit button is pressed, show this form to edit and update a task 
if (isset($_GET['editTask'])) { ?>
			<form action="" method="post">
					<input type="text" name="title" class="title_input" placeholder="<?php echo $row['title']; ?> " required>
					<input type="text" name="task" class="task_input" placeholder="<?php echo $row['task']; ?>">
					<button type="submit" name="update">Update</button>
			</form>

			<?php
}
// The form to add a post
else { ?> 	
			<form action="" method="post">
					<input type="text" name="title" class="title" placeholder="Enter task title" required>
					<input type="text" name="task" class="task" placeholder="Enter task">
					<button type="submit" class="pulse" name="add">Add Task</button>
			</form>
			<?php
}?>

<?php


// Fetch the data and show all the titles and tasks
$todos = $connection->query("SELECT * FROM todos ORDER BY id DESC");
while ($row = $todos->fetch(PDO::FETCH_ASSOC)) {
	echo "<br>";
	echo $row['title'] . "\n";
	echo $row['task'] . "\n";
	echo "<br>";
?> 
    <a href="index.php?taskDone=<?php echo $row['id']; ?>"><button>Complete</button></a>  
    <a href="index.php?editTask=<?php echo $row['id']; ?>"><button>Edit</button></a> 
	<a href="index.php?delete=<?php echo $row['id']; ?>"><button>Delete</button></a> 
    
<?php
}
?>

<?= print_footer()?>


<?php
// Allow the config
define('__CONFIG__', true);
// require the config file
include('config.php');


?>

<?= print_header('ToDo')?>

<?php

// SELECT title and task to use them as placeholder when editing a task
$todos = $connection->query("SELECT * FROM todos");
$row = $todos->fetch(PDO::FETCH_ASSOC);

?> 

<?php 
//If edit button is pressed, show this form to edit and update a task 
if (isset($_GET['editTask'])) { ?>
			<form action="" method="post">
					<input type="text" name="title" placeholder="<?php echo "Edit " . $row['title']; ?> " required>
					<input type="text" name="task" placeholder="<?php echo "Edit " .  $row['task']; ?>">
					<button type="submit"  class="btn-grad" name="update">Update</button>
			</form>
			<?php
}
// The form to add a post
else { ?> 	
			<form action="" method="post">
					<input type="text" name="title" placeholder="Enter task title" required>
					<input type="text" name="task" placeholder="Enter task">
					<button type="submit" class="btn-grad" name="add">Add Task</button>
			</form>
			<?php
}?>

<?php


// Fetch the data and show all the titles and tasks
$todos = $connection->query("SELECT * FROM todos ORDER BY id DESC");
while ($row = $todos->fetch(PDO::FETCH_ASSOC)) {
	echo "<br>";
?>
	<section class="card"> <?php 

	  if($row['done'] === 1) { ?>
		
		<section class="title-done"><?php echo $row['title'] . "\n"; ?></section> 
		<section class="task"><?php echo $row['task'] . "\n"; ?> <br></section>
		
		<?php

	  } else { ?>
		<section class="title"><?php echo $row['title'] . "\n"; ?></section> 
		<section class="task"><?php echo $row['task'] . "\n"; ?><br></section> <?php
	  }

	  ?>
	   <section class="icons">
	   <br>
	   <a href="index.php?taskDone=<?php echo $row['id']; ?>"><button>&#10003</button></a> 
	   <a href="index.php?editTask=<?php echo $row['id']; ?>"><button>&#9998;</button></a> 
	   <a href="index.php?delete=<?php echo $row['id']; ?>"><button>&#10005;</button></a>
	   </section>

	</section> 
<?php
}
?>

<?= print_footer()?>


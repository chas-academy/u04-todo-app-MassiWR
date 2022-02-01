<?php 
    // Allow the config
    define('__CONFIG__', true);
    // require the config file
    require_once "config.php";
 
?>

    <!-- HTML function calls -->
    <?=print_header('Home')?>
    <section class="container">
		<section class="add_container">
		<section class="header-title">TODO APP</section>
			<?php if(isset($_GET['editId'])){ ?>
			<form action="" method="post">
					<a href="index.php" class="btn"></a></div>
					<input type="hidden" name="row_id" value="<?php echo $edit_record['id']; ?>">
					<input type="text" name="title" class="title_input" placeholder="Enter title" value="<?php echo $edit_record['title']; ?>" required>
					<input type="text" name="task" class="task_input" placeholder="Enter task" value="<?php echo $edit_record['task']; ?>">
					<button type="submit" class="button" name="update">Update</button>
			</form>

			<?php }else{ ?>
			<form action="" method="post">
					<input type="text" name="title" class="title_input" placeholder="Enter task title" required>
					<input type="text" name="task" class="task_input" placeholder="Enter task">
					<button type="submit" class="button" name="add">Add Task</button>
			</form>
			<?php } ?>
			</section>
			</section>
    <?=print_footer()?>

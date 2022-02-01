<?php 
    // Allow the config
    define('__CONFIG__', true);
    // require the config file
    include('database/database.php'); 
    include('functions.php');
 
?>

    <!-- HTML function calls -->
    <?=print_header('Home')?>
    <section class="container">
		<section class="add_container">
		<section class="header-title">TODO APP</section>
			<?php if(isset($_GET['editId'])){ ?>
			<form action="" method="post">
					<input type="hidden" name="task_id" value="<?php echo $edit_record['id']; ?>">
					<input type="text" name="title" class="title_input" placeholder="Enter title" value="<?php echo $edit_record['title']; ?>" required>
					<input type="text" name="task" class="task_input" placeholder="Enter task" value="<?php echo $edit_record['task']; ?>">
					<button type="submit" class="pulse" name="update">Update</button>
			</form>

			<?php }else{ ?>
			<form action="" method="post">
					<input type="text" name="title" class="title" placeholder="Enter task title" required>
					<input type="text" name="task" class="task" placeholder="Enter task">
					<button type="submit" class="pulse" name="add">Add Task</button>
			</form>
			<?php } ?>
			</section>
			</section>


            <?php while($row = mysqli_fetch_array($todo_list)) { ?>
				<section class="todo-item"><?php 

                ?>
                <input type="checkbox" name="packersOff" id="packers" value="1"/>
                <label for="packers" class="strikethrough"><?php echo $row['title'] . "<br />"; ?><?php 
				 echo $row['task']; ?>
                 </label> 
				<a href="?deleteId=<?php echo $row['id']; ?>"><button class="raise">Delete</button></a>
				<a href="?editId=<?php echo $row['id']; ?>"><button class="raise">Edit</button></a>
				</section>
				<?php } ?>
    <?=print_footer()?>

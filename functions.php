<?php 

include('config.php');


function print_header($title) {
echo<<<HEADER
<!DOCTYPE html>
<html>
	<head>
    <meta charset="UTF-8">
    <title>$title</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/styles.css">
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>

</head>


<body>
   

HEADER;
}

function print_footer() {
echo <<<FOOTER

    </body>
</html>

FOOTER;
}

//Read
$todo_list = mysqli_query($connection,"SELECT * FROM todo order by id desc");


//Create 
if(isset($_POST['add'])){
	$createTitle= $_POST['title'];
	$createTask = $_POST['task'];
	$insert_record = mysqli_query($connection,"INSERT INTO todo SET title = '$createTitle', task='$createTask'");
	if(!$insert_record){
		echo "Error : ".mysqli_error($connection);
	}
	header('location:index.php');
}




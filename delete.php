<?php

include_once "classes/database.php";

function Redirect($url, $permanent = false)
{
    header('Location: ' . $url, true, $permanent ? 301 : 302);

    exit();
}


    $connection = database::getConnection();
    $read = $connection->query("SELECT * FROM todolist ORDER BY user_id DESC");

    if(isset($_POST['delete'])) {

        $id_to_delete = $_POST['id_to_delete'];
        $read = $connection->prepare("DELETE FROM todolist WHERE user_id = $id_to_delete");
        $read->execute();

    }



?>
<!--- DELETE FORM -->
<section class="show-todo-section">
<form action="delete.php" method="POST">
        <?php while($id_to_delete = $read->fetch(PDO::FETCH_ASSOC)) { ?>
        <input type="hidden" name="id_to_delete"  value="<?php echo $id_to_delete['user_id'] ?>">
        <input type="submit" name="delete" value="Delete" class="">
        <?php } ?>
</form>

</section>

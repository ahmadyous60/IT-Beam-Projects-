<?php 
include 'config.php';
$db = new Database();
$data = $db->display();
$total = mysqli_num_rows($data);

if (isset($_GET['id'])) {
    $id = intval($_GET['id']); 

    $result = $db->delete($id);

    if (!$result) {
        echo("Query Failed! ");
    } 
    else {
        header('Location: display.php?delete_msg=You have deleted the record successfully.');
        exit();
    }
}
?>
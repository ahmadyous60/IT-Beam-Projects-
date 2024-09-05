<?php 
include 'config.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $query = "DELETE FROM student WHERE id = '$id'";
    $result = mysqli_query($conn, $query);

    if (!$result) {
        echo("Query Failed! " . mysqli_error($conn));
    } 
    else {
        header('Location: view.php?delete_msg=You have deleted the record successfully.');
        exit();
    }
}
?>

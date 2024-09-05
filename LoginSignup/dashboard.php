<?php
include "config.php";
session_start();
if(!isset($_SESSION['username'])){
    header('location: login.php');
}

?>

<h1>Welcome <?php echo $_SESSION['username'];?>
</h1>

<a href ="logout.php" style="text-decoration: none; cursor: pointer; color: blue;">Logout</a>
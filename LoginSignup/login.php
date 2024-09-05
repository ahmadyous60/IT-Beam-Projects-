<?php
include "config.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form</title>
</head>
<body>
    <form method="POST">
        <label for="Email"><b>Email:</b></label>
        <input type = "email" name = "email"   placeholder = "Enter your Email" required><br><br>
        <label for="password"><b>Password:</b></label>
        <input type="password" id="password" name="password" placeholder="Enter Password" required><br><br>

        <input type="Submit" value = "Login" name = "login_btn">
        
    </form>

    <?php
    session_start();
    if(isset($_POST["login_btn"])){
        $email = $_POST['email'];
        $pass = $_POST['password'];

        $quer = "SELECT * FROM login WHERE email = '$email' && password = '$pass' ";
        $query = mysqli_query($conn , $quer);
        $row = mysqli_num_rows($query);
        $fetch = mysqli_fetch_array($query);

        if($row == 1){
            $username = $fetch['username'];
            $_SESSION['username']=$username;
            header("location: dashboard.php");
            exit();
        }
        else{
            echo "<p style = 'color:red;'>Invalid email/password</p>";
        }
    }
    ?>
</body>
</html>
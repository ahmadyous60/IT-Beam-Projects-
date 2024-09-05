<?php
include 'config.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
</head>
<body>
<form method="POST">
        <label for="text"><b>Username:</b></label>
        <input type = "text" name = "username"   placeholder = "Enter your Username" required><br><br>
        <label for="Email"><b>Email:</b></label>
        <input type = "email" name = "email"   placeholder = "Enter your Email" required><br><br>
        <label for="password"><b>Password:</b></label>
        <input type="password" id="password" name="password" placeholder="Enter Password" required><br><br>
        <label for="confirm_password"><b>Confirm Password:</b></label>
        <input type="password" id="confirm_password" name="confirm_password" placeholder="Retype Password" required><br><br>

        <input type="Submit" value = "Signup" name = "Signup_btn">
        
    </form>
    <br>
    <p>If you already have an account</p><a href ="login.php".> Click here to Login!</a>

<?php

session_start();

if(isset($_POST['Signup_btn'])){
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];
    
    if ($password === $confirm_password) {
        $query = "INSERT INTO login (username, email, password , confirm_password) VALUES ('$username','$email','$password','$confirm_password')";        
        $result = mysqli_query($conn, $query);
        if ($result) {
           echo "Sign up successful!";
        } 
        else {
            echo "Error: " . mysqli_error($conn);
        }
    } 
    else {
        echo "Passwords do not match.";
    }
}
?>
</body>
</html>
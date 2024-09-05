<?php
include 'config.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form</title>
</head>
<body>
    <form action = "" method = "POST" >
        <label for="firstname"><b>First name:</b></label>
        <input type = "text" name = "firstname" placeholder = "Enter your first name" required><br><br>
        <label for="lastname"><b>Last name:</b></label>
        <input type = "text" name = "lastname" placeholder = "Enter your Last name" required><br><br>
        <label for="Email"><b>Email:</b></label>
        <input type = "email" name = "email"   placeholder = "Enter your Email" required><br><br>
        <label for="password"><b>Password:</b></label>
        <input type="password" id="password" name="password" placeholder="Enter Password" required><br><br>
        <label for="gender"><b>Gender</b></label><br>
        <input type="radio" id="male" name="gender" value="Male" required>
        <label for="male">Male</label><br>
        <input type="radio" id="female" name="gender" value="Female" required>
        <label for="female">Female</label><br>

        <input type="Submit" value = "Submit" name = "Submit">
   </form>


   <?php
   
   if(isset($_POST['Submit']))
        {
            $FirstName = $_POST ['firstname'];
            $LastName = $_POST ['lastname'];
            $Email = $_POST ['email'];
            $Gender = $_POST['gender'];
            $Password = password_hash($_POST['password'], PASSWORD_DEFAULT);

            $query = "INSERT INTO student (firstname, lastname, email, gender, password) VALUES ('$FirstName', '$LastName', '$Email', '$Gender', '$Password')";
    
            $result = mysqli_query($conn , $query);
        
        }
   
   ?>
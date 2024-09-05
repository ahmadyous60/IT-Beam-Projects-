<?php
include 'config.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insert</title>
</head>
<form action = "" method = "POST" >
        <label for="StudentName"><b>Student Name:</b></label>
        <input type = "text" name = "StudentName" placeholder = "Enter Student Name" required><br><br>
        <label for="Age"><b>Age:</b></label>
        <input type = "text" name = "Age" placeholder = "Enter Age" required><br><br>
        <label for="City"><b>City:</b></label>
        <input type = "text" name = "City"   placeholder = "Enter your City" required><br><br>

        <input type="Submit" value = "Submit" name = "Submit">
   </form>

<?php
$insertdata = new Database;

if(isset($_POST['Submit'])) {
    $StudentName = $_POST['StudentName'];
    $Age = $_POST['Age'];
    $City = $_POST['City'];
    
    if ($insertdata->insert($StudentName, $Age, $City)) {
        echo "<script>alert('Record inserted successfully');</script>";
    } 
    else {
        echo "<script>alert('Failed to insert record');</script>";
    }

    echo "<script>setTimeout(function() { window.location.href = '" . $_SERVER['PHP_SELF'] . "'; }, 100);</script>";
    exit();
}
?>
</body>
</html>
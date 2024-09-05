<?php
include 'config.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>View</title>
</head>
<body>
    <table>
        <tr>
            <th>id</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Email</th>
            <th>Gender</th>
            <th>Password</th>
            <th colspan = '3'>Action</th>

        </tr>
<?php
$query = "SELECT * FROM student";
$data = mysqli_query($conn , $query);
$total = mysqli_num_rows($data);

if($total !=0){
    while($result= mysqli_fetch_assoc($data)){
        echo"<tr>
            <td>".$result['id']."</td>
            <td>".$result['FirstName']."</td>
            <td>".$result['LastName']."</td>
            <td>".$result['Email']."</td>
            <td>".$result['Gender']."</td>
            <td>".$result['password']."</td>
            <td><a href='update.php?id=" . $result['id'] . "'>Edit</a></td>
            <td><a href='delete.php?id=" . $result['id'] . "'>Delete</a></td>
            <td><a href='suview.php?id=" . $result['id'] . "'>View</a></td>
        
        </tr>";
    }
}
else{
    echo "<h2>No Record Found<h2>";
}
if (isset($_GET['delete_msg'])) {
    echo "<p>" . $_GET['delete_msg'] . "</p>";
}


?>
</table>


</body>
</html>
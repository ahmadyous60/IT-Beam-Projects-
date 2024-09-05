<?php
include 'config.php';

$db = new Database();
$data = $db->display();
$total = mysqli_num_rows($data);
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
        <th>Student Name</th>
        <th>Age</th>
        <th>City</th>
        <th colspan='3'>Action</th>
    </tr>
<?php

if($total != 0){
    while($result = mysqli_fetch_assoc($data)){
        echo "<tr>
            <td>".$result['id']."</td>
            <td>".$result['StudentName']."</td>
            <td>".$result['Age']."</td>
            <td>".$result['City']."</td>
            <td><a href='update.php?id=" . $result['id'] . "'>Update</a></td>
            <td><a href='delete.php?id=" . $result['id'] . "'>Delete</a></td>
            <td><a href='sview.php? id=" . $result['id'].  "'>View</a></td>
        </tr>";
    }
} 
else {
    echo "<h2>No Record Found</h2>";
}
if (isset($_GET['delete_msg'])) {
    echo "<p>" . $_GET['delete_msg'] . "</p>";
}
?>
</table>


</body>
</html>
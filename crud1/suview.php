<?php
include 'config.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $query = "SELECT * FROM student WHERE id = '$id'";
    $data = mysqli_query($conn, $query);


    if ($data && mysqli_num_rows($data) > 0) {
        $result = mysqli_fetch_assoc($data);
    } 
    else {
        echo "<h2>No Record Found</h2>";
        exit;
    }
} 
else {
    echo "<h2>Invalid Request</h2>";
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>View User</title>
</head>
<body>
    <h2 style = "display:flex; justify-content: center">User Details</h2>
    <table>
        <tr>
            <th>ID</th>
            <td><?php echo $result['id']; ?></td>
        </tr>
        <tr>
            <th>First Name</th>
            <td><?php echo $result['FirstName']; ?></td>
        </tr>
        <tr>
            <th>Last Name</th>
            <td><?php echo $result['LastName']; ?></td>
        </tr>
        <tr>
            <th>Email</th>
            <td><?php echo $result['Email']; ?></td>
        </tr>
        <tr>
            <th>Gender</th>
            <td><?php echo $result['Gender']; ?></td>
        </tr>
        <tr>
            <th>Password</th>
            <td><?php echo $result['password']; ?></td>
        </tr>
    </table>
    <br>
    <a href="view.php">Back to List</a>
</body>
</html>

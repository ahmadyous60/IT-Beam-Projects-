<?php
include 'config.php';

$db = new Database();

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $result = $db->sview($id);

    if ($result && mysqli_num_rows($result) > 0) {
        $data = mysqli_fetch_assoc($result);
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
    <h2 style="display:flex; justify-content: center">User Details</h2>
    <table>
        <tr>
            <th>ID</th>
            <td><?php echo $data['id']; ?></td>
        </tr>
        <tr>
            <th>First Name</th>
            <td><?php echo $data['StudentName']; ?></td>
        </tr>
        <tr>
            <th>Age</th>
            <td><?php echo $data['Age']; ?></td>
        </tr>
        <tr>
            <th>City</th>
            <td><?php echo $data['City']; ?></td>
        </tr>
    </table>
    <br>
    <a href="display.php">Back to List</a>
</body>
</html>

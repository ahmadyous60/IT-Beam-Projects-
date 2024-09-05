<?php
include 'config.php';
$update_success = null;
$result = null;

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $query = "SELECT * FROM student WHERE id = '$id'";
    $data = mysqli_query($db->db, $query);

    if ($data) {
        $result = mysqli_fetch_assoc($data);
    } 
    else {
        echo "Error fetching record: " . mysqli_error($db->db);
        exit;
    }
}

if (isset($_POST['update_btn'])) {
    $id = $_POST['id'];
    $StudentName = $_POST['StudentName'];
    $Age = $_POST['Age'];
    $City = $_POST['City'];

    $update_result = $db->update($StudentName, $Age, $City, $id);

    if ($update_result) {
        $update_success = true;
    } else {
        $update_success = false;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update</title>
</head>
<body>
<form action="" method="POST">
    <input type="hidden" name="id" value="<?php echo isset($result['id']) ? $result['id'] : ''; ?>">

    <label for="StudentName"><b>Student Name:</b></label>
    <input type="text" name="StudentName" placeholder="Enter Student Name" value="<?php echo isset($result['StudentName']) ? $result['StudentName'] : ''; ?>" required><br><br>
    <label for="Age"><b>Age:</b></label>
    <input type="text" name="Age" placeholder="Enter your Age" value="<?php echo isset($result['Age']) ? $result['Age'] : ''; ?>" required><br><br>
    <label for="City"><b>City:</b></label>
    <input type="text" name="City" placeholder="Enter your City" value="<?php echo isset($result['City']) ? $result['City'] : ''; ?>" required><br><br>

    <input type="submit" value="Update" name="update_btn">
</form>

<script>
<?php if ($update_success === true) : ?>
    <script>
        alert("Record updated successfully!");
    </script>
<?php elseif ($update_success === false) : ?>
    <script>
        alert("Failed to update record.");
    </script>
<?php endif; ?>
</script>
</body>
</html>

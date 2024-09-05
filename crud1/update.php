<?php
include 'config.php';
$update_success = null;

if (isset($_GET['id'])) {
    $id = $_GET['id'];
 
    $query = "SELECT * FROM student WHERE id = '$id'";
    $data = mysqli_query($conn, $query);

    if ($data) {
        $result = mysqli_fetch_assoc($data);
    } 
    else {
        echo "Error fetching record: " . mysqli_error($conn);
        exit;
    }
}

if (isset($_POST['update_btn'])) {

    $id = $_POST['id'];
    $FirstName = $_POST['firstname'];
    $LastName = $_POST['lastname'];
    $Email = $_POST['email'];
    $Gender = $_POST['gender'];
    $Password = $_POST['password'];

    if (!empty($Password)) {

        $hpass = password_hash($Password, PASSWORD_BCRYPT);
        $query = "UPDATE student SET FirstName='$FirstName', LastName='$LastName', Email='$Email', Gender='$Gender', password='$hpass' WHERE id=$id";
    } 
    else {
        $query = "UPDATE student SET FirstName='$FirstName', LastName='$LastName', Email='$Email', Gender='$Gender' WHERE id=$id";
    }

    $update_result = mysqli_query($conn, $query);

    if ($update_result) {
        $update_success = true; 
    } 
    else {
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

    <label for="firstname"><b>First name:</b></label>
    <input type="text" name="firstname" placeholder="Enter your first name" value="<?php echo isset($result['FirstName']) ? $result['FirstName'] : ''; ?>" required><br><br>
    <label for="lastname"><b>Last name:</b></label>
    <input type="text" name="lastname" placeholder="Enter your last name" value="<?php echo isset($result['LastName']) ? $result['LastName'] : ''; ?>" required><br><br>
    <label for="email"><b>Email:</b></label>
    <input type="email" name="email" placeholder="Enter your email" value="<?php echo isset($result['Email']) ? $result['Email'] : ''; ?>" required><br><br>
    <label for="gender"><b>Gender</b></label><br>
    <input type="radio" id="male" name="gender" value="Male" <?php echo (isset($result['Gender']) && $result['Gender'] === 'Male') ? 'checked' : ''; ?> required>
    <label for="male">Male</label><br>
    <input type="radio" id="female" name="gender" value="Female" <?php echo (isset($result['Gender']) && $result['Gender'] === 'Female') ? 'checked' : ''; ?> required>
    <label for="female">Female</label><br>
    <label for="password"><b>Password:</b></label>
    <input type="password" id="password" name="password" placeholder="Enter new Password"><br><br>


    <input type="submit" value="Update" name="update_btn">

</form>

<script>
<?php if ($update_success === true) : ?>
    alert("Record updated successfully!");
<?php elseif ($update_success === false) : ?>
    alert("Failed to update record.");
<?php endif; ?>
</script>
</body>


</html>

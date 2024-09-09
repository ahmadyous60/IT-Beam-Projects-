<?php
include 'config.php';
if (isset($_POST['submit'])){
    echo $filename = $_FILES['file']['tmp_name'];

    if($_FILES['file']['size']>0){
        $file = fopen($filename, 'r');
        while(($getData = fgetcsv($file, 10000, ",")) !== FALSE){
            $sql = "INSERT into student (studentname, email, age) VALUES ('".$getData[0]."', '".$getData[1]."', '".$getData[2]."')";

            $result = mysqli_query($conn, $sql);

            if(!$result){
                echo "<script type = \"text/javascript\">
                alert(\"Invalid file: Please Upload CSV File.\");
                </script>";
            }
            else{
                echo "<script type = \"text/javascript\">
                alert(\"CSV File has been successfully imported.\");
                </script>";
            }
        }
        fclose($file);
        header("Location: " . $_SERVER['PHP_SELF'] . "?status=" . ($importSuccessful ? "success" : "error"));
        exit();
    }
}
if (isset($_POST['export'])) {
    header('Content-Type: text/csv; charset=utf-8');
    header('Content-Disposition: attachment; filename=data.csv');
    
    $output = fopen("php://output", "w");
    fputcsv($output, array('id','studentname', 'email', 'age'));
    
    $query = "SELECT * FROM student ORDER BY id ASC";
    $result = mysqli_query($conn, $query);
    
    while ($row = mysqli_fetch_assoc($result)) {
        fputcsv($output, $row);
    }
    
    fclose($output);
    exit();
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Import&Export</title>
</head>
<body>
    <form method="post" enctype="multipart/form-data">
        <input type="file" name="file" />
        <button type="submit" id="submit" name="submit" class="btn btn-primary button-loading" data-loading-text="Loading...">Upload</button>
        <button type="submit" id="submit" name="export" class="btn btn-primary button-loading" data-loading-text="Loading...">Export</button>
    </form>
</body>
</html>

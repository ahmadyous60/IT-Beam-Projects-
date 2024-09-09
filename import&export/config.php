<?php
$servername = 'localhost';
$usermame = 'root';
$pasword = "";
$dbname = "import_export";

$conn = mysqli_connect($servername , $usermame , $pasword , $dbname);

if($conn){
    echo "";
}
else{
    echo 'Unsuccessful';
}

?>
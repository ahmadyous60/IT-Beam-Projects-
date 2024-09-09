<?php
$servername = 'localhost';
$usermame = 'root';
$pasword = "";
$dbname = "joins";

$conn = mysqli_connect($servername , $usermame , $pasword , $dbname);

if($conn){
    echo "";
}
else{
    echo 'Unsuccessful';
}

?>
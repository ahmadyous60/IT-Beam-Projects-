<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "crud1";

$conn = mysqli_connect($servername , $username , $password , $dbname);

if($conn){
    echo "";

}
else{
    echo("Connection Failed");
}

?>

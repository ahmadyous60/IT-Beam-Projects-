<?php
session_start();

define("servername" , "localhost");
define("username" , "root");
define("password" , "");
define("dbname" , "crud2");

class Database{

    public $db;
    function __construct(){
        $conn = mysqli_connect(servername , username , password , dbname);
        $this->db = $conn;
        if(mysqli_connect_errno()){
            echo "Connection Unsuccessfull". mysqli_connect_error();
        }
    }

    public function insert($StudentName, $Age, $City) {
        $query = "INSERT INTO student (StudentName, Age, City) VALUES ('$StudentName', '$Age', '$City')";
        $result = mysqli_query($this->db, $query);
        return $result;
    }
    

    public function display(){
        $disp = mysqli_query($this->db, "SELECT * FROM student");
        return $disp;
    }

    public function sview($id){
        $spview = mysqli_query($this->db, "SELECT * FROM student where id = $id");
        return $spview;
    }
    public function update($StudentName , $Age , $City , $id){
        $upd = mysqli_query($this->db , "UPDATE student SET StudentName = '$StudentName' , Age = '$Age' , City = '$City' where id = '$id'");
        return $upd;
    }

    public function delete($id){
        $del = mysqli_query($this->db, "DELETE FROM student WHERE id = '$id'");
        return $del;
    }
}
$db = new Database();

?>
<?php

$server = "localhost";
 $username = "root";
 $password = "";
 $dbname = "presensi";

 $conn = mysqli_connect($server,$username,$password,$dbname);

 if($conn->connect_error){
    die("Connection Failed" .$conn->connect_error);
 }


?>
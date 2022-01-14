<?php
$host="localhost";
$user="deb85590_p22t3";
$password="zNuMsh7iP1";
$db="deb85590_p22t3";

$conn= new mysqli($host, $username, $password, $db);
if(!$conn){
    die("Error on the Connection" . $conn->connect_error);
}
?>
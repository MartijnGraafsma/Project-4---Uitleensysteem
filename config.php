
<!-- connect to database -->
<?php

$host="localhost";
$user="deb85590_p22t3";
$password="zNuMsh7iP1";
$db="deb85590_p22t3";

$conn=new mysqli($host, $user, $password, $db);

if($conn->connect_error) {
    die("Connection failed:" . $conn->connect_error);
}

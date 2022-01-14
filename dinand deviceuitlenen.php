<?php
$dbServername = "localhost";
$dbUsername = "root";
$dbPassword = "";
$dbName = "apparaten";

$Van = $_POST['Van'];
$Uitgeleend = $_POST['Uitgeleend'];
$Email = $_POST['Email'];
$Inleverdatum = $_POST['Inleverdatum'];

$conn = mysqli_connect($dbServername, $dbUsername, $dbPassword, $dbName);
if ($conn->connect_error){
    die ("connection failed: " . $conn->connect_error);
}
$sql = "INSERT INTO Devices (`Van`, `Uitgeleend`, `Email`, `Inleverdatum`) 
VALUES ('$Van', '$Uitgeleend', '$Email', '$Inleverdatum');";
mysqli_query($conn, $sql);

header("Location: Deviceuitlenen.html?DeviceUitgeleend");
?>
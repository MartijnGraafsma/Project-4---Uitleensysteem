<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="index.css">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300&display=swap" rel="stylesheet">
    <title>Login</title>
</head>
<body>

    <div class="login_container">
        <div class="login-text"><h3>Login</h3></div>
        <div class="login">
            <form class="login-form" method="POST" action="#">
                <div>
                    <input type="text" class="userinfo" name="username" placeholder="Gebruikersnaam">
                </div>
                <div>
                    <input type="password" class="userinfo" name="password" placeholder="Wachtwoord">
                </div>
                <div>
                    <center><button class="inloggen" name="submit" type="submit">Login</button><center>
                 </div>
            </form>
        </div>
        </div>
    </body>
</html>

<?php

//verbingden met database
include "config.php";

//checkt of de gebruikersnaam en wachtwoord overeen komen met een account uit de database
if(isset($_POST['submit'])) {
    $uname=$_POST['username'];
    $password=$_POST['password'];
    $sql=mysqli_query($conn, "SELECT wachtwoord from users where gebruikersnaam='$uname'");
    if ($row=mysqli_fetch_array($sql)) {
        if ($password==$row['wachtwoord']) {
            header("location:home.html");
            exit();
        }
        else    
            echo "<br><h2 class='onjuist'>wachtwoord is onjuist<h2>";
    }
    else
        echo "<br><h2 class='onjuist'>Gebruikersnaam is onjuist<h2>";
}

?>
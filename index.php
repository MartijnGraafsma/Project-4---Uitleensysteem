<?php
include "config.php";

$uname=$_POST['username'];
$password=$_POST['password'];


$sql= "SELECT * FROM users WHERE gebruikersnaam = '".$uname."' AND wachtwoord='".$password."' limit 1"; 




?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="index.css">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300&display=swap" rel="stylesheet">
    <title>Document</title>
</head>
<body>

    <div class="login_container">
        <div class="login-text"><h3>Login</h3></div>
        <div class="login">
            <form class="login-form" method="POST" action="#">
                <div>
                    <input type="text" class="userinfo" name="username" placeholder="Gebruikersnaam" >
                </div>
                <div>
                    <input type="password" class="userinfo" name="password" placeholder="Wachtwoord">
                </div>
                <div>
                    <center><button class="inloggen" type="submit">Login</button><center>
                 </div>
            </form>
        </div>
        </div>
    </body>
</html>
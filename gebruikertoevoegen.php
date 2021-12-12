<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="gebruikertoevoegen.css">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300&display=swap" rel="stylesheet">
    <title>Document</title>
</head>
<body>
    <div class="gegevens_container">
        <h3 class="gebruiker_tekst">Gebruiker Toevoegen</h3>
        <form method="post" action="#">
            <input type="txt" name="naam" class="nieuwe_user" placeholder="Naam">
            <input type="txt" name="gebruikersnaam"class="nieuwe_user" placeholder="Gebruikersnaam">
            <input type="txt" name="wachtwoord" class="nieuwe_user" placeholder="Wachtwoord">
            <button type="submit" class="voeg_toe">Voeg Toe</button>
        </form>

    </div>
</body>
</html>

<?php
include "config.php";

$sql = "SELECT * FROM `users`";


echo "
<table class='content-table'>
<thead>
  <tr>
    <th>ID</th>
    <th>Aantal</th>
    <th>Naam</th>
    <th>Adres</th>
    <th>E-mail</th>
    <th>Telefoonnummer</th>
    <th>Status</th>
    <th>Delete</th>
  </tr>
</thead>";


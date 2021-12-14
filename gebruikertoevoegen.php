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
    <div class="accounts_container">
        <form method="post" action="#">
          <div><input name="search" class="zoek_balk" placeholder="Zoeken"></div>


        </form>
    </div>


</body>
</html>
<?php
include "config.php";

if ($conn -> connect_errno) {
  echo "Failed to connect to MySQL: " . $conn -> connect_error;
  exit();
}

$sql ="SELECT * From `users`";

echo "
<table class='content-table'>
<thead>
  <tr>
    <th>ID</th>
    <th>Naam</th>
    <th>Gebruikersnaam</th>
    <th>Wachtwoord</th>
    
  </tr>
</thead>";

if ($result = $conn->query($sql)) {
  foreach ($result as $row) {
  echo "

  <tr>
      <td>" . $row['id'] . "</td> 
      <td>" . $row['naam'] . "</td>
      <td>" . $row['gebruikersnaam'] . "</td>
      <td>" . $row['wachtwoord'] . "</td>";
  }
}
?>




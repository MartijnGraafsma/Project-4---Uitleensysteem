<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="gebruikertoevoegen1.css">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300&display=swap" rel="stylesheet">
    <title>Gebruiker toevoegen</title>
</head>
<body>
<div class="header" id="header">
  <label for="check" class="checkbtn" onclick="myFunction()"><i class="fas fa-bars" id="check"></i></label>
  <div class="innerheader">
    <div class="logo_container">
      <img class="FotoFP" src="logofriesepoort.png">
    </div>
      <div class="navbar">
        <ul>
        <a href="apparaatoverzicht(docent).php"><li>Apparatenoverzicht</li></a>
          <a href="apparatentoevoegen.php"><li>Apparaten toevoegen</li></a>
          <a href="gebruikertoevoegen.php"><li>Gebruiker toevoegen</li></a>
          <a href="inloggen.php"><li>Uitloggen</li></a>
          <a><li> <form  method='post' action="">
        </form></li></a>
        </ul>
      <script>
          function myFunction() {
            var x = document.getElementById("header");
            if (x.className === "header") {
              x.className += " responsive";
            } else {
              x.className = "header";
            }
          }
      </script>
      </div>
  </div>
</div>
    <div class="gegevens_container">
        <h3 class="gebruiker_tekst">Gebruiker Toevoegen</h3>
        <form method="post" action="#">
          
            <input type="txt" name="naam" class="nieuwe_user" placeholder="Naam" required>

            <input type="txt" name="gebruikersnaam"class="nieuwe_user" placeholder="Gebruikersnaam" required>

            <input type="password" name="wachtwoord" class="nieuwe_user" placeholder="Wachtwoord" required>

            <button type="submit" name="submit" class="voeg_toe">Voeg Toe</button>
        </form>

    </div>
    <div class="accounts_container">
        <form method="post" action="#">
          <div class="zoek-container">
          <div><input name="search" class="zoek_balk" placeholder="Zoeken"></div>
          <div><button type="submit" name="searchbtn" class="searchbtn">Zoek</button>
          </div>

        </form>
    </div>


</body>
</html>
<?php
include "config.php";
//als je op de voeg toe knop klikt
if(isset($_POST['submit'])) {
  $naam = ($_POST['naam']);
  $gebruikersnaam = ($_POST['gebruikersnaam']);
  $wachtwoord = ($_POST['wachtwoord']);
//prepare en bind
  $SELECT = "SELECT gebruikersnaam from users Where gebruikersnaam = ? Limit 1";
  $insertSQL = "INSERT INTO users(naam, gebruikersnaam, wachtwoord ) values(?,?,?)";
  $stmt = $conn-> prepare($SELECT);
  $stmt->bind_param("s", $gebruikersnaam);
  $stmt->execute();
  $stmt->bind_result($gebruikersnaam);
  $stmt->store_result();
  $rnum = $stmt->num_rows;

  if ($rnum==0){
    $stmt->close();
    $stmt = $conn->prepare($insertSQL);
    $stmt->bind_param("sss",$naam, $gebruikersnaam, $wachtwoord);
    $stmt->execute();
    echo "<script>alert('Het is gelukt om een account te maken')</script>";
    ?>
    <META HTTP-EQUIV="Refresh" CONTENT="0; URL=http://localhost/systeem/gebruikertoevoegen.php">
    <?php
}else{
    echo "<script>alert('Er bestaat al een account met dit gebruikersnaam, Probeer later opnieuw')</script>";
}
$stmt->close();
$conn->close();
}

?>

<?php
if(isset($_POST['searchbtn'])){ //als je op zoekbutton klikt
    $search = $_POST['search'];
    $query = "SELECT * FROM users WHERE CONCAT(naam,gebruikersnaam) LIKE '%".$search."%'";
    $searchbtn_result = filterTable($query);

}else{
    $query = "SELECT * FROM users";
    $searchbtn_result = filterTable($query);
} 
//connectie met de database
function filterTable($query){
    include 'conn.php';
    $filter_Result = mysqli_query($conn, $query);
    return $filter_Result;
}
?>
 <table class="content-table">
   <thead>
                <tr>            
                    <th>Naam</th>
                    <th>Gebruikersnaam</th>
                </tr>
                 <!-- loopt door de database tot hij alle informatie gevonden heeft -->
                <?php while($row = mysqli_fetch_array($searchbtn_result)):?>
                <tr>
                    <td><?php echo $row['naam'];?></td>
                    <td><?php echo $row['gebruikersnaam'];?></td>
                </tr>
                <!--eindigt de loop-->
                <?php endwhile;?>
                </thead>
            </table>  

<!-- zorgt dat het niet opnieuw toegevoegd wordt aan de database als je refreshed -->
<script>
if ( window.history.replaceState ) {
  window.history.replaceState( null, null, window.location.href );
}
</script>




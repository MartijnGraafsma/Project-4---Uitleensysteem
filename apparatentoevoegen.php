<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="apparatentoevoegen1.css">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous">
    <title> "Apparaten toevoegen"</title>
</head>
<body>
<div class="header" id="header">
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
    
    <div class="container">
        <div>
            <h2 class="top-tekst">Apparaat toevoegen</h2>
            <form method="POST" action="#">
                <input class="apparaatnaam" type="text" name="productnaam" placeholder="Naam" minlength="4" maxlength="15" required> <br>
                <input class="beschrijving" type="text" name="beschrijving" placeholder="Beschrijving..." minlength="5" maxlength="30"required>
                <input type="text" name="beschikbaarheid" value="beschikbaar" hidden>
                <input type="text" name="inleverdatum" value="/" hidden>
                <input class="" type="file" id="file" name="image" accept="image/*" placeholder="Voeg foto toe">
                <label for="file">
                  <i class="far fa-file-image"></i> &nbsp;
                  Voeg foto toe  
                </label>
                <?php 
                include "config.php";
                $resultSet = $conn->query("SELECT * FROM `categorie`");
                ?>
<!-- dropdown menu uit database -->
<select class="dropdown" name="categorie" required>
<option disabled hidden selected value='Categorie'>Categorie</option>
   <?php 
  //  fetch_assoc zorgt ervoor dat alles er maar 1 keer komt te staan
   while($rows = $resultSet->fetch_assoc())
    {
      $naam = $rows['naam']; 
      $categorieid = $rows['categorieid'];
      echo"<option value='$categorieid'>$naam</option>";
    }
   ?>

</select>
<button class="voeg-toe" type="submit" name="voeg-toe">Voeg toe</button>
</form>
</div>
</div>
<div class="cat-container">
    <h2 class="top-tekst">Categorie toevoegen</h2>
            <form method="post" action="#">
                <input class="cat-naam" type="text" name="categorie" placeholder="categorie-naam" minlength="2" maxlength="15" required> 
                <button type="submit" class="cat-toevoegen" name="cat-voeg-toe">Voeg toe</button>   
    </form>
    <h2 class="top-tekst">Categorie verwijderen</h2> 
    <form method="post" action="#">
    <select class="dropdown" name="cat-ver" required>
      <option disabled hidden selected value='Categorie'>Categorie</option>
   <?php 
   $resultSet = $conn->query("SELECT * FROM `categorie`");
  //  fetch_assoc zorgt ervoor dat alles er maar 1 keer komt te staan
   while($rows = $resultSet->fetch_assoc())
    {
   $naam = $rows['naam'];

      echo"<option value='$naam'>$naam</option>";
    }
     
   ?>
   </select>
   <button type="submit" class="cat-verwijderen" name="cat-verwijderen" onclick='return checkdelete()'>Verwijderen</button>
   </form>
            
    </div>
</body>
</html>
<?php
include "config.php";
if(isset($_POST['cat-voeg-toe'])) {
    $cat = $_POST['categorie'];
      //prepare en bind
        $insertSQL = "INSERT INTO categorie(naam) values(?)";
        $stmt = $conn-> prepare($insertSQL);
        $stmt->bind_param("s", $cat);
      //execute
        $stmt -> execute();
        $stmt -> close();
        if($stmt){
          echo "<script>alert('categorie is toegevoegd, u kunt nu apparaat toevoegen')</script>";
          ?>
          <META HTTP-EQUIV="Refresh" CONTENT="0; URL=http://localhost/systeem/apparatentoevoegen.php">
          <?php
          }else{
            echo "<script>alert('Het is niet gelukt om categorie toe te voegen, Probeer later opnieuw')</script>";
          }
      }

?>
<?php
if(isset($_POST['voeg-toe'])) {
    $productnaam = $_POST['productnaam'];
    $beschrijving = $_POST['beschrijving'];
    $beschikbaarheid = $_POST['beschikbaarheid'];
    $inleverdatum = $_POST['inleverdatum'];
    $categorie = $_POST['categorie'];

    $file = addslashes(file_get_contents($_FILES["foto"]["tmp_name"]));
      //prepare en bind
        $insertSQL = "INSERT INTO apparaatoverzicht(`productnaam`, `beschrijving`,`beschikbaarheid`,`inleverdatum`,`categorieid`, `image`) values(?,?,?,?,?)";
        $stmt = $conn-> prepare($insertSQL);
        $stmt->bind_param("sssss", $productnaam, $beschrijving, $beschikbaarheid,$inleverdatum,$categorie, $file);
      //execute
        $stmt -> execute();
        $stmt -> close();
        if($stmt){
          echo "<script>alert('apparaat is toegevoegd, u kunt nu apparaat uitlenen')</script>";
          ?>
          <META HTTP-EQUIV="Refresh" CONTENT="0; URL=http://localhost/systeem/apparatentoevoegen.php">
          <?php
          }else{
            echo "<script>alert('Het is niet gelukt om apparaat toe te voegen, Probeer later opnieuw')</script>";
          }
      }
?>

<?php
if(isset($_POST['cat-verwijderen'])) {
  $categorie = $_POST['cat-ver'];
  
    //prepare en bind
      $deleteSQL = "DELETE From categorie Where naam= '$categorie'" ;
      $stmt = $conn-> prepare($deleteSQL);
    //execute
      $stmt -> execute();
      $stmt -> close();
      if($stmt){
        echo "<script>alert('categorie is verwijderd')</script>";
        ?>
        <META HTTP-EQUIV="Refresh" CONTENT="0; URL=http://localhost/systeem/apparatentoevoegen.php">
        <?php
        }else{
          echo "<script>alert('Het is niet gelukt om $categorie te verwijderen, Probeer later opnieuw')</script>";
        }
      }
?>

<!-- zorgt dat het niet opnieuw toegevoegd wordt aan de database als je refreshed -->
<script>
if ( window.history.replaceState ) {
  window.history.replaceState( null, null, window.location.href );
}

function checkdelete(){
  return confirm('Weet je zeker dat je deze account willen verwijderen?');
}
</script>
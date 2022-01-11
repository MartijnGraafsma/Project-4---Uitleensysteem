<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="apparatentoevoegen.css">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous">
    <title> "Apparaten toevoegen"</title>
</head>
<body>
    <div class="container">
        <div>
            <h2 class="top-tekst">Apparaat toevoegen</h2>
            <form method="POST" action="#">
                <input class="apparaatnaam" type="text" name="productnaam" placeholder="Naam"> <br>
                <input class="beschrijving" type="text" name="beschrijving" placeholder="Beschrijving...">
                <input type="text" name="beschikbaarheid" value="beschikbaar" hidden>
                <input type="text" name="inleverdatum" value="/" hidden>
                <input class="" type="file" id="file" name="foto" accept="image/*" placeholder="Voeg foto toe">
                <label for="file">
                  <i class="far fa-file-image"></i> &nbsp;
                  Voeg foto toe  
                </label>
                <?php 
                include "config.php";
                $resultSet = $conn->query("SELECT `naam` FROM `categorie`");
                ?>
<!-- dropdown menu uit database -->
<select class="dropdown" name="categorie">
<option value='Categorie'>Categorie</option>
   <?php 
  //  fetch_assoc zorgt ervoor dat alles er maar 1 keer komt te staan
   while($rows = $resultSet->fetch_assoc())
    {
   $naam = $rows['naam'];

      echo"<option value='$naam'>$naam</option>";
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
                <input class="cat-naam" type="txt" name="categorie" placeholder="categorie-naam"> 
                <button type="submit" class="cat-toevoegen" name="cat-voeg-toe">Voeg toe</button>   
    <h2 class="top-tekst">Categorie verwijderen</h2> 
    <button type="submit" class="cat-verwijderen" name="cat-verwijderen">Verwijderen</button>
                <select class="dropdown" name="cat-ver">
<option value='Categorie'>Categorie</option>
   <?php 
   $resultSet = $conn->query("SELECT * FROM `categorie`");
  //  fetch_assoc zorgt ervoor dat alles er maar 1 keer komt te staan
   while($rows = $resultSet->fetch_assoc())
    {
   $naam = $rows['naam'];

      echo"<option value='$naam'>$naam</option>";
    }
     
   ?>
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
      }

?>
<?php
if(isset($_POST['voeg-toe'])) {
    $productnaam = $_POST['productnaam'];
    $beschrijving = $_POST['beschrijving'];
    $beschikbaarheid = $_POST['beschikbaarheid'];
    $inleverdatum = $_POST['inleverdatum'];
    $categorie = $_POST['categorie'];
      //prepare en bind
        $insertSQL = "INSERT INTO apparaatoverzicht(productnaam, beschrijving,beschikbaarheid,inleverdatum,categorieid) values(?,?,?,?,?)";
        $stmt = $conn-> prepare($insertSQL);
        $stmt->bind_param("sssss", $productnaam, $beschrijving, $beschikbaarheid,$inleverdatum,$categorie);
      //execute
        $stmt -> execute();
       
        $stmt -> close();
      }
?>

<?php
if(isset($_POST['cat-verwijderen'])) {
  $categorie = $_POST['cat-ver'];
  
    //prepare en bind
      $insertSQL = "DELETE $categorie From `categorie`" ;
      $stmt = $conn-> prepare($insertSQL);
    //execute
      $stmt -> execute();
     
      $stmt -> close();
    }
?>

<!-- zorgt dat het niet opnieuw toegevoegd wordt aan de database als je refreshed -->
<script>
if ( window.history.replaceState ) {
  window.history.replaceState( null, null, window.location.href );
}
</script>